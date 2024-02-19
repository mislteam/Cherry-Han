
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('tour_itineary'); ?></h3>
                    <div class="ibox-tools">
                  
                        <a href="{{ route('touritinearyIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
            
                    <form action="{{ route('touritinearyUpdate', $touritineary->id) }}" method="POST" accept-charset="utf-8" class="wizard-big">
                       
                        @csrf
         
                            <div class="row">
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label>@lang('cruds.tour.title.label')</label>
                                        <input type="text" name="title" value="{{$touritineary->title}}" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}" value="{{ old('title') }}" required>
                                        @if($errors->has('title') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('cruds.tour.description.label')</label>
                                        <textarea type="text" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" value="{{ old('description') }}" required>{{$touritineary->description}}</textarea>
                                        @if($errors->has('description') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                     <div class="form-group">
                                        <label>@lang('cruds.tour.tour_name.label')</label>
                                        <select  name="tour_id" class="form-control" placeholder="@lang('form.car.country_id.placeholder')">
                                            @foreach($tours as $tour)
                                                <option value="{{ $tour->id }}" <?php if ($tour->id==$touritineary->tour_id): echo "selected"; ?>
                                                    
                                                <?php endif ?>>{{ $tour->tour_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                        <a href="{{ route('touritinearyIndex') }}" class="btn btn-default float-right mr-3">@lang('global.cancel')</a>
                                    </div>
                            
                                    
                                </div>
                              
                            </div>    
  
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection

