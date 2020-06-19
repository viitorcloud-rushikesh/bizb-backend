<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFreelancer extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'role',
        'location',
        'latitude',
        'longitude',
        'bio',
        'skills',
        'expertise_id',
        'rate_currency',
        'rate',
        'rate_type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'skills' => 'array',
        'expertise_id' => 'integer',
        'rate_currency' => 'integer',
        'rate' => 'decimal:2',
        'rate_type' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function expertise()
    {
        return $this->belongsTo(\App\Models\Expertise::class);
    }
}
