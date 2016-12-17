<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\MainCategory;
use App\SubCategory;
use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;


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

        $MainCategories=MainCategory::all();
        $SubCategories=SubCategory::all();
      return view('ads.create',compact('MainCategories','SubCategories','MainId'));
    }
    public function getSearchView(){
        $MainCategories=MainCategory::all();
        $SubCategories=SubCategory::all();
        return view('search.box',compact('MainCategories','SubCategories'));
    }

    public function showCategoryResults(Request $request){
        $subcategoryname= $request['category_id'];
        $SubCategory=SubCategory::where('name',$subcategoryname)->get()->first();
        //$Advertisments=Advertisement::where('sub_category_id',$SubCategory->id)->get()->first();
        //=Wishlist::where('user_id','2')->get()->first();
        $Wishes=DB::select('select *from wishlists where user_id=?',[Auth::user()->id]);
        $Advertisments =DB::select('select *from advertisements where sub_category_id=?',[$SubCategory->id]);
        return view('search.results',compact('Advertisments','Wishes'));
    }



   /**
   * Create a new advertisement
   */
   public function createAd(Request $request) {

       $this->validate($request,[
           'title' =>'required',
           'desc' =>'required',
           'main_category' =>'required',
           'sub_category' =>'required',
           'price' =>'required',
           'city' =>'required',
           'owner_name' =>'required',
           'email' =>'required',
           'mobile' =>'required'

       ]);


       $Advertisment=new Advertisement();
       $Advertisment->title=$request['title'];
       $Advertisment->desc=$request['desc'];
       $main_category=MainCategory::where('name',$request['main_category'])->get()->first();
       $Advertisment->main_category_id=$main_category->id;
       $sub_category=SubCategory::where('name',$request['sub_category'])->get()->first();
       $Advertisment->sub_category_id=$sub_category->id;
       $Advertisment->price=$request['price'];
       $Advertisment->city=$request['city'];
       if($photo=$request->file('photo')){
           $Advertisment->photo=$photo->getClientOriginalName();
           $photo->move('ads',$Advertisment->photo);
       }
       $Advertisment->owner_name=$request['owner_name'];
       $Advertisment->email=$request['email'];
       $Advertisment->mobile=$request['mobile'];
       if($request['is_new']!=null)
       $Advertisment->is_new=$request['is_new'];
       if($request->user()->advertisements()->save($Advertisment))
       {
           return "Advertisment Succesfuly Created";

       }


     return "Backend of create advertisement";
   }

    public function showSearchResults(Request $request){
        $this->validate($request,[
            'query' =>'required'
        ]);

        $Advertisment=new Advertisement();
        $Advertisment->title=$request['query'];
        $Advertisment->city=$request['city'];
        $Advertisments=\App\Advertisement::where('title',$request['query'])->where('city',$Advertisment->city)->get();
        $Wishes=DB::select('select *from wishlists where user_id=?',[Auth::user()->id]);

       // $Advertisments =DB::select('select *from advertisements where city=?',[$Advertisment->city] ,'and title=?',$request['query']);

        return view('search.results',compact('Advertisments','Wishes'));
        return var_dump($ads);
    }


    public function getSelectedCategory(Request $request){

       $MainId=$request['body'];
       return $MainId;

       $subCategories=SubCategory::where('main_category_id',$request['body'])->take(1)->get();
        return response()->json(['topics'=>$subCategories],200);
    }

/*
   public function getSelectedCategory(Request $request){
       $categoryId = $_POST['categoryId'];
       echo "<option>Select Category</option>";
       $res= mysql_query("select * from ".SUBCATEGORY." WHERE category_id = $categoryId order by id asc");
       while($data=mysql_fetch_array($res))
       {
           echo "<option value='".$data['id']."'>."$data['sub_name']."</option>";
        }


       }
*/


}
