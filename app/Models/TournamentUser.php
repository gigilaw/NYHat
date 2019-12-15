<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\Tournament;
use Illuminate\Database\Eloquent\Model;

class TournamentUser extends Model
{
    protected $fillable = [
        'note',
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
