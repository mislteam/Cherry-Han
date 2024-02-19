@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-10 mx-auto">
                <div class="ibox-title">
                    <h3>{{ translate('add_new_airline')}}</h3>
                    <div class="ibox-tools">
                        <a href="{{ route('airlinesIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
                    </div>
                </div>
                <div class="ibox-content">

                    <form action="{{ route('airlinesCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="wizard-big">

                        @csrf
                            <input type="hidden" name="stype" id="stype" value="airticket">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><?php echo translate('airline_name')?> *</label>
                                        <input type="text" name="name" placeholder="<?php echo translate('placeholder_airline_name') ?>" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                        @if($errors->has('name') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('feature_photo')?> *</label>
                                        <input type="file" name="feature_photo" accept="image/jpg, image/png, image/jpeg" class="form-control {{ $errors->has('feature_photo') ? 'is-invalid':'' }}" value="{{ old('feature_photo') }}" required>
                                        @if($errors->has('feature_photo') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('feature_photo') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-cherryhan float-right"><?php echo translate('save') ?></button>
                                        <a href="{{ route('airlinesIndex') }}" class="btn btn-default float-right mr-3"><?php echo translate('cancel'); ?></a>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

 @endsection
