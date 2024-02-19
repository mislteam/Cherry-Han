
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-8 mx-auto">
                <div class="ibox-title">
                    <h3>{{translate('airline_edit')}}</h3>
                    <div class="ibox-tools">

                        <a href="{{ route('airlinesIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>

                    </div>
                </div>
                <div class="ibox-content">

                    <form action="{{ route('airlinesUpdate', $airline->id) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="wizard-big">

                        @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><?php echo translate('airline_name')?> *</label>
                                        <input type="text" name="name" placeholder="<?php echo translate('placeholder_airline_name') ?>" value="{{ $airline->name}}" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                        @if($errors->has('name') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('feature_photo')?> *</label>
                                        <input type="hidden" name="old_feature_photo" value="{{$airline->feature_photo}}" class="myfrm form-control-file">
                                        <input type="file" name="feature_photo" class="form-control">
                                        <br/>
                                        <?php if(file_exists('feature/airline/'.$airline->feature_photo)){ ?>
                                            <img class="" src="{{asset('feature/airline/'.$airline->feature_photo)}}" width="100" alt="feature_photo">
                                        <?php } ?>
                                    </div>
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

