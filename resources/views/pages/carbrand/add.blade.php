@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-6 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_car_brand'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('carbrandIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <form action="{{ route('carbrandCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row {{ $errors->has('name') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('car_brand_name'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="name" placeholder="<?php echo translate('placeholder_car_name') ?>"  class="form-control">
                                @if($errors->has('name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('seo_title') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('seo_title'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="seo_title" placeholder="<?php echo translate('seo_title') ?>"  class="form-control">
                                @if($errors->has('seo_title') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('seo_title') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <!-- Submit Buttom -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <span class="float-right">
                                    <a href="{{ route('carbrandIndex') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
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
