@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_banner'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('bannerIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <form action="{{ route('bannerCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row {{ $errors->has('page_name') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('page_name_*'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="page_name" placeholder="<?php echo translate('placeholder_page_name') ?>"  class="form-control">
                                @if($errors->has('page_name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('page_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('service_type') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('service_type_*'); ?></label>
                            <div class="col-sm-8">
                                <select  name="service_type" class="form-control select2_demo_1" placeholder="@lang('form.car.country_id.placeholder')">
                                    <option value="">select...</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->type }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('banner_type') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('banner_type_*'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="banner_type" placeholder="<?php echo translate('placeholder_banner_type') ?>"  class="form-control">
                                @if($errors->has('banner_type') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('banner_type') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('banner_photo') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('banner_photo_*'); ?></label>
                            <div class="col-sm-8">
                                <input type="file" name="banner_photo" placeholder="<?php echo translate('placeholder_car_driver_exp') ?>" class="form-control required"> 
                                @if($errors->has('banner_photo') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('banner_photo') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <!-- Submit Buttom -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <span class="float-right">
                                    <a href="{{ route('bannerIndex') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
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
