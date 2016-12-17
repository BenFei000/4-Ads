@extends('layouts.app')
@section('title', '4-Ads | Search')

@section('content')
    @include('errors.validation') <!-- Display validation errors-->
    <div class="container">
      <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading btn-default">Search For an Ad</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{Route('getsearchresult')}}">
                          {{ csrf_field() }}

                          <div class="form-group">
                              <label for="query" class="col-sm-4 control-label">Query</label>
                              <div class="col-sm-6">
                                  <input id="query" type="text" class="form-control" name="query" value="{{ old('query') }}">
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
                              <div class="col-sm-6 col-sm-offset-4">
                                  <button type="submit" class="btn btn-primary ">
                                      <i class="fa fa-search"></i> Search  For Ad
                                  </button>
                              </div>
                          </div>

                      </form> <!-- / Form -->

                          <div class="form-group">
                              <label for="email" class="col-sm-4 control-label">Categories</label>
                              <div class="col-sm-6">
                                  <@foreach($MainCategories as $MainCategory)
                                      <div class="dropdown pull-left">
                                          <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">{{$MainCategory->name}}
                                              <span class="caret"></span></button>
                                          <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                              @foreach($SubCategories as $subCategory)
                                                  @if($MainCategory->id==$subCategory->main_category_id)
                                                  <li role="presentation">
                                                          <form method="get" action="{{Route('getsearchcategory')}}">
                                                          <input type="submit" id="{{$subCategory->id}}" name="category_id" class="btn btn-link" value="{{$subCategory->name}}"/>
                                                          </form>
                                                      </li>
                                                  @endif
                                              @endforeach
                                          </ul>
                                      </div>
                                  @endforeach
                              </div>
                          </div>


                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
