<?php

namespace App\Models;

use App\Models\Tournament;
use App\Models\TournamentUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use softDeletes;

    public static $position = [
        'HANDLER' => 'handler',
        'CUTTER' => 'cutter',
        'HYBRID' => 'hybrid'
    ];

    public static $gender = [
        'MALE' => 'male',
        'FEMALE' => 'female',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'throwing',
        'catching',
        'speed',
        'position',
        'offense',
        'defense',
        'age',
        'height',
        'gender',
    ];

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class, 'tournament_users')->withTimeStamps();
    }

    public function tournamentUsers()
    {
        return $this->hasMany(TournamentUser::class);
    }
}
