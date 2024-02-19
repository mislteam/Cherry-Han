@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('compose_message'); ?></h3>
                    <div class="ibox-tools">
                     
                        <a href="{{route('messageAdd')}}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
            
                    <form action="{{ route('messageUpdate',$message->id) }}" method="POST" accept-charset="utf-8" class="wizard-big" enctype="multipart/form-data">
                       
                        @csrf         
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group row {{ $errors->has('msg_to') ? 'has-error':'' }}">
                                        <label class="col-sm-2 col-form-label"><?php echo translate('sent_to'); ?></label>
                                        <div class="col-sm-6">
                                            <select  name="msg_to" class="form-control selectpicker" data-live-search="true" placeholder="<?php echo translate('placeholder_sent_to') ?>">
                                                <option><?php echo translate('select') ?></option>
                                                @foreach($apiusers as $apiuser)
                                                    <option value="{{ $apiuser->id }}" <?php if ($apiuser->id==$message->msg_to): echo "selected";?>
                                                        
                                                    <?php endif ?>>{{ $apiuser->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('bus_gate_id') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('bus_gate_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('subject') ? 'has-error':'' }}">
                                        <label class="col-sm-2 col-form-label"><?php echo translate('subject'); ?></label>
                                        <div class="col-sm-6">
                                            <input type="text" name="subject" value="{{$message->subject}}" placeholder="<?php echo translate('placeholder_subject') ?>"  class="form-control">
                                            @if($errors->has('subject') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('subject') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('file') ? 'has-error':'' }}">
                                        <label class="col-sm-2 col-form-label"><?php echo translate('attach_file'); ?></label>
                                        <div class="col-sm-6">
                                            <input type="file" multiple name="file[]" placeholder="<?php echo translate('placeholder_attach_file') ?>"  class="form-control">
                                            @if($errors->has('file') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('file') }}</span>
                                            @endif

                                            <?php
                                     
                                            $file = json_decode($message->file, true);
                                            foreach($file as $key =>$img){
                                        ?>

                                            <!-- start -->
                                            <div class="clone hide">

                                              <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                                    <input type="hidden" name="old_file[]" value="{{$img}}" class="myfrm form-control-file">                    
                                                   <img src="{{asset('gallery/message/'.$img)}}" alt="message_{{$key}}" width="100">
                                                <div class="input-group-btn"> 
                                                  <button class="remove" type="button"><i class="fldemo glyphicon "> x </i>  </button>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- end -->
                                        <?php }?>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row {{ $errors->has('description') ? 'has-error':'' }}">
                                        
                                            <div class="col-sm-12">
                                                <textarea type="text" name="description" class="form-control summernote  {{ $errors->has('description') ? 'is-invalid':'' }}" value="{{ old('description') }}" required>{{$message->description}}</textarea>
                                                @if($errors->has('description') || 1)
                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                    </div>

                                    
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                        <a href="{{ route('termIndex') }}" class="btn btn-default float-right mr-3">@lang('global.cancel')</a>
                                    </div>
     
                                </div>
                                
                            </div>    
  
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection
