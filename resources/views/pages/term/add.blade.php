@extends('layouts.admin')

@section('content')
    <div class="row">
        
        <div class="col-lg-12">
            <div class="ibox col-lg-10 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_term_&_condition'); ?> </h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('termIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <form action="{{ route('termCreate') }}" method="post">
                        @csrf
                        
                        <div class="form-group {{ $errors->has('service_type') ? 'has-error':'' }}">
                            <label class=" col-form-label"><?php echo translate('service_type_*'); ?></label>
                            <div class="">
                            	<select  name="service_type" id="service_type" class="form-control select2_demo_1" placeholder="<?php echo translate('service_type') ?>">
                            		<option value=""><?php echo translate('select...') ?></option>
                                @foreach($services as $service)
                                    <option value="{{ $service->type }}">{{ $service->name }}</option>
                                @endforeach
                                </select>                        
                                @if($errors->has('service_type') || 1)
	                                <span class="form-text m-b-none text-danger">{{ $errors->first('service_type') }}</span>
	                            @endif  
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('title') ? 'has-error':'' }}">
                            <label class=" col-form-label"><?php echo translate('term_title_*'); ?></label>
                            <div class="">
                                <input type="text" name="title" placeholder="<?php echo translate('placehoder_term_title') ?>" class="form-control" value="{{ old('title') }}">
                                @if($errors->has('title') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? 'has-error':'' }}">
                            <label class=" col-form-label"><?php echo translate('description_*'); ?></label>
                            <div class="">
                            	<textarea name="description"  placeholder="<?php echo translate('placeholder_term_description') ?>"  class="form-control snote"  data-height="200"s="5"></textarea>
	                            @if($errors->has('description') || 1)
	                                <span class="form-text m-b-none text-danger">{{ $errors->first('description') }}</span>
	                            @endif                            
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <!-- Submit Buttom -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <span class="float-right">
                                    <a href="{{ route('termIndex') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
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
