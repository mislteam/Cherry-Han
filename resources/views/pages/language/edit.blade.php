
@extends('layouts.admin')
@section('content')

    <div class="row">
        <?php $segment = Request::segment(4);?>
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php 
                    echo translate($segment.'_list');?></h3>
                    <div class="ibox-tools">
                  
                        <a href="{{ route('languageIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
                    
            
                    {{--<form action="{{ route('languageUpdate', ['word_id' => $language->word_id, 'status' => $segment]) }}" method="POST" accept-charset="utf-8" class="wizard-big">--}}

                    <form action="{{URL('/language/update/'.$language->word_id.'/'.$segment)}}" method="POST" accept-charset="utf-8" class="wizard-big">
                       
                        @csrf
         
                            <div class="row">
                                <div class="col-lg-12">
                                   {{--<div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><?php echo translate('word')?></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="word" value="{{ $language->word }}" class="form-control {{ $errors->has('word') ? 'is-invalid':'' }}" required>
                                            @if($errors->has('word') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('word') }}</span>
                                            @endif
                                        </div>
                                    </div>--}}
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><?php echo translate('english')?></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="english" value="{{$language->english}}" class="form-control {{ $errors->has('english') ? 'is-invalid':'' }}" required>
                                            @if($errors->has('english') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('english') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><?php echo translate('myanmar')?></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="myanmar" value="{{$language->myanmar}}" class="form-control {{ $errors->has('myanmar') ? 'is-invalid':'' }}" required>
                                            @if($errors->has('myanmar') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('myanmar') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                        <a href="{{ route('languageIndex') }}" class="btn btn-default float-right mr-3">@lang('global.cancel')</a>
                                    </div>
                            
                                    
                                </div>
                              
                            </div>    
  
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection

