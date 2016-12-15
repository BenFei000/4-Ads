<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Advertisement;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    * Get the user's advertisements.
    */
   public function advertisements()
   {
       return $this->hasMany(Advertisement::class);
   }

   /**
     * The wishlistAds that belong to the user.
     */
    public function wishlistAds()
    {
        return $this->belongsToMany(Advertisement::class, 'wishlists')
        ->withTimestamps();
    }

}
