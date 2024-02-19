@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('room_type'); ?></h3>
                    <div class="ibox-tools">
                     
                        <a href="{{ route('roomtypeIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>

                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('roomtypeCreate') }}" method="POST" accept-charset="utf-8" class="wizard-big">
   
                            @csrf        
                               <div class="form-group">
                                    <label>@lang('cruds.hotel.name.label')</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                    @if($errors->has('name') || 1)
                                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>@lang('cruds.hotel.price.label')</label>
                                    <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                    @if($errors->has('price') || 1)
                                        <span class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>@lang('cruds.hotel.description.label')</label>
                                    <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" value="{{ old('description') }}" required></textarea>
                                    
                                    @if($errors->has('description') || 1)
                                        <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>@lang('cruds.roomtype.hotel_id.label')</label>
                                    <select  name="hotel_id" class="form-control select2_demo_1" placeholder="@lang('form.car.country_id.placeholder')">
                                        <option value="">select...</option>
                                        @foreach($hotels as $hotel)
                                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                    <a href="{{ route('roomtypeIndex') }}" class="btn btn-default float-right mr-3">@lang('global.cancel')</a>
                                                    
                                </div>  
                              
  
                            </form>
                        </div>
                    </div>
            

                </div>
               
            </div>
        </div>
    </div>

   
 
 @endsection
