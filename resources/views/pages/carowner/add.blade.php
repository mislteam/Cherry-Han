
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
                        <div class="col-md-12">
                            <form action="{{ route('carownerCreate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group row {{ $errors->has('name') ? 'has-error':'' }}">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('car_ownner_name_*')?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" class="form-control" required>
                                        @if($errors->has('name') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('country_id') ? 'has-error':'' }}">
                                    <label  class="col-sm-4 col-form-label"><?php echo translate('country_*')?></label>
                                    <div class="col-sm-8">
                                        <select  name="country_id" id="country_id" class="form-control select2_demo_1" placeholder="@lang('form.car.country_id.placeholder')" required>
                                            <option value="">select...</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('state_*')?></label>
                                    <div class="col-sm-8">
                                        <select  name="state_id" id="state_id" class="form-control select2_demo_1" placeholder="@lang('form.car.state_id.placeholder')" required>
                                            <option value="">select...</option>
                                           {{-- @foreach($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('city_*')?></label>
                                    <div class="col-sm-8">
                                        <select  name="city_id" id="city_id" class="form-control select2_demo_1" placeholder="@lang('form.car.city_id.placeholder')" required>
                                            <option value="">select...</option>
                                            {{--@foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                                     
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('phone_no_*')?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('email_*')?></label>
                                    
                                    <div class="col-sm-8">
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('address_*')?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo translate('feature_photo_*')?></label>
                                    
                                    <div class="col-sm-8">
                                       <input type="file" name="feature_photo" class="form-control" required>
                                    </div>
                                </div>
                               
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                    <a href="{{ route('carownerIndex') }}" class="btn btn-default float-right mr-3">@lang('global.cancel')</a>
                                </div>
                                
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>


 @endsection


