<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // camelCase -> kebab_case We change the kebab_case name of the column in the database to camelCase
    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value, // New arrow function of PHP 8
            set: fn ($value) => Hash::make($value),
        );
    }

    public function listings() : HasMany
    {
        return $this->hasMany(Listing::class, 'by_user_id');
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class, 'bidder_id');
    }
}
