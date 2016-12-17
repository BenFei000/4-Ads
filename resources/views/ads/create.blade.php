@extends('layouts.app')
@section('title', '4-Ads | Create Ad')
@section('content')
  @include('errors.validation') <!-- Display validation errors-->
  <div class="container">
      <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading btn-default"> Place a Free Add </div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST"
                      enctype="multipart/form-data" action="{{url('/create/advertisement')}}">
                          {{ csrf_field() }}

                          <div class="form-group">
                              <label for="title" class="col-sm-4 control-label">Title</label>
                              <div class="col-sm-6">
                                  <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="desc" class="col-sm-4 control-label">Description</label>
                              <div class="col-sm-6">
                                <textarea class="form-control" rows="5" id="desc" class="form-control"
                                 name="desc" value="{{ old('desc') }}" ></textarea>
                              </div>
                          </div>



                          <div class="form-group">
                              <label for="sub_category" class="col-sm-4 control-label">Main Category</label>
                              <div class="col-sm-6">
                                  <select class="form-control" id="main_category" name='main_category'>
                                      <option value=""> None </option>
                                      <option> Mobiles </option>
                                      <option> Laptops </option>
                                  </select>
                              </div>
                          </div>








                      <!--  <div class="form-group">
                              <label for="exampleInputEmail1">Category Name</label>
                              <select name="type" id="type">
                                  <option>Select Category</option>

                                  <?php
                                /*  $res= mysql_query("select * from ".CATEGORY."  order by id asc");
                                  while($data=mysql_fetch_array($res))
                                  {
                                  ?>
                                  <option value="<?php echo $data['id'];?>"><?php echo $data['cat_name'];?></option>
                                  <?php } */ ?>
                              </select>
                          </div>




                          <div class="form-group">
                              <label for="exampleInputEmail1">Subcategory Name</label>
                              <select name="type1" id="type1">

                              </select>
                          </div>
                          -->






                          <script>

                              var token='{{Session::token()}}';
                              var url='{{Route('ajax')}}';
                          </script>

                          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
                          <script type="text/javascript">
                              $(document).ready(function(){

                                 /* $('#main_category').on("change",function () {

                                      //var categoryId = $(this).find('option:selected').val();
                                     // wTile = event.target.parentNode;
                                      //wTile.className = wTile.className + " added-class";
                                     // var categoryId=  event.target.parentNode.parentNode.dataset['id'];
                                     //var postbodyelement=event.target.parentNode.parentNode.childNodes[1];
                                     var categoryId=$( "#main_category option:selected" ).val();
                                      //var categoryId= event.target.parentNode.parentNode.dataset['id'];
                                      alert(categoryId);

                                      $.ajax({
                                          url: url,
                                          type: "GET",
                                          data:{ body: categoryId ,_token:token },
                                          success: function (data) {
                                              alert(data['id'].value);
                                              $(".result").html(data['id'].value);
                                             // $(".result").html(data);
/*
                                              alert("here");
                                              data = JSON.parse(data);
                                              alert("merge");
                                              var id = data.id;

                                              $('#con').val(id);*/
                                              /*
                                              var str = JSON.stringify(data, null, 2);
                                              alert(str);
                                              console.log(str);
                                              var newJson = str.replace(/([a-zA-Z0-9]+?):/g, '"$1":');
                                              newJson = newJson.replace(/'/g, '"');

                                              var data2 = JSON.parse(newJson);
                                              console.log(data2[0]["id"]);
                                              */
                                              //alert(data[0]["name"]);
/*
                                              alert(str);
                                              var MyAssocArray = JSON.parse(str);
                                              console.log(str);
                                              document.getElementById("con").innerHTML=MyAssocArray;


*/



                                              //console.log(response);

                                             /// alert(data.join(' '));

                                      /*    },
                                      }).done(function (msg) {
                                          alert("Done");
                                         // $(postbodyelement).text(data['new_body']);
                                      });
                                  });
*/
                              });

                          </script>




                          <div class="form-group">
                              <label for="sub_category" class="col-sm-4 control-label">Sub Category</label>
                              <div class="col-sm-6">
                                <select class="form-control" id="sub_category" name='sub_category'>
                                    <option value=""> None </option>
                                    <option> Hp </option>
                                        <option> Apple </option>
                                </select>
                              </div>
                          </div>




                          <div class="form-group">
                              <label for="price" class="col-sm-4 control-label">Price</label>
                              <div class="col-sm-6">
                                  <input id="price" type="number" step="any" class="form-control" name="price" value="{{ old('price') }}">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="photo" class="col-sm-4 control-label">Photo</label>
                              <div class="col-sm-6">
                                <input type="file" class="form-control" name='photo'
                                 id="photo" accept="image/*">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="city" class="col-sm-4 control-label">City</label>
                              <div class="col-sm-6">
                                <select class="form-control" id="city" name='city'>
                                  <option value='Ad Daqahliyah'> Ad Daqahliyah </option>
                                  <option value='Al Bahr al Ahmar'> Al Bahr al Ahmar </option>
                                  <option value='Al Buhayrah'> Al Buhayrah </option>
                                  <option value='Al Fayyum'> Al Fayyum </option>
                                  <option value='Al Gharbiyah'> Al Gharbiyah </option>
                                  <option value='Al Iskandariyah'> Al Iskandariyah </option>
                                  <option value='Al Ismailiyah'> Al Ismailiyah </option>
                                  <option value='Al Jizah'> Al Jizah </option>
                                  <option value='Al Minufiyah'> Al Minufiyah </option>
                                  <option value='Al Minya'> Al Minya </option>
                                  <option value='Al Qahirah'> Al Qahirah </option>
                                  <option value='Al Qalyubiyah'> Al Qalyubiyah </option>
                                  <option value='Al Wadi al Jadid'> Al Wadi al Jadid </option>
                                  <option value='As Suways'> As Suways </option>
                                  <option value='Ash Sharqiyah'> Ash Sharqiyah </option>
                                  <option value='Aswan'> Aswan </option>
                                  <option value='Asyut'> Asyut </option>
                                  <option value='Bani Suwayf'> Bani Suwayf </option>
                                  <option value='Bur Said'> Bur Said </option>
                                  <option value='Cairo'> Cairo </option>
                                  <option value='Dumyat'> Dumyat </option>
                                  <option value='Janub Sina'> Janub Sina </option>
                                  <option value='Kafr ash Shaykh'> Kafr ash Shaykh </option>
                                  <option value='Matruh'> Matruh </option>
                                  <option value='Qina'> Qina </option>
                                  <option value='Shamal Sina'> Shamal Sina </option>
                                  <option value='Suhaj'> Suhaj </option>
                                </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="owner_name" class="col-sm-4 control-label">Owner Name</label>
                              <div class="col-sm-6">
                                  <input id="owner_name" type="text" class="form-control" name="owner_name" value="{{ old('owner_name') }}">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="email" class="col-sm-4 control-label">Owner Email</label>
                              <div class="col-sm-6">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="mobile" class="col-sm-4 control-label">Owner Mobile</label>
                              <div class="col-sm-6">
                                  <input id="mobile" type="number" class="form-control" name="mobile" value="{{ old('mobile') }}">
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-sm-6 col-sm-offset-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="is_new"> Is New Item <strong>(Not Used Before)</strong>
                                      </label>
                                  </div>
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-sm-6 col-sm-offset-4">
                                  <button type="submit" class="btn btn-primary ">
                                     Submit
                                  </button>
                              </div>
                          </div>

                      </form> <!-- / Form -->
                  </div>
              </div>
          </div>
      </div>
  </div>




@endsection
