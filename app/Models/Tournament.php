<?php

namespace App\Models;

use App\Models\User;
use App\Models\TournamentUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use softDeletes;

    protected $fillable = [
        'title',
        'description',
        'cost',
        'capacity',
        'start_date',
        'end_date',
        'avg_throwing',
        'avg_catching',
        'avg_speed',
        'avg_offense',
        'avg_defense',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'tournament_users')->withTimeStamps();
    }

    public function tournamentUsers()
    {
        return $this->hasMany(TournamentUser::class);
    }
}
