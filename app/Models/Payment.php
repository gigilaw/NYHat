<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $attributes = [
        'status' => 'unpaid'
    ];

    public static $status = [
        'PAID' => 'paid',
        'UNPAID' => 'unpaid',
    ];

    public static $formOfPayment =[
        'PAYME' => 'payme',
        'BANK' => 'bank',
        'CASH' => 'cash',
        'OTHER' => 'other',
    ];

    protected $fillable = [
        'reference_code',
        'form_of_payment',
        'paid_at',
        'status',
    ];

    public function tournamentUser()
    {
        return $this->belongsTo(TournamentUser::class);
    }
}
