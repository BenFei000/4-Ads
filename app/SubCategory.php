<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MainCategory;
use App\Advertisement;

class SubCategory extends Model
{
  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'sub_categories';

  /**
  * Get the MainCategory that owns the SubCategory.
  */
  public function mainCategory()
  {
      return $this->belongsTo(MainCategory::class, 'main_category_id');
  }

  /**
  * Get the SubCategory's advertisements.
  */
   public function advertisements()
   {
       return $this->hasMany(Advertisement::class);
   }
}
