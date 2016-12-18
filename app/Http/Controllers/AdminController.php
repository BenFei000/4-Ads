<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\MainCategory;
use App\SubCategory;
use FlashServiceProvider;

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
      $mainCategories = MainCategory::all();
      return view('admins.addCategory', ['mainCategories' => $mainCategories]);
    }

   /**
   * Add new main category
   */
   public function addMainCategory(Request $request) {
     $this->validate($request, [
        'main_category_name' => 'required|max:255| unique:main_categories,name',
     ]);

     MainCategory::create(['name' => $request->main_category_name]);

     flash('Main category added successfully.', 'success');
     return redirect('/add/category');
   }

   /**
   * Add new sub category
   */
   public function addSubCategory(Request $request) {
     // main_category contains main_category_id
     $main_category_id = $request->main_category;

     $this->validate($request, [
        'main_category' => 'required| numeric| exists:main_categories,id',
        'sub_category_name' => 'required| max:255| unique:sub_categories,name'
     ]);

     $mainCategory = MainCategory::find($main_category_id);
     $mainCategory->subCategories()->save(
       new SubCategory(['name' => $request->sub_category_name,])
     );

     flash('Sub category added successfully.', 'success');
     return redirect('/add/category');
   }

}
