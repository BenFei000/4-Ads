<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Wishlist;
use Illuminate\Http\Request;
use Auth;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Advertisments=\App\Advertisement::orderBy('created_at','desc')->get();
        $Wishes=Wishlist::where('user_id',Auth::user()->id)->get();
        //return $Wishes;

        return view('welcome',compact('Advertisments','Wishes'));

    }
}
