
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('change_password') ?></h3>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('changepasswordUpdate',$user->id) }}" method="post" accept-charset="utf-8" class="wizard-big">                      
                        @csrf
                            <div class="form-group">
                                <label><?php echo translate('admin_user_name') ?></label>
                                <input type="text" value="{{$user->name}}" placeholder="<?php echo translate('placeholder_admin_user_name'); ?>" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                @if($errors->has('name') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label><?php echo translate('admin_user_email'); ?></label>
                                <input type="email" value="{{$user->email}}"  placeholder="<?php echo translate('placeholder_admin_user_email'); ?>"name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ old('email') }}" required>
                                @if($errors->has('email') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group {{ $errors->has('new_password') ? 'is-invalid':'' }}">
                                <label><?php echo translate('admin_user_password'); ?></label>
                                <input type="password" name="new_password" placeholder="<?php echo translate('placeholder_admin_user_password'); ?>" class="form-control" required>
                               @if($errors->has('new_password') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('new_password') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('confirm_password') ? 'is-invalid':'' }}">
                                <label><?php echo translate('admin_user_confirm_password'); ?></label>
                                <input type="password" name="confirm_password" placeholder="<?php echo translate('placeholder_admin_user_confirm_password'); ?>" class="form-control" required>
                                @if($errors->has('confirm_password') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">

                                <button type="submit" class="btn btn-success float-right">@lang('global.save')</button> 
                                
                            </div>
                            <div class="form-group"></div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
 @endsection




