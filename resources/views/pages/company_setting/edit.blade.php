@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-8 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('edit_company_setting'); ?></h5>
                    @can('car-type.view')
                        <div class="ibox-tools">
                            <a href="{{ route('companysettingIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <form action="{{ route('companysettingUpdate',$companysetting->id) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row {{ $errors->has('name') ? 'has-error':'' }}">
                            <label class="col-sm-2 col-form-label"><?php echo translate('company_name_*'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" placeholder="<?php echo translate('placeholder_company_name') ?>" value="{{$companysetting->name}}"  class="form-control" required>
                                @if($errors->has('name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('logo') ? 'has-error':'' }}">
                            <label class="col-form-label col-sm-2"><?php echo translate('company_logo') ?></label>
                            <div class="col-sm-10">
                                <input type="hidden" name="old_logo" value="{{$companysetting->logo}}" class="myfrm form-control-file">

                                <input type="file" name="logo" class="form-control {{ $errors->has('logo') ? 'is-invalid':'' }}" >

                                <br/>
                                <img class="" src="{{asset('feature/company/'.$companysetting->logo)}}" width="150" alt="company_logo">
                                @if($errors->has('logo') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('logo') }}</span>
                                @endif
                            </div>
                            
                        </div>

                        <!-- Submit Buttom -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <span class="float-right">
                                 
                                    <a href="{{ route('companysettingIndex') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
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
