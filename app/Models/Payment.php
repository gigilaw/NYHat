<?php

namespace App\Models;

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

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tournament()
    {
        return $this->belongsTo('App\Models\Tournament');
    }
}
