<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;
use App\Advertisement;

class MainCategory extends Model
{

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'main_categories';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
  ];

  /**
  * Get the mainCategory's SubCategories.
  */
   public function subCategories()
   {
       return $this->hasMany(SubCategory::class, 'main_category_id');
   }

  /**
  * Get the MainCategory's advertisements.
  */
  public function advertisements()
  {
      return $this->hasMany(Advertisement::class);
  }

}
