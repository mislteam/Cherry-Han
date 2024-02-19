@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('edit_cargo_cars')?></h3>
                    <div class="ibox-tools">
                
                        <a href="{{ route('cargoIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
                    
                    <form enctype="multipart/form-data" id="form" method="post" action="{{ route('cargoUpdate',$cargo->id)}}" class="wizard-big">
                        @csrf
                        <h1 class="bg-cherryhan"><?php echo translate('cargo_information') ?></h1>
                        <fieldset> 

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <clabel><?php echo translate('cargo_name_*')?></label>
                                        <input type="text" id="name" value="{{$cargo->name}}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                        @if($errors->has('name') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('brand_name_*')?></label>
                                        <select  name="brand_id" id="brand_id"  class="form-control select2_demo_1" placeholder="@lang('form.car.brand_id.placeholder')">
                                            <option value=""><?php echo translate('select...')?></option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" <?php if ($brand->id==$cargo->brand_id): echo "selected"; ?>
                                                    
                                                <?php endif ?>>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('model_name_*')?></label>
                                        <select  name="model_id" id="model_id"  class="form-control select2_demo_1" placeholder="<?php echo translate('placeholder_model') ?>">
                                            @foreach($models as $model)
                                                <option value="{{ $model->id }}" <?php if ($model->id==$cargo->model_id): echo "selected"; ?>
                                                <?php endif ?>>{{ $model->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group {{ ($errors->has('width') || $errors->has('height') || $errors->has('length')) ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('car_body_space'); ?></label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="number" value="{{$cargo->width}}" name="width" placeholder="<?php echo translate('placeholder_cargo_body_width') ?>"  class="form-control" required>
                                                @if($errors->has('width') || 1)
                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('width') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" value="{{$cargo->height}}" name="height" placeholder="<?php echo translate('placeholder_cargo_body_height') ?>"  class="form-control" required>
                                                @if($errors->has('height') || 1)
                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('height') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" value="{{$cargo->length}}" name="length" placeholder="<?php echo translate('placeholder_cargo_body_length') ?>"  class="form-control" required>
                                                @if($errors->has('length') || 1)
                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('length') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('capicity_*')?></label>
                                        <input type="text" id="capacity" value="{{$cargo->capacity}}" name="capacity" class="form-control {{ $errors->has('capicity') ? 'is-invalid':'' }}" value="{{ old('capicity') }}" required>
                                        @if($errors->has('capicity') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('capicity') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('car_type_*')?></label>
                                        <select  name="car_type_id" class="form-control select2_demo_1" placeholder="<?php echo translate('placeholder_car_type') ?>">
                                            <option value=""><?php echo translate('select...')?></option>
                                            @foreach($car_type as $cartype)
                                                <option value="{{ $cartype->id }}" <?php if ($cartype->id==$cargo->car_type_id): echo "selected"; ?>
                                                    
                                                <?php endif ?>>{{ $cartype->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                                                      
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><?php echo translate('wheel_drive_*')?></label>
                                        <input type="text" id="wheel_drive" value="{{$cargo->wheel_drive}}" name="wheel_drive" class="form-control {{ $errors->has('wheel_drive') ? 'is-invalid':'' }}" value="{{ old('wheel_drive') }}" required>
                                        @if($errors->has('wheel_drive') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('wheel_drive') }}</span>
                                        @endif
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <label><?php echo translate('license_type_*')?></label>
                                        <input type="text" id="license_type" value="{{$cargo->license_type}}" name="license_type" class="form-control {{ $errors->has('license_type') ? 'is-invalid':'' }}" value="{{ old('license_type') }}" required>
                                        @if($errors->has('license_type') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('license_type') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label><?php echo translate('country_*')?></label>
                                        <select  name="country_id" id="country_id" class="form-control select2_demo_1" placeholder="<?php echo translate('placeholder_country') ?>">
                                          <option value=""><?php echo translate('select...')?></option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" <?php if ($country->id==$cargo->country_id): echo "selected"; ?>
                                                    
                                                <?php endif ?>>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('state_*')?></label>
                                        <select  name="state_id" id="state_id" class="form-control select2_demo_1" placeholder="@lang('form.car.state_id.placeholder')">
                                          <option value=""><?php echo translate('select...')?></option>
                                            @foreach($states as $state)
                                                <option value="{{ $state->id }}" <?php if ($state->id==$cargo->state_id):echo "selected"; ?>
                                                    
                                                <?php endif ?>>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo translate('city_*')?></label>
                                        <select  name="city_id" id="city_id" class="form-control select2_demo_1" placeholder="@lang('form.car.city_id.placeholder')">
                                            <option value=""><?php echo translate('select...')?></option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}" <?php if ($city->id==$cargo->city_id): echo "selected";?>
                                                    
                                                <?php endif ?>>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                                                                                 
                                </div>                               
                            </div>
                           
                        </fieldset>


                        <h1 class="bg-cherryhan"><?php echo translate('services') ?></h1>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--  -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><span class="text-right text-muted text-small">Services *</span></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="kpi-setdata">
                                            <?php
                                                $service = json_decode($cargo->service, true);
                                                foreach($service as $key =>$val){
                                            ?>
                                            <tr>
                                                <td class="col-lg-6">
                                                    <input class="form-control " name="service[]" value="{{$val}}" type="text" placeholder="Service (eg. Fuel: Diesel)">
                                                </td>
                                                
                                                <td class="col-lg-2">
                                                    <span class=" btn btn-cherryhan fa fa-trash-o text-danger" misl-add-removes></span>
                                                </td>
                                            </tr>
                                        <?php } ?>
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
                   
                        
                        <h1 class="bg-cherryhan"><?php echo translate('ownner_&_drivers_information') ?></h1>
                        <fieldset>
                            <div class="text-center">
                                <!-- <h2>You did it Man :-) style="margin-top: 120px"</h2> -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">                                         
                                            <select  name="ownner_id" id="owner_id" class="form-control" placeholder="@lang('form.car.owner_id.placeholder')">
                                                @foreach($ownners as $owner)
                                                    <option value="{{ $owner->id }}" <?php if ($owner->id==$cargo->owner_id): echo "selected"; ?>
                                                        
                                                    <?php endif ?>>{{ $owner->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        
                                        <select  name="driver_id" id="driver_id" class="form-control" placeholder="@lang('form.car.driver_id.placeholder')">
                                            @foreach($drivers as $driver)
                                                <option value="{{ $driver->id }}" <?php if ($driver->id==$cargo->driver_id): echo "selected"; ?>
                                                    
                                                <?php endif ?>>{{ $driver->name }}</option>
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
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label"><?php echo translate('feature_photo_*') ?></label>
                                        <input type="file" id="feature_photo" name="feature_photo" class="form-control {{ $errors->has('feature_photo') ? 'is-invalid':'' }}" value="{{ old('feature_photo') }}">
                                        @if($errors->has('feature_photo') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('feature_photo') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-3 mr-2 ml-2 mt-3" style="width: 100px;">
                                        <img class="img img-responsive w-100" src="{{asset('feature/cargo/'.$cargo->feature_photo)}}" alt="feature_photo">
                                    </div>  
                                </div>
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label"><?php echo translate('gallery_*') ?></label>
                                        <input type="hidden" name="old_feature_photo" value="{{$cargo->feature_photo}}" class="myfrm form-control-file">
                                        <input type="file" multiple name="gallery[]" class="form-control {{ $errors->has('gallery') ? 'is-invalid':'' }}" value="{{ old('gallery') }}">
                                        @if($errors->has('gallery') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('gallery') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="row">
                                        <?php                         
                                            $gallery = json_decode($cargo->gallery, true);
                                            foreach($gallery as $key =>$img){
                                        ?>  
                                            <!-- start -->
                                                <div class="hdtuto col-md-3 ml-2 mt-5" style="min-width: 100px;">
                                                  <img src="{{asset('gallery/cargo/'.$img)}}" alt="gallery_{{$key}}" class="img img-responsive w-100">
                                                        <input type="hidden" name="old_gallery[]" value="{{$img}}" class="myfrm ">     
                                                        <button class="remove img-times" type="button"><i class="fa fa-times"></i></button>
                                                </div>
                                            <!-- end -->
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection
