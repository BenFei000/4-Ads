@extends('layouts.app')
@section('title', '4-Ads | Results')
@section('content')

    <div class="container">
        <div class="row">




    <div class="row"><!--recommended_items-->
        <h2 class="title text-center">Search Results</h2>


        @foreach($Advertisments as $Advertismnet)
            @if($Advertismnet->approved==1)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">

                                <img src="ads/{{$Advertismnet->photo}}" alt="" width="100" height="170" />
                                <h2>{{$Advertismnet->price}}</h2>
                                <p>{{$Advertismnet->desc}}</p>
                                <?php $flag=0; $i=0;?>
                                <?php foreach( $Wishes as $Wish){
                                ?>


                                <?php if($Advertismnet->id==$Wish->advertisement_id){?>
                                <div class="interaction">
                                    <article data-adid="{{$Advertismnet->id}}">
                                        <a href="#" class="btn btn-default add-to-cart" id="removefromwishlist"><i class="fa fa-star" style="color:#FE980F;" ></i>Remove from wishlist</a>
                                    </article>
                                </div>
                                <?php $flag=1; }?>



                                <?php } ?>
                                @if($flag==0)
                                    <article data-adid="{{$Advertismnet->id}}">
                                        <a href="#" class="btn btn-default add-to-cart" id="addtowishlist"><i class="fa fa-star"></i>Add to wishlist</a>
                                    </article>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach



</div>





    </div>
        </div>

@endsection
