<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    public static $status = [
        'PAID' => 'paid',
        'UNPAID' => 'unpaid',
    ];

    public static $formOfPayment =[
        'PAYME' => 'payme',
        'BANK' => 'bank',
        'CASH' => 'cash',
    ];

    public function tournamentUser()
    {
        return $this->belongsTo(User::class, 'payment_id', 'id');
    }
}
