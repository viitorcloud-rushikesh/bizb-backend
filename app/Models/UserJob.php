<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserJob extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'skills',
        'experience_level',
        'job_type',
        'payment_type',
        'rate_currency',
        'rate',
        'rate_type',
        'work_type',
        'job_validity_date',
        'job_expired_date',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'skills' => 'array',
        'experience_level' => 'array',
        'job_type' => 'integer',
        'payment_type' => 'integer',
        'rate_currency' => 'integer',
        'rate' => 'decimal:2',
        'rate_type' => 'integer',
        'work_type' => 'integer',
        'status' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'job_validity_date',
        'job_expired_date',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
