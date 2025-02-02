<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use App\Models\Payment;
use App\Jobs\SendEmails;
use App\Models\Tournament;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\UserRegistration;
use App\Models\TournamentUser;
use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\UserCollection;
use App\Http\Resources\ParticipantResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): UserCOllection
    {
        return new UserCollection(User::all());
    }

    /**
     * Register for the tournament
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws Exception
     */
    public function register(StoreUser $request, String $nameCode): ParticipantResource
    {
        $validatedData = $request->validated();
        $user = User::create($validatedData)->fresh();
        $tournament = Tournament::where('name_code', $nameCode)->first();

        //attach new registration to tournament
        $user->tournaments()->attach($tournament->id);

        $tournamentUser = TournamentUser::where('user_id', $user->id)
            ->where('tournament_id', $tournament->id)
            ->first();

        if (isset($validatedData['note'])) {
            $tournamentUser->fill(['note' => $validatedData['note']])->save();
        }

        //create payment and associate to tournamentUser
        $payment = new Payment;
        $payment->reference_code = Str::random(4);
        $payment->tournamentUser()->associate($tournamentUser)->save();
        
        //update Tournament avg values
        $updates = [];
        $prevUsers = User::count()-1;

        $avgSkills = [
            'avg_throwing',
            'avg_catching',
            'avg_speed',
            'avg_offense',
            'avg_defense',
        ];
        foreach ($avgSkills as $avgSkill) {
            $updates[$avgSkill] = round((($tournament->$avgSkill * $prevUsers) + $validatedData[Str::substr($avgSkill, 4)]) / User::count(), 2);
        }
        $tournament->update($updates);

        // Mail::to($validatedData['email'])->queue(new UserRegistration($user));
        SendEmails::dispatch($tournamentUser);

        return new ParticipantResource($tournamentUser);
    }
}
