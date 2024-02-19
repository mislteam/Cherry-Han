        @extends('layouts.admin')
        @section('content')
        <style type="text/css">
            .textarea1 {
            border: none;
            background-color: transparent;
            resize: none;
            outline: none;
        }
        </style>
            <div class="row ch-content">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-title">
                            <h3><?php echo translate('reply_message'); ?></h3>
                            
                           
                        </div>
                        <div class="ibox-content">

                            <form action="{{ route('replymessageCreate') }}" method="POST" accept-charset="utf-8" class="wizard-big" >
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row {{ $errors->has('msg_from') ? 'has-error':'' }}">
                                            <label class="col-sm-2 col-form-label"><?php echo translate('msg_from'); ?></label>
                                            <div class="col-sm-10">   
                                            <input type="hidden" name="message_id" value="{{$message->id}}">     
                                                
                                                <b>{{$message->apiuserfrom->name}}</b>
                                            </div>
                                        </div>
                                        <div class="form-group row {{ $errors->has('subject') ? 'has-error':'' }}">
                                            <label class="col-sm-2 col-form-label"><?php echo translate('subject'); ?></label>
                                            <div class="col-sm-10">  
                                                 
                                                <b>{{$message->subject}}</b>
                                            </div>
                                        </div>

                                        <div class="form-group row {{ $errors->has('description') ? 'has-error':'' }}">
                                                
                                        <div class="col-sm-12">
                                            <textarea name="description" id="textarea" class="form-control summernote  {{ $errors->has('description') ? 'is-invalid':'' }}" value="{{ old('description') }}" disabled>
                                           {!! $message->description !!}<hr><textarea class="textarea1" name="reply_message" onkeyup="myFunction()"></textarea>
                                           </textarea>

                                            @if($errors->has('description') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        
                                        <a href="" class="btn btn-default float-right ">@lang('global.cancel')</a>
                                        <button type="submit" class="btn btn-success float-right mr-3"><?php echo translate('reply')?></button>
                                    </div>
                                    </div>
                            
                                <div></div>
  
                        </div>
                    </div>

                </div>
            </div>
        @endsection
           
        