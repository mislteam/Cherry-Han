
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('edit_tour_destination'); ?></h3>
                    <div class="ibox-tools">
                  
                        <a href="{{ route('tourdestinationIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
            
                    <form action="{{ route('tourdestinationUpdate', $tourdestinations->id) }}" method="POST" accept-charset="utf-8" class="wizard-big" enctype="multipart/form-data">
                       
                        @csrf
         
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><?php echo translate('tour_destination_*') ?></label>
                                        <input type="text" name="name" placeholder="<?php echo translate('placeholder_tour_destination') ?>" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name', $tourdestinations->name) }}" required>
                                        @if($errors->has('name') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('description
                                        ') ? 'is-invalid':'' }}">
                                        <label><?php echo translate('tour_description_*') ?></label>
                                        <textarea name="description" class="form-control" placeholder="<?php echo translate('placeholder_tour_description') ?>" required>{{$tourdestinations->description}}</textarea>
                                        @if($errors->has('description') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo translate('feature_photo_*')?></label>
                                        <input type="hidden" name="old_feature_photo" value="{{$tourdestinations->feature_photo}}" class="myfrm form-control-file">

                                        <input type="file" name="feature_photo" class="form-control">
                                        <br/>
                                        <img class="" src="{{asset('feature/tourdestination/'.$tourdestinations->feature_photo)}}" width="100" alt="feature_photo">
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-cherryhan float-right"><?php echo translate('save') ?></button>
                                        <a href="{{ route('tourdestinationIndex') }}" class="btn btn-default float-right mr-3"><?php echo translate('cancel'); ?></a>
                                    </div>
                            
                                    
                                </div>
                              
                            </div>    
  
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection

