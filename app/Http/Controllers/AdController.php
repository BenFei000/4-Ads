<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AdController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Show view of Create a new advertisement
    */
    public function showCreateAd() {
      return view('ads.create');
    }

   /**
   * Create a new advertisement
   */
   public function createAd() {
     return "Backend of create advertisement";
   }
}
