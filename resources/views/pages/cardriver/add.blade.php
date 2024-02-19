@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_car_driver'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('cardriverIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('cardriverCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group row {{ $errors->has('name') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('car_driver_name_*'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" placeholder="<?php echo translate('placeholder_car_driver_name') ?>"  class="form-control" required>
                                        @if($errors->has('name') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('phone') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('phone_*'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="phone" placeholder="<?php echo translate('placeholder_driver_phone') ?>"  class="form-control" required>
                                        @if($errors->has('phone') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('email') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('car_driver_email_*'); ?></label>
                                    <div class="col-sm-8">
                                        <input name="email" type="email" placeholder="<?php echo translate('placeholder_car_driver_email') ?>" class="form-control" required> 
                                        @if($errors->has('email') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('age') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('car_driver_age_*'); ?></label>
                                    <div class="col-sm-8">
                                        <input name="age" type="age" placeholder="<?php echo translate('placeholder_car_driver_age') ?>" class="form-control" required> 
                                        @if($errors->has('age') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('age') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row col-form-label {{ $errors->has('gender') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('car_driver_gender_*'); ?></label>
                                    <div class="col-sm-8 d-flex">
                                    	@foreach($gender as $key=>$val)
                                            <div class="i-checks pr-2"><label> <input type="radio" value="{{ $key }}" name="gender" <?php echo ($val == 'male')?"checked":""; ?>> <i></i> {{ ucwords($val) }} </label></div>
                                        @endforeach
        	                            
        	                            <!-- <div class="i-checks pl-2"><label> <input type="radio" value="no" name="gender"> <i></i> Female </label></div> -->
        	                            @if($errors->has('gender') || 1)
        	                        		<span class="form-text m-b-none text-danger">{{ $errors->first('gender') }}</span>
        	                            @endif
        	                        </div>
                                </div>

                                <div class="form-group row {{ $errors->has('country') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('country_*'); ?></label>
                                    <div class="col-sm-8">
                                        <select  name="country_id" id="country_id" class="form-control select2_demo_1" data-live-search="true" placeholder="<?php echo translate('placeholder_country') ?>" required>
                                        	<option><?php echo translate('choose_country') ?></option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        
                                        @if($errors->has('country') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('country') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('state') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('state_*'); ?></label>
                                    <div class="col-sm-8">
                                        <select  name="state_id" id="state_id" class="form-control select2_demo_1" data-live-search="true" placeholder="<?php echo translate('placeholder_state') ?>" required>
                                        	<option><?php echo translate('choose_state') ?></option>
                                            {{--@foreach($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach--}}
                                        </select>
                                        
                                        @if($errors->has('state') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('state') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('city') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('city_*'); ?></label>
                                    <div class="col-sm-8">
                                        <select  name="city_id" id="city_id" class="form-control select2_demo_1" data-live-search="true" placeholder="<?php echo translate('placeholder_city') ?>" required>
                                        	<option><?php echo translate('choose_city') ?></option>
                                            {{--@foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach--}}
                                        </select>
                                        
                                        @if($errors->has('city') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('address') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('car_driver_address_*'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="address" placeholder="<?php echo translate('placeholder_car_driver_address') ?>"  class="form-control" required>
                                        <!-- <input id="address" name="address" type="text" class="form-control"> -->
                                        @if($errors->has('address') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                

                                <div class="form-group row {{ $errors->has('license_type') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('car_driver_license_*'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="license_type" placeholder="<?php echo translate('placeholder_car_driver_license') ?>"  class="form-control" required>
                                        <!-- <input id="license_type" name="license_type" type="text" class="form-control"> -->
                                        @if($errors->has('license_type') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('license_type') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('tour_exp') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('driver_tour_exp_*'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tour_exp" placeholder="<?php echo translate('placeholder_driver_tour_exp') ?>"  class="form-control" required>
                                        <!-- <input id="tour_exp" name="tour_exp" type="text" class="form-control">                                     -->
                                        @if($errors->has('tour_exp') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('tour_exp') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('drive_exp') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('car_driver_exp_*'); ?></label>
                                    <div class="col-sm-8">
                                        <input name="drive_exp" type="text" placeholder="<?php echo translate('placeholder_car_driver_exp') ?>" class="form-control" required> 
                                        <!-- <input id="drive_exp" name="drive_exp" type="text" class="form-control">                                     -->
                                        @if($errors->has('drive_exp') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('drive_exp') }}</span>
                                        @endif
                                    </div>
                                </div>
                                 <div class="form-group row {{ $errors->has('language') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('language_*'); ?></label>
                                    <div class="col-sm-8">
                                        <table class="table">
                                            
                                            <tbody id="kpi-setdata">
                                                <tr>
                                                    <td class="col-lg-6">
                                                        <input class="form-control " name="language[]" value="" type="text" placeholder="<?php echo translate('language'); ?>">
                                                    </td>
                                                  
                                                    <td class="col-lg-2">
                                                        <span class=" btn btn-cherryhan fa fa-trash-o text-danger" misl-add-removes></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="btn btn-cherryhan">
                                            <span class="pvb_ddn-text" misl-add-language="#kpi-setdata"><i class="fa fa-plus-circle"></i>Add Language</span>
                                        </div>
                                
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <!-- Submit Buttom -->
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <span class="float-right">
                                            <a href="{{ route('cardriverIndex') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
                                            <button type="submit" class="btn btn-cherryhan"><?php echo translate('save') ?></button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
