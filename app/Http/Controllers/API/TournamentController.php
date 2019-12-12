<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\TournamentCollection;
use App\Http\Resources\ParticipantCollection;
use Illuminate\Database\Eloquent\Builder;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TournamentCollection(Tournament::all());
    }

    /**
     * Display a listing of all the participants of the tournament.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function participants(Request $request, $tournament)
    {
        if (Tournament::where('name_code', $tournament)->get()->isEmpty()) {
            return response()->json([
                'message' => 'Tournament Not Found'], 404);
        }

        $tournament = Tournament::where('name_code', $tournament)->first();

        $users = User::whereHas('tournaments', function (Builder $query) use ($tournament) {
            $query->where('tournament_users.tournament_id', $tournament->id);
        })->get();
        
        return new ParticipantCollection($users);
    }
}
