@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-6 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_category'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('categoryIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <form action="{{ route('categoryCreate') }}" method="post">
                        @csrf

                        <div class="form-group row {{ $errors->has('name') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('category_name'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" placeholder="<?php echo translate('placehoder_category_name') ?>" class="form-control" value="{{ old('name') }}">
                                @if($errors->has('name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('type') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('category_type'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="type" placeholder="<?php echo translate('placehoder_category_type') ?>" class="form-control" value="{{ old('type') }}">
                                @if($errors->has('type') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('type') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <!-- Submit Buttom -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <span class="float-right">
                                    <a href="{{ route('categoryIndex') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
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
