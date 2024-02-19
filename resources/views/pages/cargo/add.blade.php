@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('cargo_add')?></h3>
                    <div class="ibox-tools">
                
                        <a href="{{ route('cargoIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
                    
                    <form enctype="multipart/form-data" id="form" method="post" action="{{ route('cargoCreate')}}" class="wizard-big">
                        @csrf
                        <h1 class="bg-cherryhan">Cargo Information</h1>
                        <fieldset> 
                        <input type="hidden" name="stype" id="stype" value="cargo">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <clabel><?php echo translate('cargo_name_*')?></label>
                                        <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                        @if($errors->has('name') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('brand_id') ? 'is-invalid':'' }}">
                                        <label><?php echo translate('brand_name_*')?></label>
                                        <select  name="brand_id" id="brand_id" class="form-control select2_demo_1" placeholder="@lang('form.car.brand_id.placeholder')" required>
                                            <option value=""><?php echo translate('select...')?></option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('brand_id') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('brand_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('model_id') ? 'is-invalid':'' }}">
                                        <label><?php echo translate('model_name_*')?></label>
                                        <select  name="model_id" id="model_id" class="form-control select2_demo_1" placeholder="<?php echo translate('placeholder_car_model') ?>" required>
                                            <option value=""><?php echo translate('select...')?></option>
                                            {{--@foreach($models as $model)
                                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                                            @endforeach--}}
                                        </select>
                                        @if($errors->has('model_id') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('model_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ ($errors->has('width') || $errors->has('height') || $errors->has('length')) ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('car_body_space_*'); ?></label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="number" name="width" placeholder="<?php echo translate('placeholder_cargo_body_width') ?>"  class="form-control" required>
                                                @if($errors->has('width') || 1)
                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('width') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" name="height" placeholder="<?php echo translate('placeholder_cargo_body_height') ?>"  class="form-control" required>
                                                @if($errors->has('height') || 1)
                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('height') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" name="length" placeholder="<?php echo translate('placeholder_cargo_body_length') ?>"  class="form-control" required>
                                                @if($errors->has('length') || 1)
                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('length') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('capicity_*')?></label>
                                        <input type="text" id="capicity" name="capicity" class="form-control {{ $errors->has('capicity') ? 'is-invalid':'' }}" value="{{ old('capicity') }}" required>
                                        @if($errors->has('capicity') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('capicity') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('car_type_id') ? 'is-invalid':'' }}">
                                        <label><?php echo translate('car_type_*')?></label>
                                        <select  name="car_type_id" class="form-control select2_demo_1" placeholder="@lang('form.car.country_id.placeholder')" required>
                                            <option value=""><?php echo translate('select...')?></option>
                                            @foreach($car_type as $cartype)
                                                <option value="{{ $cartype->id }}">{{ $cartype->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('car_type_id') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('car_type_id') }}</span>
                                        @endif
                                    </div>
                                                                      
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><?php echo translate('wheel_drive_*')?></label>
                                        <input type="text" id="wheel_drive" name="wheel_drive" class="form-control {{ $errors->has('wheel_drive') ? 'is-invalid':'' }}" value="{{ old('wheel_drive') }}" required>
                                        @if($errors->has('wheel_drive') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('wheel_drive') }}</span>
                                        @endif
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <label><?php echo translate('license_type_*')?></label>
                                        <input type="text" id="license_type" name="license_type" class="form-control {{ $errors->has('license_type') ? 'is-invalid':'' }}" value="{{ old('license_type') }}" required>
                                        @if($errors->has('license_type') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('license_type') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group {{ $errors->has('country_id') ? 'is-invalid':'' }}">
                                        <label><?php echo translate('country_*')?></label>
                                        <select  name="country_id" id="country_id" class="form-control select2_demo_1" placeholder="<?php echo translate('placeholder_country') ?>" required>
                                            <option value=""><?php echo translate('select...')?></option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('country_id') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('country_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('state_id') ? 'is-invalid':'' }}">
                                        <label><?php echo translate('state_*')?></label>
                                        <select  name="state_id" id="state_id" class="form-control select2_demo_1" placeholder="@lang('form.car.state_id.placeholder')" required>
                                            <option value=""><?php echo translate('select...')?></option>
                                            @foreach($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('state_id') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('state_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('city_id') ? 'is-invalid':'' }}">
                                        <label><?php echo translate('city_*')?></label>
                                        <select  name="city_id" id="city_id" class="form-control select2_demo_1" placeholder="@lang('form.car.city_id.placeholder')" required>
                                            <option value=""><?php echo translate('select...')?></option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('city_id') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('city_id') }}</span>
                                        @endif
                                    </div>
                                                                                                 
                                </div>                               
                            </div>
                           
                        </fieldset>
                    <!-- </form>

 -->                    
                        <h1 class="bg-cherryhan">Services </h1>
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
                            <div class="text-center">
                                <!-- <h2>You did it Man :-) style="margin-top: 120px"</h2> -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">                                         
                                            <select  name="ownner_id" id="owner_id" class="form-control" placeholder="@lang('form.car.owner_id.placeholder')">
                                                @foreach($ownners as $owner)
                                                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        
                                        <select  name="driver_id" id="driver_id" class="form-control" placeholder="@lang('form.car.driver_id.placeholder')">
                                            @foreach($drivers as $driver)
                                                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <h1 class="bg-cherryhan"><?php echo translate('feature_photo_&_gallery') ?></h1>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@lang('cruds.car.feature_photo.label') *</label>
                                        <input type="file" id="feature_photo" name="feature_photo" class="form-control {{ $errors->has('feature_photo') ? 'is-invalid':'' }}" value="{{ old('feature_photo') }}" required>
                                        @if($errors->has('feature_photo') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('feature_photo') }}</span>
                                        @endif
                                    </div>  
                                    <div class="form-group">
                                        <label>@lang('cruds.car.gallery.label') *</label>
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
