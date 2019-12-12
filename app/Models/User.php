<?php

namespace App\Models;

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
    ];
}
