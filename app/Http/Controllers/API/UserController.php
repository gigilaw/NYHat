<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use App\Models\Payment;
use App\Models\Tournament;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TournamentUser;
use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

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
    public function register(StoreUser $request, String $nameCode): UserResource
    {
        $validatedData = $request->validated();
        $user = User::create($validatedData)->fresh();
        $tournament = Tournament::where('name_code', $nameCode)->first();

        //attach new registration to tournament
        $user->tournaments()->attach($tournament->id);

        //create payment and associate to tournamentUser
        $payment = new Payment;
        $payment->reference_code = Str::random(4);

        $tournamentUser = TournamentUser::where('user_id', $user->id)
                                        ->where('tournament_id', $tournament->id)
                                        ->first();
        
        $payment->tournamentUser()->associate($tournamentUser)->save();
        return new UserResource($user);
    }
}
