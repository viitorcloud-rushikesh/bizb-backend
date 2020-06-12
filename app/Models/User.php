<?php

namespace App\Models;

use DarkGhostHunter\Laraguard\Contracts\TwoFactorAuthenticatable;
use DarkGhostHunter\Laraguard\TwoFactorAuthentication;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Concerns\HasSchemalessAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Concerns\HasTimezone;
use App\Models\Concerns\Hashidable;
use App\Models\Concerns\ScoutSearch;
use Sqits\UserStamps\Concerns\HasUserStamps;
use Spatie\Activitylog\Traits\LogsActivity;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class User extends Authenticatable implements MustVerifyEmail, HasMedia, TwoFactorAuthenticatable
{
    use HasApiTokens, HasRoles, HasSchemalessAttributes, Hashidable, HasTimezone, HasUserStamps, Impersonate, LogsActivity, Notifiable, ScoutSearch, SoftDeletes, InteractsWithMedia, TwoFactorAuthentication;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'mobile', 'password','confirmation_code'];

    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
        'extra_attributes' => 'array',
        'mobile' => 'string',
        'timezone' => 'string',
        'last_login_at' => 'datetime',
        'last_login_ip' => 'string',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'email_verified_at',
        'mobile_verified_at',
        'last_login_at',
    ];

    /**
     * The attributes that should be searchable.
     *
     * @var array
     */
    protected $searchable = [
        'name',
        'email',
        'username',
        'mobile',
    ];

    /**
     * The attributes that should be logged when changed.
     *
     * @var array
     */
    protected static $logAttributes = [
        'name',
        'email',
        'username',
        'mobile',
        'timezone',
        'last_login_at',
        'last_login_ip',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
                ->singleFile()
                ->registerMediaConversions(function (Media $media) {
                    $this
                        ->addMediaConversion('avatar')
                        ->fit(Manipulations::FIT_FILL, 150, 150)
                        ->background('LightYellow')
                        ->nonQueued();
                });
    }

    /**
     * The role who can impersonate other users
     * @return bool
     */
    public function canImpersonate()
    {
        return $this->hasRole('superadmin');
    }

    /**
     * The users who can be impersonated
     * @return bool
     */
    public function canBeImpersonated()
    {
        return !$this->hasRole('superadmin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts(){
        return $this->hasMany('App\Models\LinkedSocialAccount');
    }
}
