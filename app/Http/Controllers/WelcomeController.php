<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Advertisement;
use App\User;
use App\MainCategory;
use App\SubCategory;
use Auth;
class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ads = Advertisement::where('approved', 1)
            ->orderBy('created_at', 'desc')
            ->take(9)
            ->get();
      if(!Auth::guest()) {
        $ads = $this->appendInWishListAds($ads);
      }

      $categories = [];
      $mainCategories = MainCategory::all();
      foreach ($mainCategories as $main) {
        $main['sub'] = MainCategory::find($main->id)->subCategories;
        if (count($main['sub']) > 0) {
          array_unshift($categories, $main); //push front
        } else {
          array_push($categories, $main); //push back
        }
      }

      return view('welcome', ['ads' => $ads, 'categories' => $categories]);
    }

    /*
    * Add column inWishlist to every ad belongs to the user wishlist
    */
    public function appendInWishListAds($ads){
      $userWishlistAds = User::find(Auth::user()->id)->wishlistAds;
      foreach ($userWishlistAds as $wishAd) {
        foreach ($ads as $ad) {
          if($ad->id == $wishAd->id) {
            $ad['inWishList'] = true;
            break;
          }
        }
      }

      return $ads;
    }

    public function subCategoryFiltering($sub_category_id){
      $sub = SubCategory::find($sub_category_id);
      if (!$sub) {
        return view('errors.404');
      }
      $ads = Advertisement::where('approved', 1)
            -> where('sub_category_id', $sub_category_id)
            ->orderBy('created_at', 'desc')
            ->get();
      if(!Auth::guest()) {
        $ads = $this->appendInWishListAds($ads);
      }

      return view('search.results', ['ads' => $ads]);
    }

    public function mainCategoryFiltering($main_category_id){
      $main = MainCategory::find($main_category_id);
      if (!$main) {
        return view('errors.404');
      }

      $ads = Advertisement::where('approved', 1)
            -> where('main_category_id', $main_category_id)
            ->orderBy('created_at', 'desc')
            ->get();
      if(!Auth::guest()) {
        $ads = $this->appendInWishListAds($ads);
      }

      return view('search.results', ['ads' => $ads]);
    }
}
