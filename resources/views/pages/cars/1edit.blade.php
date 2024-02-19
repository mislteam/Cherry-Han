@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_cars'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('carsIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <form action="{{ route('carsUpdate', $car->id) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row {{ $errors->has('name') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('car_name'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="<?php echo $car->name; ?>" placeholder="<?php echo translate('placeholder_car_name') ?>"  class="form-control">
                                @if($errors->has('name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('brand_id') ? 'has-error':'' }} ">
                            <label class="col-sm-2 col-form-label"><?php echo translate('car_brands'); ?></label>
                            <div class="col-sm-10">
                                <!-- <input type="text" name="brand_id" placeholder="<?php //echo translate('car_brands') ?>" class="form-control"> -->
                                <select  name="brand_id"  class="form-control selectpicker" data-live-search="true"  placeholder="<?php echo translate('placeholder_car_brands') ?>">
                                    <option><?php echo translate('choose_car_brand'); ?></option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" <?php echo ($brand->id == $car->brand_id)?'selected':''; ?>>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('brand_id') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('brand_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('model_id') ? 'has-error':'' }} ">
                            <label class="col-sm-2 col-form-label"><?php echo translate('car_models'); ?></label>
                            <div class="col-sm-10">
                                <!-- <input type="text" name="model_id" placeholder="<?php //echo translate('car_brands') ?>" class="form-control"> -->
                                <select  name="model_id" class="form-control selectpicker" data-live-search="true"  placeholder="<?php echo translate('placeholder_car_model') ?>" >
                                    <option><?php echo translate('choose_car_model'); ?></option>
                                    @foreach($models as $model)
                                        <option value="{{ $model->id }}" <?php echo ($model->id == $car->model_id)?'selected':''; ?>>{{ $model->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('model_id') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('model_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('width') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('car_body_width'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="width" value="<?php echo $car->width ?>" placeholder="<?php echo translate('placeholder_car_body_width') ?>"  class="form-control">
                                @if($errors->has('width') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('width') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('height') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('car_body_height'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="height" value="<?php echo $car->height; ?>" placeholder="<?php echo translate('placeholder_car_body_height') ?>"  class="form-control">
                                @if($errors->has('height') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('height') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('trip_type') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('trip_type'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="trip_type" value="<?php echo $car->trip_type; ?>" placeholder="<?php echo translate('placeholder_trip_type') ?>"  class="form-control">
                                @if($errors->has('trip_type') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('trip_type') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('day_type') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('day_type'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="day_type" value="<?php echo $car->day_type; ?>" placeholder="<?php echo translate('placeholder_day_type') ?>"  class="form-control">
                                @if($errors->has('day_type') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('day_type') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('country_id') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('country'); ?></label>
                            <div class="col-sm-10">
                                <!-- <input type="text" name="model_id" placeholder="<?php //echo translate('car_brands') ?>" class="form-control"> -->
                                <select  name="country_id" class="form-control selectpicker" data-live-search="true"  placeholder="<?php echo translate('placeholder_country') ?>" >
                                    <option><?php echo translate('choose_country'); ?></option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" <?php echo ($country->id == $car->country_id)?'selected':''; ?>>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('country_id') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('country_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('state_id') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('state'); ?></label>
                            <div class="col-sm-10">
                                <!-- <input type="text" name="model_id" placeholder="<?php //echo translate('car_brands') ?>" class="form-control"> -->
                                <select  name="state_id" class="form-control selectpicker" data-live-search="true"  placeholder="<?php echo translate('placeholder_state') ?>" >
                                    <option><?php echo translate('choose_state'); ?></option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}" <?php echo ($state->id == $car->state_id)?'selected':''; ?>>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('state_id') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('state_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('city_id') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('city'); ?></label>
                            <div class="col-sm-10">
                                <!-- <input type="text" name="model_id" placeholder="<?php //echo translate('car_brands') ?>" class="form-control"> -->
                                <select  name="city_id" class="form-control selectpicker" data-live-search="true"  placeholder="<?php echo translate('placeholder_city') ?>" >
                                    <option><?php echo translate('choose_city'); ?></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" <?php echo ($city->id == $car->city_id)?'selected':''; ?>>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('city_id') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('city_id') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row {{ $errors->has('seat_no') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('seat_no'); ?></label>
                            <div class="col-sm-10">
                                <input type="number" name="seat_no" value="<?php echo $car->seat_no; ?>" placeholder="<?php echo translate('placeholder_seat_no') ?>"  class="form-control">
                                @if($errors->has('seat_no') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('seat_no') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('ac') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('car_ac'); ?></label>
                            <div class="col-sm-10 d-flex">
                                <div class="i-checks pr-2"><label> <input type="radio" value="yes" name="ac" <?php echo ($car->ac == 'yes')?'checked':''; ?>> <i></i> Yes </label></div>
                                <div class="i-checks pl-2"><label> <input type="radio" value="no" name="ac" <?php echo ($car->ac == 'no')?'checked':''; ?>> <i></i> No </label></div>
                                @if($errors->has('ac') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('ac') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('abs') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('abs'); ?></label>
                            <div class="col-sm-10 d-flex">
                                <div class="i-checks pr-2"><label> <input type="radio" value="yes" name="abs" <?php echo ($car->abs == 'yes')?'checked':''; ?> > <i></i> Yes </label></div>
                                <div class="i-checks pr-2"><label> <input type="radio" value="no" name="abs" <?php echo ($car->abs == 'no')?'checked':''; ?> > <i></i> No </label></div>
                                @if($errors->has('abs') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('abs') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('airbag') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('airbag'); ?></label>
                            <div class="col-sm-10 d-flex">
                                <div class="i-checks pr-2"><label> <input type="radio" value="yes" name="airbag" <?php echo ($car->airbag == 'yes')?'checked':''; ?>> <i></i> Yes </label></div>
                                <div class="i-checks pr-2"><label> <input type="radio" value="no" name="airbag" <?php echo ($car->airbag == 'no')?'checked':''; ?>> <i></i> No </label></div>
                                @if($errors->has('airbag') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('airbag') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('service') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('service'); ?></label>
                            <div class="col-sm-10" >
                                <input type="text" name="service" value="<?php echo $car->service; ?>" placeholder="<?php echo translate('placeholder_service') ?>"  class="form-control">
                                @if($errors->has('service') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('service') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('no_of_laggage') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('laggage'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="no_of_laggage" value="<?php echo $car->no_of_laggage; ?>" placeholder="<?php echo translate('placeholder_laggage') ?>"  class="form-control">
                                @if($errors->has('no_of_laggage') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('no_of_laggage') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('wheel_drive') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('wheel_drive'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="wheel_drive" value="<?php echo $car->wheel_drive; ?>" placeholder="<?php echo translate('placeholder_wheel_drive') ?>"  class="form-control">
                                @if($errors->has('wheel_drive') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('wheel_drive') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('license_type') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('license_type'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="license_type" value="<?php echo $car->license_type; ?>" placeholder="<?php echo translate('placeholder_license_type') ?>"  class="form-control">
                                @if($errors->has('license_type') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('license_type') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('driver_id') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('driver_name'); ?></label>
                            <div class="col-sm-10">
                                <select  name="driver_id" class="form-control selectpicker" data-live-search="true"  placeholder="<?php echo translate('placeholder_driver_name') ?>">
                                    <option><?php echo translate('choose_driver'); ?></option>
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id }}" <?php echo ($car->driver_id == $driver->id)? "selected":""; ?> >{{ $driver->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('driver_id') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('driver_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('ownner_id') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('ownner_name'); ?></label>
                            <div class="col-sm-10">
                                <select  name="ownner_id" class="form-control selectpicker" data-live-search="true"  placeholder="<?php echo translate('placeholder_ownner_name') ?>">
                                    <option><?php echo translate('placeholder_driver_name'); ?></option>
                                    @foreach($ownners as $owner)
                                        <option value="{{ $owner->id }}" <?php echo ($car->ownner_id == $owner->id)? "selected":""; ?> >{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('ownner_id') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('ownner_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('feature_photo') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('feature_photo'); ?></label>
                            <div class="col-sm-10">
                                <input type="file" name="feature_photo" placeholder="<?php echo translate('placeholder_feature_photo') ?>"  class="form-control">
                                @if($errors->has('feature_photo') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('feature_photo') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('gallery') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('gallery'); ?></label>
                            <div class="col-sm-10">
                                <input type="file" name="gallery[]" multiple placeholder="<?php echo translate('placeholder_gallery') ?>"  class="form-control">
                                @if($errors->has('gallery') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('gallery') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <!-- Submit Buttom -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <span class="float-right">
                                    <!-- <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                    <button class="btn btn-primary btn-sm" type="submit">Save changes</button> -->
                                    <a href="{{ route('carsIndex') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
                                    <button type="submit" class="btn btn-cherryhan"><?php echo translate('save') ?></button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
