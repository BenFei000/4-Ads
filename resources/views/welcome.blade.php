@extends('layouts.app')
@section('title', '4-Ads | Welcome')

@section('content')
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="left-sidebar">
              <h2>Category</h2>
              <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                @foreach ($categories as $main)
                  @if(count($main->sub) > 0)
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordian" href="#{{$main->id}}">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            {{$main->name}}
                          </a>
                        </h4>
                      </div>
                      <div id="{{$main->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul>
                            @foreach ($main->sub as $sub)
                              <li><a href="{{url('filter/ads/subcategory/'. $sub->id)}}">{{$sub->name}}</a></li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                  @else
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><a href="{{url('filter/ads/maincategory/'. $main->id)}}">{{$main->name}}</a></h4>
                      </div>
                    </div>
                  @endif
                @endforeach

              </div><!--/category-products-->

            </div>
          </div>

          <div class="col-sm-9 padding-right">


            <div class="row"><!--recommended_items-->
              <h2 class="title text-center">Latest Ads</h2>

              @if(count($ads) == 0)
                <p class="text text-center">There is no Ads at this moment.</p>
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

          </div>
        </div>
      </div>
    </section>

@endsection
