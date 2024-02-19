
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('tour_category'); ?></h3>
                    <div class="ibox-tools">
                  
                        <a href="{{ route('tourcategoryIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
            
                    <form action="{{ route('tourcategoryUpdate', $tourcategorys->id) }}" method="POST" accept-charset="utf-8" class="wizard-big">
                       
                        @csrf
         
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><?php echo translate('tour_category_name_*') ?></label>
                                        <input type="text" name="name" value="{{$tourcategorys->name}}" placeholder="<?php echo translate('placeholder_tour_category_name') ?>" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                        @if($errors->has('name') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-cherryhan float-right"><?php echo translate('save') ?></button>
                                        <a href="{{ route('tourcategoryIndex') }}" class="btn btn-default float-right mr-3"><?php echo translate('cancel') ?></a>
                                    </div>
                            
                                    
                                </div>
                              
                            </div>    
  
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection

