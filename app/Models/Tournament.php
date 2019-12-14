<?php

namespace App\Models;

use App\Models\User;
use App\Models\TournamentUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use softDeletes;

    public function users()
    {
        return $this->belongsToMany(User::class, 'tournament_users')->withTimeStamps();
    }

    public function tournamentUsers()
    {
        return $this->hasMany(TournamentUser::class);
    }
}
