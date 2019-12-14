<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\Tournament;
use Illuminate\Database\Eloquent\Model;

class TournamentUser extends Model
{
    public function payment()
    {
        return $this->hasOne(Payment::class, 'id', 'payment_id');
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
