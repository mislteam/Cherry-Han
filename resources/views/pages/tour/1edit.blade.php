@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('travels_&_tours_service_list'); ?></h3>
                    <div class="ibox-tools">
                
                        <a href="{{ route('tourIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('tourUpdate',$tour->id) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="wizard-big">                      
                        @csrf       
                            
                        <div class="form-group row {{ $errors->has('tour_name') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('tour_name'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="tour_name" value="{{$tour->tour_name}}" placeholder="<?php echo translate('placeholder_tour_name') ?>"  class="form-control">
                                @if($errors->has('tour_name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('tour_name') }}</span>
                                @endif
                            </div>
                        </div>                                   
                                    
                        <div class="form-group row {{ $errors->has('tourcategory_id') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('tour_category'); ?></label>
                            <div class="col-sm-8">
                                <select  name="tourcategory_id" class="form-control select2_demo_1" data-live-search="true" placeholder="<?php echo translate('placeholder_tour_category') ?>">
                                    
                                    @foreach($tourcategorys as $tourcategory)
                                        <option value="{{ $tourcategory->id }}" <?php if ($tourcategory->id==$tour->category_id): echo "selected"; ?>
                                            
                                        <?php endif ?>>{{ $tourcategory->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('tourcategory_id') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('tourcategory_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('tourdestination_id') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('tour_destination'); ?></label>
                            <div class="col-sm-8">
                                <select  name="tourdestination_id" class="form-control select2_demo_1" data-live-search="true" placeholder="<?php echo translate('placeholder_tour_destination') ?>">
                                    <option><?php echo translate('choose_one') ?></option>
                                   @foreach($tourdestinations as $tourdestination)
                                        <option value="{{ $tourdestination->id }}" <?php if ($tourdestination->id==$tour->destination_id): echo "selected"; ?>
                                            
                                        <?php endif ?>>{{ $tourdestination->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('tourdestination_id') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('tourdestination_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('price') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('price'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="price" value="{{$tour->price}}" placeholder="<?php echo translate('placeholder_price') ?>"  class="form-control">
                                @if($errors->has('price') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row {{ $errors->has('description') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('description'); ?></label>
                            <div class="col-sm-8">
                               <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" value="{{ old('description') }}" required>{{ $tour->description }}</textarea>
                                @if($errors->has('description') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('touritineary') ? 'has-error':'' }} ">
                            <label class="col-sm-4 col-form-label"><?php echo translate('touritineary'); ?></label>
                            <div class="col-sm-8">
                                <table class="table table-bordered" border="1">
                                    <thead>
                                        <tr>
                                        <td colspan="3">Tour Itineary</td>
                                         <td><i class=" btn btn-success btn-sm fa fa-plus" id="add"></i></td>
                                    </tr>
                                    </thead>
                                    <tbody id="source"> 
                                    <?php 
                                        $no= 1;
                                        foreach($itineary as $list):
                                    ?>                               
                                        <tr class="clonethis">
                                           
                                            <td><input class="form-control" type="text" name="title[]" value="{{$list->title}}"></td>
                                            <td><input class="form-control" type="text" name="description1[]" value={{$list->description}}></td>
                                            <td><i class="btn btn-sm " id="minus" onclick="remove(event)">X</i></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                   
                                    </tfoot>
                                </table> 
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('package') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('package'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="package" value="{{$tour->package}}" placeholder="<?php echo translate('placeholder_package') ?>"  class="form-control">
                                @if($errors->has('package') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('package') }}</span>
                                @endif
                            </div>
                        </div>
                      
                        <div class="form-group row {{ $errors->has('passenger') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('passenger'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="passenger" value="{{$tour->passenger}}" placeholder="<?php echo translate('placeholder_passenger') ?>"  class="form-control">
                                @if($errors->has('passenger') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('passenger') }}</span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group row {{ $errors->has('include') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('includesive'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="include" value="{{$tour->include}}" placeholder="<?php echo translate('placeholder_includesive') ?>"  class="form-control">
                                @if($errors->has('include') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('include') }}</span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group row {{ $errors->has('exclude') ? 'has-error':'' }}">
                            <label class="col-sm-4 col-form-label"><?php echo translate('excludesive'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="exclude" value="{{$tour->exclude}}" placeholder="<?php echo translate('placeholder_excludesive') ?>"  class="form-control">
                                @if($errors->has('exclude') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('exclude') }}</span>
                                @endif
                            </div>
                        </div>                       
                                    
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?php echo translate('feature_photo') ?></label>
                            <div class="col-sm-8">
                                <input type="hidden" name="old_feature_photo" value="{{$tour->feature_photo}}" class="myfrm form-control-file">

                                <input type="file" name="feature_photo" class="form-control {{ $errors->has('feature_photo') ? 'is-invalid':'' }}" value="{{ old('feature_photo') }}" >
                                @if($errors->has('feature_photo') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('feature_photo') }}</span>
                                @endif
                                <br/>
                                <img class="" src="{{asset('feature/tour/'.$tour->feature_photo)}}" width="100" alt="feature_photo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">@lang('cruds.car.gallery.label')</label>
                            <div class="col-sm-8">
                                <input type="file" multiple name="gallery[]" class="form-control {{ $errors->has('gallery') ? 'is-invalid':'' }}" value="{{ old('gallery') }}">
                                @if($errors->has('gallery') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('gallery') }}</span>
                                @endif  

                                <?php
                         
                                $gallery = json_decode($tour->gallery, true);
                                foreach($gallery as $key =>$img){
                            ?>
                                

                                <!-- start -->
                                <div class="clone hide">

                                  <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                        <input type="hidden" name="old_gallery[]" value="{{$img}}" class="myfrm form-control-file">                    
                                       <img src="{{asset('gallery/tour/'.$img)}}" alt="gallery_{{$key}}" width="100">
                                    <div class="input-group-btn"> 
                                      <button class="remove" type="button"><i class="fldemo glyphicon "> x </i>  </button>
                                    </div>
                                  </div>
                                </div>
                                <!-- end -->
                            <?php }?>
                            </div>    
                        </div> 

                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                            <a href="{{ route('tourIndex') }}" class="btn btn-default float-right mr-3">@lang('global.cancel')</a>
                        </div>
 
                    </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection
