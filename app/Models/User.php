<?php

namespace App\Models;

use DarkGhostHunter\Laraguard\Contracts\TwoFactorAuthenticatable;
use DarkGhostHunter\Laraguard\TwoFactorAuthentication;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
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
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'mobile', 'password', 'confirmation_code', 'avatar',
        'verification_confirmed', 'status', 'type', 'subscription_plan', 'is_profile_verified',];

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

    public function userMetas()
    {
        return $this->hasMany(\App\Models\UserMeta::class);
    }

    public function userDeviceTokens()
    {
        return $this->hasMany(\App\Models\UserDeviceToken::class);
    }

    public function userSocialLogins()
    {
        return $this->hasMany(\App\Models\UserSocialLogin::class);
    }

    public function userFreelancers()
    {
        return $this->hasMany(\App\Models\UserFreelancer::class);
    }

    public function userWorkHistories()
    {
        return $this->hasMany(\App\Models\UserWorkHistory::class);
    }

    public function userBrands()
    {
        return $this->hasMany(\App\Models\UserBrand::class);
    }

    public function userSocialMediaLinks()
    {
        return $this->hasMany(\App\Models\UserSocialMediaLink::class);
    }

    public function userProfileVerifications()
    {
        return $this->hasMany(\App\Models\UserProfileVerification::class);
    }

    public function userJobs()
    {
        return $this->hasMany(\App\Models\UserJob::class);
    }

    public function userSavedJobs()
    {
        return $this->hasMany(\App\Models\UserSavedJob::class);
    }

    public function userAppliedJobs()
    {
        return $this->hasMany(\App\Models\UserAppliedJob::class);
    }
}
