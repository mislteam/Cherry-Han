@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-6 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_role'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('roleIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <form action="{{ route('roleCreate') }}" method="post">
                        @csrf

                        <div class="form-group row {{ $errors->has('name') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('role_name'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" placeholder="<?php echo translate('placehoder_role_name') ?>" class="form-control" value="{{ old('name') }}">
                                @if($errors->has('name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row {{ $errors->has('permissions') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('permission'); ?></label>
                            <div class="col-sm-10">
                                <select  name="permissions[]" id="permission" class="multi_select2 form-control " multiple="multiple" data-live-search="true"  placeholder="<?php echo translate('placeholder_permission') ?>" required>
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->title }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('permissions') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('permissions') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('title') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('role_title'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="title"  placeholder="<?php echo translate('placehoder_role_title') ?>" class="form-control" value="{{ old('title') }}">
                                @if($errors->has('title') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="hr-line-dashed"></div>
                        <!-- Submit Buttom -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <span class="float-right">
                                    <a href="{{ route('roleIndex') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
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
