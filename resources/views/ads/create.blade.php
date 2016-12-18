@extends('layouts.app')
@section('title', '4-Ads | Create Ad')
@section('content')

  <div class="container">
      <div class="row">
        @include('common.flashMessage')
          <div class="col-sm-8 col-sm-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading btn-default"> Place a Free Add </div>
                  <div class="panel-body">
                    @include('errors.validation') <!-- Display validation errors-->
                      <form class="form-horizontal" role="form" method="POST"
                      enctype="multipart/form-data" action="{{url('/create/advertisement')}}">
                          {{ csrf_field() }}

                          <div class="form-group">
                              <label for="title" class="col-sm-4 control-label">
                                Title <span style="color:red">*</span>
                              </label>
                              <div class="col-sm-6">
                                  <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="desc" class="col-sm-4 control-label">Description</label>
                              <div class="col-sm-6">
                                <textarea class="form-control" rows="5" id="desc" class="form-control"
                                 name="desc" > {{ old('desc') }} </textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="main_category" class="col-sm-4 control-label">
                                Main Category <span style="color:red">*</span>
                              </label>
                              <div class="col-sm-6">
                                <select class="form-control" id="main_category" name='main_category'>
                                  <option value=""> None </option>
                                  @foreach ($mainCategories as $category)
                                    <option value="{{$category->id}}"> {{$category->name}} </option>
                                  @endforeach
                                </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="sub_category" class="col-sm-4 control-label">
                                Sub Category <span style="color:red">*</span>
                              </label>
                              <div class="col-sm-6">
                                <select class="form-control" id="sub_category" name='sub_category'>
                                  <option value=""> None </option>
                                </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="price" class="col-sm-4 control-label">
                                Price <span style="color:red">*</span>
                              </label>
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
                              <label for="city" class="col-sm-4 control-label">
                                City <span style="color:red">*</span>
                              </label>
                              <div class="col-sm-6">
                                <select class="form-control" id="city" name='city'>
                                  @foreach ($cities as $cityName)
                                    <option value='{{$cityName}}'>{{$cityName}}</option>
                                  @endforeach
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
                              <label for="mobile" class="col-sm-4 control-label">
                                Owner Mobile <span style="color:red">*</span>
                              </label>
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
