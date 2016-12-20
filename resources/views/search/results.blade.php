@extends('layouts.app')
@section('title', '4-Ads | Results')
@section('content')

  <div class="row"><!--recommended_items-->
    <h2 class="title text-center">Latest Ads</h2>

    @if(count($ads) == 0)
      <p class="text text-center">No Ads are found.</p>
    @else
         @foreach ($ads as $ad)
           <div class="col-sm-4">
             <div class="product-image-wrapper">
               <div class="single-products">
                 <div class="productinfo text-center">
                   <a href="#"> <img src="{{asset('ads/'.$ad->photo)}}" alt="" /> </a>
                   <h2>${{$ad->price}}</h2>
                   <p>  {{$ad->title}} </p>
                   @if(!Auth::guest())
                     @if(isset($ad->inWishList))
                       <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-star" style="color:#FE980F;"></i>Remove from wishlist</a>
                     @else
                       <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-star"></i>Add to wishlist</a>
                     @endif
                   @endif
                 </div>

               </div>
             </div>
           </div>
         @endforeach


    <a href="#" class="text-center col-sm-12">
      <i class="fa fa-chevron-left" aria-hidden="true"></i>
      View All Ads
      <i class="fa fa-chevron-right" aria-hidden="true"></i>
    </a>
  @endif
  </div><!--/recommended_items-->

@endsection
