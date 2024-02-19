@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-10 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_cars'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('carsIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    
                    <form enctype="multipart/form-data" id="form" method="post" action="{{ route('carsCreate')}}" class="wizard-big">
                        @csrf

                       

                        <h1 class="bg-cherryhan">Car Information</h1>
                        <fieldset>
                            <input type="hidden" name="stype" id="stype" value="car">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('car_name_*'); ?></label>
                                        <input type="text" name="name" placeholder="<?php echo translate('placeholder_car_name') ?>"  class="form-control" required>
                                        @if($errors->has('name') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('brand_id') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('car_brands_*'); ?></label>
                                        <select  name="brand_id" id="brand_id" class="form-control select2_demo_1" data-live-search="true"  placeholder="<?php echo translate('placeholder_car_brands') ?>" required>
                                            <option value=""><?php echo translate('choose_car_brand'); ?></option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('brand_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('brand_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('model_id') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('car_models_*'); ?></label>
                                        <select  name="model_id" id="model_id" class="form-control select2_demo_1" data-live-search="true"  placeholder="<?php echo translate('placeholder_car_model') ?>" required>
                                            <option value=""><?php echo translate('choose_car_model'); ?></option>
                                            @foreach($models as $model)
                                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('model_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('model_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('car_type_id') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('car_type_*')?></label>
                                        <select  name="car_type_id" id="car_type_id" class="form-control select2_demo_1" placeholder="@lang('form.car.car_type_id.placeholder')" required>
                                            <option value="">select...</option>
                                            @foreach($cartypes as $cartype)
                                                <option value="{{ $cartype->id }}">{{ $cartype->name }}</option>
                                            @endforeach
                                        </select>
                                         @if($errors->has('car_type_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('car_type_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ ($errors->has('width') || $errors->has('height') || $errors->has('length')) ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('car_body_space_*'); ?></label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="number" name="width" placeholder="<?php echo translate('placeholder_car_body_width') ?>"  class="form-control" required>
                                                @if($errors->has('width') || 1)
                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('width') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" name="height" placeholder="<?php echo translate('placeholder_car_body_height') ?>"  class="form-control" required>
                                                @if($errors->has('height') || 1)
                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('height') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" name="length" placeholder="<?php echo translate('placeholder_car_body_length') ?>"  class="form-control" required>
                                                @if($errors->has('length') || 1)
                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('length') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">@lang('cruds.car.trip_type.label') *</label>
                                       
                                        <div class="d-flex"> 
                                            <input type="radio" id="trip_type" name="trip_type" class="mr-2 {{ $errors->has('trip_type') ? 'is-invalid':'' }}" value="Within City" checked required> Within City
                                            <input type="radio" id="trip_type" name="trip_type" class="mr-2 ml-4 {{ $errors->has('trip_type') ? 'is-invalid':'' }}" value="Highway" required> Highway
                                            
                                        </div>
                                        @if($errors->has('trip_type') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('trip_type') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-form-label">@lang('cruds.car.day_type.label') *</label>
                                        
                                        <div class="d-flex"> 
                                            <input type="radio" id="day_type" name="day_type" class="mr-2 {{ $errors->has('day_type') ? 'is-invalid':'' }}" value="Full Day" checked required> Full Day
                                            <input type="radio" id="day_type" name="day_type" class="ml-2 mr-2 {{ $errors->has('day_type') ? 'is-invalid':'' }}" value="Half Day" required> Half Day
                                            <input type="radio" id="day_type" name="day_type" class="ml-2 mr-2 {{ $errors->has('day_type') ? 'is-invalid':'' }}" value="Airport/Highway Bus Station" required> Airport/Highway Bus Station
                                        </div>
                                        @if($errors->has('day_type') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('day_type') }}</span>
                                        @endif
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo translate('car_ac_*') ?></label>
                                        <div class="d-flex"> 
                                            <input type="radio" id="ac" name="ac" class="mr-2 {{ $errors->has('ac') ? 'is-invalid':'' }}" value="yes" required> Yes
                                            <input type="radio" id="ac" name="ac" class="ml-4 mr-2 {{ $errors->has('ac') ? 'is-invalid':'' }}" value="no" checked required> No
                                        </div>
                                        @if($errors->has('ac') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('ac') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">@lang('cruds.car.airbag.label') *</label><br>
                                        <div class="d-flex">
                                            <input type="radio" id="airbag" name="airbag" class="mr-2 {{ $errors->has('airbag') ? 'is-invalid':'' }}" value="yes" required> Yes
                                            <input type="radio" id="airbag" name="airbag" class="ml-4 mr-2{{ $errors->has('airbag') ? 'is-invalid':'' }}" value="no" checked required> No
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="col-form-label">@lang('cruds.car.seat_no.label') *</label>
                                        <input type="number" id="seat_no" name="seat_no" class="form-control {{ $errors->has('seat_no') ? 'is-invalid':'' }}" value="{{ old('seat_no') }}" required>
                                        @if($errors->has('seat_no') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('seat_no') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">@lang('cruds.car.wheel_drive.label') *</label>
                                        <input type="text" id="wheel_drive" name="wheel_drive" class="form-control {{ $errors->has('wheel_drive') ? 'is-invalid':'' }}" value="{{ old('wheel_drive') }}" required>
                                        @if($errors->has('wheel_drive') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('wheel_drive') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">@lang('cruds.car.abs.label') *</label>
                                        <input type="text" id="abs" name="abs" class="form-control {{ $errors->has('abs') ? 'is-invalid':'' }}" value="{{ old('abs') }}" required>
                                        @if($errors->has('abs') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('abs') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-form-label">@lang('cruds.car.laggage.label') *</label>
                                        <input type="text" id="no_of_laggage" name="no_of_laggage" class="form-control {{ $errors->has('no_of_laggage') ? 'is-invalid':'' }}" value="{{ old('no_of_laggage') }}" required>
                                        @if($errors->has('no_of_laggage') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('no_of_laggage') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-form-label">@lang('cruds.car.license_type.label') *</label>
                                        <input type="text" id="license_type" name="license_type" class="form-control {{ $errors->has('license_type') ? 'is-invalid':'' }}" value="{{ old('license_type') }}" required>
                                        @if($errors->has('license_type') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('license_type') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('country_id') ? 'has-error':'' }}">
                                        <label class="col-form-label">@lang('cruds.car.country_id.label') *</label>
                                        <select  name="country_id" id="country_id" class="form-control select2_demo_1" placeholder="@lang('form.car.country_id.placeholder')" required>
                                            <option value="">select...</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('country_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('country_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('state_id') ? 'has-error':'' }}">
                                        <label class="col-form-label">@lang('cruds.car.state_id.label') *</label>
                                        <select  name="state_id" id="state_id" class="form-control select2_demo_1" placeholder="@lang('form.car.state_id.placeholder')" required>
                                            <option value="">select...</option>
                                            {{-- @foreach($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach --}}
                                        </select>
                                        @if($errors->has('state_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('state_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('city_id') ? 'has-error':'' }}">
                                        <label class="col-form-label">@lang('cruds.car.city_id.label') *</label>

                                        <select  name="city_id" id="city_id" class="form-control select2_demo_1" placeholder="@lang('form.car.city_id.placeholder')" required>
                                            <option value="">select...</option>    
                                        </select>
                                        @if($errors->has('city_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('city_id') }}</span>
                                        @endif
                                    </div>
                                                                                                 
                                </div>                               
                            </div> 
                        </fieldset>
                  
                        
                         <h1 class="bg-cherryhan">Services</h1>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--  -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><span class="text-right text-muted text-small">Services *</span></th>
                                                <!-- <th>Value <span class="text-right text-muted text-small">Service name</span></th> -->
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="kpi-setdata">
                                            <tr>
                                                <td class="col-lg-6">
                                                    <input class="form-control " name="service[]" value="" type="text" placeholder="Service (eg. Fuel: Diesel)" required>
                                                </td>
                                                <!-- <td class="col-lg-6">
                                                    <input class="form-control" name="kpivalue[]" value="" type="text" placeholder="Service name">
                                                </td> -->
                                                <td class="col-lg-2">
                                                    <span class=" btn btn-cherryhan fa fa-trash-o text-danger" misl-add-removes></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <div class="btn btn-cherryhan" style="margin-top: 10px">
                                            <span class="pvb_ddn-text" misl-add-rows="#kpi-setdata"><i class="fa fa-plus-circle"></i> Add New Row</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                        <h1 class="bg-cherryhan">Owner Driver Information</h1>
                        <fieldset>
                            <h2>Owner Driver Information</h2>
                            <div class="text-center">
                                <!-- <h2>You did it Man :-) style="margin-top: 120px"</h2> -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">                                         
                                            <select  name="owner_id" id="owner_id" class="form-control" placeholder="<?php echo translate('Placeholder_owner_name')?>">
                                                @foreach($ownners as $owner)
                                                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        
                                        <select  name="driver_id" id="driver_id" class="form-control" placeholder="<?php echo translate('Placeholder_driver_name')?>">

                                            @foreach($drivers as $driver)
                                                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <h1 class="bg-cherryhan">Feature Gallery</h1>
                        <fieldset>
                            <h2>Feature Gallery</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('feature_photo') ? 'has-error':'' }}">
                                        <label class="col-form-label">@lang('cruds.car.feature_photo.label') *</label>
                                        <input type="file" id="feature_photo" name="feature_photo" class="form-control {{ $errors->has('feature_photo') ? 'is-invalid':'' }}" required>
                                        @if($errors->has('feature_photo') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('feature_photo') }}</span>
                                        @endif
                                        
                                    </div>  
                                    <div class="form-group {{ $errors->has('gallery') ? 'has-error':'' }}">
                                        <label class="col-form-label">@lang('cruds.car.gallery.label') *</label>
                                        <input type="file" multiple name="gallery[]" class="form-control {{ $errors->has('gallery') ? 'is-invalid':'' }}" value="{{ old('gallery') }}" required>
                                        @if($errors->has('gallery') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('gallery') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                            
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection
