@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('terms_list'); ?></h3>
                    <div class="ibox-tools">
                     
                        <a href="{{ route('termIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
            
                    <form action="{{ route('termCreate') }}" method="POST" accept-charset="utf-8" class="wizard-big">
                       
                        @csrf
         
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><?php echo translate('terms_title') ?></label>
                                        <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}" value="{{ old('title') }}" required>
                                        @if($errors->has('title') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group ">
                                        <label>@lang('cruds.tour.description.label')</label>
                                        <textarea type="text" name="description" class="form-control summernote  {{ $errors->has('description') ? 'is-invalid':'' }}" value="{{ old('description') }}" required></textarea>
                                        @if($errors->has('description') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                     <div class="form-group">
                                        <label>@lang('cruds.car.service.label')</label>
                                        <select  name="service_type_id" class="form-control" placeholder="@lang('form.car.country_id.placeholder')">
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->type }}</option>
                                            @endforeach
                                        </select>
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
