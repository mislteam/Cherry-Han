@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-10 mx-auto">
                <div class="ibox-title">
                    <h3>Bus gate</h3>
                    <div class="ibox-tools">
                     
                        <a href="{{ route('busgateIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
            
                    <form action="{{ route('busgateCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="wizard-big">
                       
                        @csrf
         
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2"><?php echo translate('busgate_name') ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" placeholder="<?php echo translate('placeholder_busgate_name') ?>" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                            @if($errors->has('name') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2"><?php echo translate('busgate_phone') ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="phone" placeholder="<?php echo translate('placeholder_busgate_phone') ?>" class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}" value="{{ old('phone') }}" required>
                                            @if($errors->has('phone') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2"><?php echo translate('busgate_email') ?></label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" placeholder="<?php echo translate('placeholder_busgate_email') ?>" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ old('email') }}" required>
                                            @if($errors->has('email') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2"><?php echo translate('busgate_address') ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="address" placeholder="<?php echo translate('placeholder_busgate_address') ?>" class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}" value="{{ old('address') }}" required>
                                            @if($errors->has('address') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                
                                
  
                                    <div class="form-group row">
                                        <label class="col-sm-2"><?php echo translate('busgate_note') ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="note" placeholder="<?php echo translate('placeholder_busgate_note') ?>" class="form-control {{ $errors->has('note') ? 'is-invalid':'' }}" value="{{ old('note') }}" required>
                                            @if($errors->has('note') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('note') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-cherryhan float-right"><?php echo translate('save') ?></button>
                                        <a href="{{ route('busgateIndex') }}" class="btn btn-default float-right mr-3"><?php echo translate('cancel'); ?></a>
                                    </div>
                                </div>
                                
                            </div>    
  
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection
