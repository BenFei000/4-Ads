@extends('layouts.app')
@section('title', '4-Ads | Add Category')

@section('content')

  @include('errors.validation') <!-- Display validation errors-->

  <section id="add_category"><!--form-->
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
          <div class="login-form"><!--Main Category form-->
            <h2>Add Main Category</h2>
            <form action="{{url('add/main/category')}}" method="post">
                {{ csrf_field() }}
              <input type="text" placeholder="Category Name" id="main_category_name"
              name="main_category_name"/>
              <button type="submit" class="btn btn-default">ADD</button>
            </form>
          </div><!--/Main Category form-->
        </div>
        <div class="col-sm-1">
          <h2 class="or">OR</h2>
        </div>
        <div class="col-sm-4">
          <div class="signup-form"><!-- Sub Category form-->
            <h2>Add Sub Category</h2>
            <form action="{{url('add/sub/category')}}" method="post">
                {{ csrf_field() }}
              <select  id="main_category" name='main_category'>
                <option value=""> Select Main Category </option>
                <option value="main_category_id" > Mobiles </option>
                <option value="main_category_id"> Labtops </option>
                <option value="main_category_id"> Watches </option>
                <option value="main_category_id"> Other </option>
              </select>

              <input type="text" placeholder="Category Name"  id="sub_category_name"
              name="sub_category_name"/>
              <button type="submit" class="btn btn-default">ADD</button>
            </form>
          </div><!--/Sub Category form-->
        </div>
      </div>
    </div>
  </section><!--/form-->


@endsection
