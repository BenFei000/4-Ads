<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\MainCategory;
use App\SubCategory;
use App\Advertisement;
use FlashServiceProvider;

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
      $cities = ['Ad Daqahliyah', 'Al Bahr al Ahmar','Al Buhayrah' ,'Al Fayyum',
      'Al Gharbiyah' ,'Al Iskandariyah' ,'Al Ismailiyah' ,'Al Jizah',
      'Al Minufiyah' ,'Al Minya' ,'Al Qahirah' ,'Al Qalyubiyah',
      'Al Wadi al Jadid' ,'As Suways' ,'Ash Sharqiyah' ,'Aswan',
      'Asyut' ,'Bani Suwayf' ,'Bur Said' ,'Cairo' ,'Dumyat' ,'Janub Sina',
      'Kafr ash Shaykh' ,'Matruh','Qina', 'Shamal Sina', 'Suhaj'];

      $mainCategories=MainCategory::all();
      return view('ads.create', ['mainCategories' => $mainCategories,
       'cities' => $cities]);
    }

   /**
   * Create a new advertisement
   */
   public function createAd(Request $request) {
      $this->validate($request,[
           'title' =>'required| max:255',
           'desc'  =>'max:255',
           'main_category' =>'required| exists:main_categories,id',
           'sub_category'  =>'required| exists:sub_categories,id',
           'price' =>'required| min:0',
           'city'  =>'required| max:255',
           'owner_name' =>'max:255',
           'email' =>'email| max:255',
           'mobile' =>'required| min:11| max:11',
           'photo' => 'image | mimes:jpeg,jpg,png'
      ]);

       $advertisment = new Advertisement();
       $advertisment->title = $request['title'];
       $advertisment->desc = ($request['desc']? $request['desc']:"");
       //main_category contains main category id
       $advertisment->main_category_id = $request->main_category;
       //sub_category contains sub category id
       $advertisment->sub_category_id = $request->sub_category;
       $advertisment->price=$request['price'];
       $advertisment->city=$request['city'];
       $advertisment->owner_name = $request['owner_name'];
       $advertisment->email = $request['email'];
       $advertisment->mobile = $request['mobile'];
       if(!$request['is_new']) {
         $advertisment->is_new = 0;
       }

       // Add advertisment to the user's Ads list
       $request->user()->advertisements()->save($advertisment);
       if($photo=$request->file('photo')){
           $advertisment->photo = $advertisment->id. '.' .$photo->getClientOriginalExtension();
           $photo->move('ads', $advertisment->photo);
           $advertisment->update();
       }

       flash('Advertisment created successfully.', 'success');
       return redirect('/create/advertisement');
   }

   /*
   * Get all sub categories of a given main category
   */
   public function getSubCategories(Request $request){
       $this->validate($request,[
            'main_category_id' =>'required| exists:main_categories,id',
       ]);

       $subCategories = MainCategory::find($request->main_category_id)->subCategories;
       return Response::json(['subCategories' => $subCategories]);
   }

}
