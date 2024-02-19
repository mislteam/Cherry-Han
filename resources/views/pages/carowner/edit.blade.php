@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('car_owner'); ?></h3>
                    <div class="ibox-tools">
                
                        <a href="{{ route('carownerIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('carownerUpdate', $carowner->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                          <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo translate('car_owner_name_*')?> </label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" value="{{ $carowner->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo translate('country_*')?></label>
                                <div class="col-sm-8">
                                    <select  name="country_id" id="country_id" class="form-control select2_demo_1" placeholder="@lang('form.car.country_id.placeholder')">
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" <?php if ($country->id==$carowner->country_id): echo "selected"; ?>
                                                
                                            <?php endif ?>>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo translate('state_*')?></label>
                                <div class="col-sm-8">
                                    <select  name="state_id" id="state_id" class="form-control select2_demo_1" placeholder="@lang('form.car.state_id.placeholder')">
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}" <?php if ($state->id==$carowner->state_id): echo "selected"; ?>
                                                
                                            <?php endif ?>>{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo translate('city_*')?></label>
                                <div class="col-sm-8">
                                    <select  name="city_id" id="city_id" class="form-control select2_demo_1" placeholder="@lang('form.car.city_id.placeholder')">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" <?php if ($city->id==$carowner->city_id): echo "selected"; ?>
                                                
                                            <?php endif ?>>{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo translate('phone_no_*')?></label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone" class="form-control" value="{{ $carowner->phone }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo translate('email_*')?></label>
                                <div class="col-sm-8">
                                    <input type="text" name="email" class="form-control" value="{{ $carowner->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo translate('address_*')?> </label>
                                <div class="col-sm-8">
                                    <input type="text" name="address" class="form-control" value="{{ $carowner->address }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo translate('feature_photo_*')?> </label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="old_feature_photo" value="{{$carowner->feature_photo}}" class="myfrm form-control-file">
                                    <input type="file" name="feature_photo" class="form-control"><br>
                                    <img class="" src="{{asset('feature/carowner/'.$carowner->feature_photo)}}" width="100" alt="feature_photo">
                                </div>
                            </div>
                       
                            <div class="form-group ">
                                <button type="submit" class="btn btn-success float-right"><?php echo translate('save'); ?></button>
                                <a href="{{ route('carownerIndex') }}" class="btn btn-default float-right mr-3"><?php echo translate('cancel'); ?></a>
                            </div>
                        </form>
                        </div>
                    </div>
                              
                    
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection
