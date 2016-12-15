<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\MainCategory;
use App\SubCategory;

class Advertisement extends Model
{
  /**
  * Get the user that owns the advertisement.
  */
  public function user()
  {
      return $this->belongsTo(User::class);
  }

  /**
  * Get the mainCategory of the advertisement.
  */
  public function mainCategory()
  {
      return $this->belongsTo(MainCategory::class);
  }

  /**
  * Get the subCategory of the advertisement.
  */
  public function subCategory()
  {
    return $this->belongsTo(SubCategory::class);
  }

  /**
  * The users who wish this advertisement.
  */
  public function wishlistUsers()
  {
     return $this->belongsToMany(User::class, 'wishlists')
     ->withTimestamps();
  }

}
