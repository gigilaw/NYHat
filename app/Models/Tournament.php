<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use softDeletes;

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'tournament_users')->withTimeStamps();
    }
}
