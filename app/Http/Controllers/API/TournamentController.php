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
    public function participants(Request $request, String $nameCode)
    {
        $tournament = Tournament::where('name_code', $nameCode)->first();

        if (is_null($tournament)) {
            return response()->json(['message' => 'Tournament Not Found'], 404);
        }

        return new ParticipantCollection($tournament->tournamentUsers()->with(['payment', 'user'])->get());
    }
}
