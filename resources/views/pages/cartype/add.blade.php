@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-6 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_car_type'); ?></h5>
                    @can('car-type.view')
                        <div class="ibox-tools">
                            <a href="{{ route('cartypeIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <form action="{{ route('cartypeCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row {{ $errors->has('name') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('car_type_name_*'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" placeholder="<?php echo translate('placeholder_car_type_name') ?>"  class="form-control">
                                @if($errors->has('name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('service_type') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('service_type_*'); ?></label>
                            <div class="col-sm-10">
                                <select  name="service_type" class="form-control single_select2" data-live-search="true"  placeholder="<?php echo translate('placeholder_service_type') ?>" >
                                    <option><?php echo translate('choose_service_type'); ?></option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->type }}">{{ translate($service->name) }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('service_type') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('service_type') }}</span>
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
                                    <a href="{{ route('cartypeIndex') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
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
