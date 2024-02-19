@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('country_list'); ?></h3>
                    <div class="ibox-tools">
                     
                        <a href="{{ route('countryIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
            
                    <form action="{{ route('countryUpdate',$countries->id) }}" method="POST" accept-charset="utf-8" class="wizard-big">
                       
                        @csrf
         
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><?php echo translate('name')?></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{$countries->name}}" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                                            @if($errors->has('name') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><?php echo translate('code')?></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="code" value="{{$countries->code}}" class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}" required>
                                            @if($errors->has('code') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><?php echo translate('phcode')?></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phcode" class="form-control {{ $errors->has('phcode') ? 'is-invalid':'' }}" value="{{$countries->phcode}}" required>
                                            @if($errors->has('phcode') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('phcode') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                        <a href="{{ route('countryIndex') }}" class="btn btn-default float-right mr-3">@lang('global.cancel')</a>
                                    </div>
     
                                </div>
                                
                            </div>    
  
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection
