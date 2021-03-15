<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }

    public function users() {
        return $this->belongsTo('App\Models\User');
    }

    public function hasAnyRoles($roles) {
        if ($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        } 

        return false;
    }

    public function hasRole($role) {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        } 

        return false;
    }

    public function category() {
        return $this->belongsToMany('App\Models\Category');
    }

    public function hasAnyCategories($categories) {
        if ($this->category()->whereIn('name', $categories)->first()) {
            return true;
        } 

        return false;
    }

    public function hasCategory($category) {
        if ($this->category()->where('name', $category)->first()) {
            return true;
        } 

        return false;
    }

    public function personality() {
        return $this->belongsToMany('App\Models\Personality');
    }

    public function hasAnyPersonalities($personalities) {
        if ($this->personality()->whereIn('name', $personalities)->first()) {
            return true;
        } 

        return false;
    }

    public function hasPersonality($personality) {
        if ($this->personality()->where('name', $personality)->first()) {
            return true;
        } 

        return false;
    }

    public function orders() {
        return $this->belongsToMany('App\Models\Order');
    }

    public function reports() {
        return $this->belongsTo('App\Models\Report');
    }

    public function withdrawals() {
        return $this->belongsTo('App\Models\Withdrawal');
    }
}
