
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('edit_tour_destination_place'); ?></h3>
                    <div class="ibox-tools">
                  
                        <a href="{{ route('tourdestinationplaceIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
            
                    <form action="{{ route('tourdestinationplaceUpdate', $tourdestinationplaces->id) }}" method="POST" accept-charset="utf-8" class="wizard-big" enctype="multipart/form-data">
                       
                        @csrf
         
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><?php echo translate('tour_destination_*') ?></label>
                                        <input type="text" name="name" placeholder="<?php echo translate('placeholder_tour_destination') ?>" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name', $tourdestinationplaces->name) }}" required>
                                        @if($errors->has('name') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('description
                                        ') ? 'is-invalid':'' }}">
                                        <label><?php echo translate('tour_description_*') ?></label>
                                        <textarea name="description" class="form-control" placeholder="<?php echo translate('placeholder_tour_description') ?>" required>{{$tourdestinationplaces->description}}</textarea>
                                        @if($errors->has('description') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>

                                     <div class="form-group {{ $errors->has('tour_destination_id') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_destination_*')?></label>
                                        <select  name="tour_destination_id" id="tour_destination_id" class="form-control select2_demo_1" placeholder="<?php echo translate('tour_destination')?>" required>
                                            <option value="">select...</option>
                                            @foreach($tourdestinations as $row)
                                                <option value="{{ $row->id }}" <?php if ($tourdestinationplaces->tour_destination_id==$row->id): echo "selected"; ?>
                                                    
                                                <?php endif ?>>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                         @if($errors->has('tour_destination_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('tour_destination_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo translate('feature_photo_*')?></label>
                                        <input type="hidden" name="old_feature_photo" value="{{$tourdestinationplaces->feature_photo}}" class="myfrm form-control-file">

                                        <input type="file" name="feature_photo" class="form-control">
                                        <br/>
                                        <img class="" src="{{asset('feature/tourdestinationplace/'.$tourdestinationplaces->feature_photo)}}" width="100" alt="feature_photo">
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-cherryhan float-right"><?php echo translate('save') ?></button>
                                        <a href="{{ route('tourdestinationplaceIndex') }}" class="btn btn-default float-right mr-3"><?php echo translate('cancel'); ?></a>
                                    </div>
                            
                                    
                                </div>
                              
                            </div>    
  
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection

