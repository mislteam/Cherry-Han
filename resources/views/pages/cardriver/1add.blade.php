@extends('layouts.admin')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('global.add')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('cardriverCreate') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Name </label>
                                        <input id="name" name="name" type="text" class="form-control">                                    
                                    </div>   
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input id="phone" name="phone" type="text" class="form-control">                                    
                                    </div>
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input id="email" name="email" type="email" class="form-control">                                    
                                    </div>  
                                    <div class="form-group">
                                        <label>Age </label>
                                        <input id="age" name="age" type="text" class="form-control">                                    
                                    </div> 
                                    <div class="form-group col-form-label">
                                        <label>Gender </label>
                                        <select  name="gender" class="form-control" placeholder="gender">
                                            @foreach($gender as $key=>$val)
                                                <option value="{{ $key }}">{{ $val }}</option>
                                            @endforeach
                                        </select>                                    
                                    </div>
                                    <div class="form-group">
                                        <label>License Type </label>
                                        <input id="license_type" name="license_type" type="text" class="form-control">                                       
                                    </div>   
                                                           
                                </div>
                                <div class="col-lg-6">               
                                    <!-- <div class="form-group">
                                        <label>Address </label>
                                        <input id="address" name="address" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tour Exp </label>
                                        <input id="tour_exp" name="tour_exp" type="text" class="form-control">                                    
                                    </div> 
                                    <div class="form-group">
                                        <label>Drive Exp </label>
                                        <input id="drive_exp" name="drive_exp" type="text" class="form-control">                                    
                                    </div>  -->
                                    <!-- <div class="form-group">
                                        <label>City</label>
                                        <select  name="city_id" class="form-control" placeholder="@lang('form.car.city_id.placeholder')">
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>      
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select  name="country_id" class="form-control" placeholder="@lang('form.car.country_id.placeholder')">
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <select  name="state_id" class="form-control" placeholder="@lang('form.car.state_id.placeholder')">
                                            @foreach($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> -->
                                </div>
                            </div> 
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('carownerIndex') }}" class="btn btn-default float-left">@lang('global.cancel')</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
