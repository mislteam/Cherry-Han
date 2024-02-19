@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-6 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_admin_user'); ?></h5>
                    <?php //print_r(auth()->user()->roles[0]->id  ); ?>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('userIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <form action="{{ route('userCreate') }}" method="post">
                        @csrf

                        <div class="form-group row {{ $errors->has('name') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('user_name'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" placeholder="<?php echo translate('placehoder_user_name') ?>" class="form-control" value="{{ old('name') }}">
                                @if($errors->has('name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('email') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('user_email'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="email"  placeholder="<?php echo translate('placehoder_user_email') ?>" class="form-control" value="{{ old('email') }}">
                                @if($errors->has('email') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('permissions') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('admin_user_role'); ?></label>
                            <div class="col-sm-10">
                                <select  name="roles" id="permission" class="perimission_select form-control " data-live-search="true"  placeholder="<?php echo translate('placeholder_permission') ?>" required>
                                    @foreach($roles as $role)
                                        @if($role->id !=1)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('permissions') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('permissions') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('password') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('user_password'); ?></label>
                            <div class="col-sm-10">
                                <input type="password" name="password" id="password-field" placeholder="<?php echo translate('placehoder_user_password') ?>" class="form-control" value="{{ old('password') }}">
                                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye toggle-password field-icon text-dark"></span> -->
                                @if($errors->has('password') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('password_confirmation') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('password_confirmation'); ?></label>
                            <div class="col-sm-10">
                                <input type="password" name="password_confirmation" id="password-confirm" placeholder="<?php echo translate('placehoder_password_confirmation') ?>" class="form-control" value="{{ old('password_confirmation') }}">
                                <!-- <span toggle="#password-confirm" class="fa fa-fw fa-eye toggle-password field-icon"></span> -->
                                @if($errors->has('password_confirmation') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="hr-line-dashed"></div>
                        <!-- Submit Buttom -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <span class="float-right">
                                    <a href="{{ route('userIndex') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
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
