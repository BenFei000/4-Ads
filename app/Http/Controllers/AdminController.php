<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
    * Show view of Create a new Category
    */
    public function showAddCategory() {
      return view('admins.addCategory');
    }

   /**
   * Add new main category
   */
   public function addMainCategory() {
     return "Backend of Add main category";
   }

   /**
   * Add new sub category
   */
   public function addSubCategory() {
     return "Backend of Add sub category";
   }

}
