@extends('layouts.app')
@section('title', '4-Ads | Home')

@section('content')

  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      Sportswear
                    </a>
                  </h4>
                </div>
                <div id="sportswear" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul>
                      <li><a href="#">Nike </a></li>
                      <li><a href="#">Under Armour </a></li>
                      <li><a href="#">Adidas </a></li>
                      <li><a href="#">Puma</a></li>
                      <li><a href="#">ASICS </a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      Mens
                    </a>
                  </h4>
                </div>
                <div id="mens" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul>
                      <li><a href="#">Fendi</a></li>
                      <li><a href="#">Guess</a></li>
                      <li><a href="#">Valentino</a></li>
                      <li><a href="#">Dior</a></li>
                      <li><a href="#">Versace</a></li>
                      <li><a href="#">Armani</a></li>
                      <li><a href="#">Prada</a></li>
                      <li><a href="#">Dolce and Gabbana</a></li>
                      <li><a href="#">Chanel</a></li>
                      <li><a href="#">Gucci</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      Womens
                    </a>
                  </h4>
                </div>
                <div id="womens" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul>
                      <li><a href="#">Fendi</a></li>
                      <li><a href="#">Guess</a></li>
                      <li><a href="#">Valentino</a></li>
                      <li><a href="#">Dior</a></li>
                      <li><a href="#">Versace</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a href="#">Kids</a></h4>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a href="#">Fashion</a></h4>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a href="#">Households</a></h4>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a href="#">Interiors</a></h4>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a href="#">Clothing</a></h4>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a href="#">Bags</a></h4>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a href="#">Shoes</a></h4>
                </div>
              </div>
            </div><!--/category-products-->

          </div>
        </div>

        <div class="col-sm-9 padding-right">


          <div class="row"><!--recommended_items-->
            <h2 class="title text-center">Latest Ads</h2>
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




            <a href="#" class="text-center col-sm-12">
              <i class="fa fa-chevron-left" aria-hidden="true"></i>
              View All Ads
              <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
          </div><!--/recommended_items-->

        </div>
      </div>
    </div>
  </section>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(document).ready(function(){

          $(".edit").click(function(event){
              event.preventDefault();
              postbodyelement=event.target.parentNode.parentNode.childNodes[1];
              postbody=postbodyelement.textContent;
              postid=  event.target.parentNode.parentNode.dataset['postid'];
              // alert(postid);
              console.log(postid);
              $('#post-body').val(postbody);
              $('#edit-modal').modal();
          });

          $("#removefromwishlist").click(function(event){
              event.preventDefault();
              alert("Here");
              /*var adid=  event.target.parentNode.dataset['adid'];
              alert(adid);*/
              /*$.ajax({
                  type:"GET",
                  url:'register',
                  data:{ body: $('#post-body').val() ,postId: postid ,_token:token },
                  success:function(data){
                      alert(data);
                  },error:function(){
                      alert("error!!!!");
                  }
              })

                  .done(function (msg) {
                      $(postbodyelement).text(msg['new_body']);
                  });
*/
          });

      });
</script>

@endsection

