<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Profile;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 'firstname', 'email', 'password', 'last_seen',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'last_seen',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->firstname . ' ' . $this->name;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function isAdmin()
    {
        return $this->roles()->where('nom', 'Administrateur')->first();
    }

    public function isSuperAdmin()
    {
        return $this->roles()->where('nom', "Super Administrateur")->first();
    }
    // public function hasAnyRole(array $roles)
    // {
    //     return $this->roles()->whereIn('nom', $roles)->first();
    // }
}
