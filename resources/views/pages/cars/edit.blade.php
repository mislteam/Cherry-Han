@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><?php echo translate('Edit_cars'); ?></h5>
                        @can('car.view')
                            <div class="ibox-tools">
                                <a href="{{ route('carsIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                            </div>
                        @endcan
                <div class="ibox-content">
                    <form enctype="multipart/form-data" id="form" method="post" action="{{ route('carsUpdate',$car->id)}}" class="wizard-big">
                        @csrf
                        <h1>Car Information </h1>
                        <fieldset>
                            <h2>Car Information</h2>

                            <!-- <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First name *</label>
                                        <input id="name" id="name" name="name" type="text" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                
                                    <div class="form-group">
                                        <label>Address *</label>
                                        <input id="address" name="address" type="text" class="form-control">
                                    </div>
                                </div>
                            </div> -->   

                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- @csrf -->
                                    <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
                                        <label>@lang('cruds.car.name.label') *</label>
                                        <input type="text" value="{{$car->name}}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                        @if($errors->has('name') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('cruds.car.brand_id.label') *</label>
                                        <select  name="brand_id" id="brand_id" value="{{$car->brand_id}}" class="form-control select2_demo_1" placeholder="@lang('form.car.brand_id.placeholder')">
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" <?php if ($brand->id==$car->brand_id){echo "selected";}else{echo "";} ?>
                                                    
                                                >{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('cruds.car.model_id.label') *</label>
                                        <select  name="model_id" value="{{$car->model_id}}" id="model_id" class="form-control select2_demo_1" placeholder="@lang('form.car.model_id.placeholder')">
                                            @foreach($models as $model)
                                                <option value="{{ $model->id }}" <?php if ($model->id==$car->model_id){echo "selected";}else{echo "";} ?>
                                                    
                                                >{{ $model->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row {{ ($errors->has('width') || $errors->has('height') || $errors->has('length')) ? 'has-error':'' }}">
                                        <label class="col-sm-2 col-form-label"><?php echo translate('car_body_space_*'); ?></label>
                                        <div class="col-sm-3">
                                            <input type="number" value="{{$car->width}}" name="width" placeholder="<?php echo translate('placeholder_car_body_width') ?>"  class="form-control">
                                            @if($errors->has('width') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('width') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="number" value="{{$car->height}}" name="height" placeholder="<?php echo translate('placeholder_car_body_height') ?>"  class="form-control">
                                            @if($errors->has('height') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('height') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" value="{{$car->length}}" name="length" placeholder="<?php echo translate('placeholder_car_body_length') ?>"  class="form-control">
                                            @if($errors->has('length') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('length') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>@lang('cruds.car.trip_type.label') *</label>
                                        
                                        <div class="d-flex">
                                            <input type="radio" id="trip_type" name="trip_type" class=" {{ $errors->has('trip_type') ? 'is-invalid':'' }}" value="Within City" <?php if ($car->trip_type=='Within City'):echo "checked"; ?>
                                                
                                            <?php endif ?> required> Within City
                                            <input type="radio" name="trip_type" class="ml-4 {{ $errors->has('trip_type') ? 'is-invalid':'' }}" value="Highway" <?php if ($car->trip_type=='Highway'):echo 'checked'; ?>
                                                
                                            <?php endif ?> required> Highway
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('cruds.car.day_type.label') *</label>
                                        
                                        <div class="d-flex">
                                            <input type="radio" id="day_type" name="day_type" class=" {{ $errors->has('day_type') ? 'is-invalid':'' }}" value="Full Day" <?php if ($car->day_type=='Full Day'):echo "checked"; ?>
                                                
                                            <?php endif ?> required> Full Day
                                            <input type="radio" name="day_type" class="ml-4 {{ $errors->has('day_type') ? 'is-invalid':'' }}" value="Half Day" <?php if ($car->day_type=='Half Day'):echo 'checked'; ?>
                                                
                                            <?php endif ?> required> Half Day
                                            <input type="radio" name="day_type" class="ml-4 {{ $errors->has('day_type') ? 'is-invalid':'' }}" value="Airport/Highway Bus Station" <?php if ($car->day_type=='Airport/Highway Bus Station'):echo 'checked'; ?>
                                                
                                            <?php endif ?> required> Airport/Highway Bus Station
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="form-group">
                                        <label>@lang('cruds.car.ac.label') *</label>
                                        <div class="d-flex">
                                            <input type="radio" value="{{$car->ac}}" name="ac" class=" {{ $errors->has('ac') ? 'is-invalid':'' }}" value="yes" <?php if ($car->ac=='yes') {
                                            echo 'checked';;
                                            }else{echo "";} ?> required> Yes
                                            <input type="radio" value="{{$car->ac}}" name="ac" class="ml-4 {{ $errors->has('ac') ? 'is-invalid':'' }}" value="no" <?php if ($car->ac=='no') {
                                              echo "checked";
                                            }else{echo "";} ?> required> No
                                            @if($errors->has('ac') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('ac') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label>@lang('cruds.car.airbag.label') *</label><br>
                                        <div class="d-flex">
                                            <input type="radio" id="airbag" name="airbag" class=" {{ $errors->has('airbag') ? 'is-invalid':'' }}" value="yes" <?php if ($car->airbag=='yes'):echo "checked"; ?>
                                                
                                            <?php endif ?> required> Yes
                                            <input type="radio" name="airbag" class="ml-4 {{ $errors->has('airbag') ? 'is-invalid':'' }}" value="no" <?php if ($car->airbag=='no'):echo 'checked'; ?>
                                                
                                            <?php endif ?> required> No
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('cruds.car.seat_no.label') *</label>
                                        <input type="number" value="{{$car->seat_no}}" name="seat_no" class="form-control {{ $errors->has('seat_no') ? 'is-invalid':'' }}" value="{{ old('seat_no') }}" required>
                                        @if($errors->has('seat_no') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('seat_no') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('cruds.car.wheel_drive.label') *</label>
                                        <input type="text" value="{{$car->wheel_drive}}" name="wheel_drive" class="form-control {{ $errors->has('wheel_drive') ? 'is-invalid':'' }}" value="{{ old('wheel_drive') }}" required>
                                        @if($errors->has('wheel_drive') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('wheel_drive') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('cruds.car.abs.label') *</label>
                                        <input type="text" value="{{$car->abs}}" name="abs" class="form-control {{ $errors->has('abs') ? 'is-invalid':'' }}" value="{{ old('abs') }}" required>
                                        @if($errors->has('abs') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('abs') }}</span>
                                        @endif
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>@lang('cruds.car.laggage.label') *</label>
                                        <input type="text" value="{{$car->no_of_laggage}}" name="no_of_laggage" class="form-control {{ $errors->has('no_of_laggage') ? 'is-invalid':'' }}" value="{{ old('no_of_laggage') }}" required>
                                        @if($errors->has('no_of_laggage') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('no_of_laggage') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('car_type_*')?></label>
                                        <select  name="car_type_id" id="car_type_id" class="form-control select2_demo_1" placeholder="@lang('form.car.car_type_id.placeholder')">
                                            <option value="">select...</option>
                                            @foreach($cartypes as $cartype)
                                                <option value="{{ $cartype->id }}" <?php if ($cartype->id==$car->car_type_id): echo "selected"; ?>
                                                    
                                                <?php endif ?>>{{ $cartype->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('cruds.car.license_type.label') *</label>
                                        <input type="text" value="{{$car->license_type}}" name="license_type" class="form-control {{ $errors->has('license_type') ? 'is-invalid':'' }}" value="{{ old('license_type') }}" required>
                                        @if($errors->has('license_type') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('license_type') }}</span>
                                        @endif
                                    </div>
                                     <div class="form-group">
                                        <label>@lang('cruds.car.country_id.label') *</label>
                                        <select  name="country_id" value="{{$car->country_id}}" class="form-control select2_demo_1" placeholder="@lang('form.car.country_id.placeholder')">
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" <?php if ($country->id==$car->country_id):echo "selected";?>
                                                    
                                                <?php endif ?>>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>@lang('cruds.car.state_id.label') *</label>
                                        <select  name="state_id" value="{{$car->state_id}}" id="state_id" class="form-control select2_demo_1" placeholder="@lang('form.car.state_id.placeholder')">
                                            @foreach($states as $state)
                                                <option value="{{ $state->id }}" <?php if ($state->id==$car->state_id):echo "selected"; ?>
                                                    
                                                <?php endif ?>>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>@lang('cruds.car.city_id.label') *</label>
                                        <select  name="city_id" value="{{$car->city_id}}" class="form-control select2_demo_1" id="city_id" placeholder="@lang('form.car.city_id.placeholder')">
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}" <?php if ($city->id==$car->city_id): echo "selected";?>
                                                    
                                                <?php endif ?>>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                                        
                                </div>                               
                            </div> 
                            <!-- <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('carsIndex') }}" class="btn btn-default float-right mr-3">@lang('global.cancel')</a>
                            </div>  -->
                        </fieldset>
                    <!-- </form>

 -->                    
                        <h1>Services</h1>

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
                                                $service = json_decode($car->service, true);
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
                   
                        
                        <h1>Owner Driver Information</h1>
                        <fieldset>
                            <h2>Owner Driver Information</h2>
                            <div class="text-center">
                                <!-- <h2>You did it Man :-) style="margin-top: 120px"</h2> -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">                                         
                                            <select  name="owner_id" value="{{$car->owner_id}}" class="form-control" placeholder="@lang('form.car.owner_id.placeholder')">
                                                @foreach($ownners as $owner)
                                                    <option value="{{ $owner->id }}" <?php if ($owner->id==$car->owner_id):echo "selected"; ?>
                                                        
                                                    <?php endif ?>>{{ $owner->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="float-left">Driver Info</label>
                                            <input type="text" name="driver_info" class="form-control {{ $errors->has('driver_info') ? 'is-invalid':'' }}" value="{{ old('driver_info') }}">
                                            @if($errors->has('driver_info') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('driver_info') }}</span>
                                            @endif
                                        </div>
 -->                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                       
                                        <select  name="driver_id" value="{{$car->driver_id}}" class="form-control" placeholder="@lang('form.car.driver_id.placeholder')">
                                            @foreach($drivers as $driver)
                                                <option value="{{ $driver->id }}" <?php if ($driver->id==$car->driver_id): echo "selected"; ?>
                                                    
                                                <?php endif ?>>{{ $driver->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <h1>Feature Gallery</h1>
                        
                        
                        <fieldset>
    <div class="row">
        <div class="col-md-12 row">
            <div class="form-group col-md-6">
                <label class="col-form-label"><?php echo translate('feature_photo_*') ?></label>
                <input type="file" name="feature_photo" class="form-control {{ $errors->has('feature_photo') ? 'is-invalid':'' }}" value="{{ old('feature_photo') }}" >
                @if($errors->has('feature_photo') || 1)
                    <span class="error invalid-feedback">{{ $errors->first('feature_photo') }}</span>
                @endif
            </div>
            <div class="col-md-3 mr-2 ml-2 mt-3" style="width: 100px;">
        		<img class="" src="{{asset('feature/cars/'.$car->feature_photo)}}" width="100" alt="feature_photo">
        	</div>  
        </div>
        <div class="col-md-12 row">
            <div class="form-group col-md-6">
                <label class="col-form-label"><?php echo translate('gallery_*') ?></label>
                <input type="hidden" name="old_feature_photo" value="{{$car->feature_photo}}" class="myfrm form-control-file">
                <input type="file" multiple name="gallery[]" class="form-control {{ $errors->has('gallery') ? 'is-invalid':'' }}" value="{{ old('gallery') }}">
                @if($errors->has('gallery') || 1)
                    <span class="error invalid-feedback">{{ $errors->first('gallery') }}</span>
                @endif
            </div>
        	
        	<div class="col-md-6">
        		<div class="row">
        		<?php                         
                    $gallery = json_decode($car->gallery, true);
                    foreach($gallery as $key =>$img){
                ?>  
                    <!-- start -->
                        <div class="hdtuto col-md-3 ml-2 mt-5" style="min-width: 100px;">
                          <img src="{{asset('gallery/cars/'.$img)}}" alt="gallery_{{$key}}" class="img img-responsive w-100 h-75">
                                <input type="hidden" name="old_gallery[]" value="{{$img}}" class="myfrm">     
                               
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
