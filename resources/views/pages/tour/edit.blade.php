@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><?php echo translate('edit_travels_&_tours'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('tourIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    
                    <form enctype="multipart/form-data" id="form" method="post" action="{{ route('tourUpdate', $tour->id)}}" class="wizard-big">
                        @csrf

                        <h1 class="bg-cherryhan"><?php echo translate('tour_information') ?></h1>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('tour_name') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_name_*'); ?></label>
                                        <input type="text" name="tour_name" value="{{$tour->tour_name}}" placeholder="<?php echo translate('placeholder_tour_name') ?>"  class="form-control" required>
                                        @if($errors->has('tour_name') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('tour_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('tourcategory_id') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_category_*'); ?></label>
                                        <select  name="tourcategory_id" id="tourcategory_id" class="form-control select2_demo_1" data-live-search="true"  placeholder="<?php echo translate('placeholder_tour_category') ?>" required>
                                            <option value=""><?php echo translate('select...'); ?></option>
                                            @foreach($tourcategorys as $tourcategory)
                                                <option value="{{ $tourcategory->id }}" <?php echo ($tourcategory->id == $tour->category_id)? 'selected':''; ?>>{{ $tourcategory->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('tourcategory_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('tourcategory_id') }}</span>
                                        @endif
                                    </div>


                                    <div class="form-group {{ $errors->has('tourdestination_id') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_destination_*'); ?></label>
                                        <select  name="tourdestination_id[]" id="tourdestination_id" class="form-control select2_demo_4"  placeholder="<?php echo translate('placeholder_tour_destination') ?>" multiple="multiple">
                                           
                                            @foreach($tourdestinations as $tourdestination)

                                            <?php
                                                $destination= json_decode($tour->destination_id, true);
                                                
                                            ?>
                                                 <option value="{{ $tourdestination->id }}"@foreach($destination as $key=>$val){{$val == $tourdestination->id ? 'selected': ''}}   @endforeach> {{ $tourdestination->name }}</option>

                                                {{--<option value="{{ $tourdestination->id }}" <?php echo ($tourdestination->id == $tour->destination_id)? 'selected':''; ?>>{{ $tourdestination->name }}</option>--}}
                                            @endforeach
                                        </select>
                                        @if($errors->has('tourdestination_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('tourdestination_id') }}</span>
                                        @endif
                                    </div>
                                

                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo translate('price_*')?></label>
                                        <input type="text" name="price" value="{{$tour->price}}" placeholder="<?php echo translate('placeholder_price') ?>"  class="form-control">
                                        @if($errors->has('price') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('description') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_description_*'); ?></label>
                                        <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" required>{{ $tour->description }}</textarea>
                                        @if($errors->has('description') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>

                                </div>    
                                <div class="col-lg-6">
                                     <div class="form-group {{ ($errors->has('package')) ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_package_*') ?></label>
                                        <input type="text" name="package" value="{{$tour->package}}" placeholder="<?php echo translate('placeholder_package') ?>"  class="form-control">
                                        @if($errors->has('package') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('package') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group {{ ($errors->has('passenger'))? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('no_of_passenger_*') ?></label>
                                        <input type="text" name="passenger" value="{{ $tour->passenger }}" placeholder="<?php echo translate('placeholder_passenger') ?>"  class="form-control">
                                        @if($errors->has('passenger') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('passenger') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ ($errors->has('contact_person'))? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('contact_person_*') ?> </label>
                                        <input type="text" name="contact_person" value="{{ $tour->contact_person }}" placeholder="<?php echo translate('placeholder_contact_person') ?>"  class="form-control" required>
                                        @if($errors->has('contact_person') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('contact_person') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group {{ ($errors->has('phone'))? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('phone_*') ?> </label>
                                        <input type="text" name="phone" value="{{ $tour->phone }}" placeholder="<?php echo translate('placeholder_phone') ?>"  class="form-control" required>
                                        @if($errors->has('phone') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                     <div class="form-group {{ ($errors->has('email'))? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('email_*') ?> </label>
                                        <input type="email" name="email" value="{{ $tour->email }}" placeholder="<?php echo translate('placeholder_email') ?>"  class="form-control" required>
                                        @if($errors->has('email') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ ($errors->has('website'))? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('website_*') ?> </label>
                                        <input type="text" name="website" value="{{ $tour->website }}" placeholder="<?php echo translate('placeholder_website') ?>"  class="form-control" required>
                                        @if($errors->has('website') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('website') }}</span>
                                        @endif
                                    </div>
                                </div>                                                        
                            </div> 
                        </fieldset>

                        <h1 class="bg-cherryhan"><?php echo translate('tour_itineary') ?></h1>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('include') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_inclusive_*'); ?></label>
                                        <textarea name="include" class="form-control {{ $errors->has('include') ? 'is-invalid':'' }}" required>{{$tour->include}}</textarea>
                                        @if($errors->has('include') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('include') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('exclude') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_exclusive_*'); ?></label>
                                        <textarea name="exclude" class="form-control {{ $errors->has('exclude') ? 'is-invalid':'' }}" required>{{$tour->exclude}}</textarea>
                                        @if($errors->has('exclude') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('exclude') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <!--  -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><span class="text-right text-muted text-small"><?php echo translate('itineary_title_*') ?></span></th>
                                                <th><span class="text-right text-muted text-small"><?php echo translate('itineary_description_*') ?></span></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="kpi-setdata">
                                        	<?php 
		                                        $no= 1;
		                                        foreach($itineary as $list):
		                                    ?>
	                                            <tr>
	                                                <td class="col-lg-6">
	                                                    <input class="form-control " name="itinary_title[]" value="{{$list->title}}" type="text" placeholder="<?php echo translate('tour_itineary_title') ?>">
	                                                </td>
	                                                <td class="col-lg-6">
	                                                    <input class="form-control" name="itinary_description[]" value="{{$list->description}}" type="text" placeholder="<?php echo translate('tour_itineary_desc') ?>">
	                                                </td>
	                                                <td class="col-lg-2">
	                                                    <span class=" btn btn-cherryhan fa fa-trash-o text-danger" misl-add-removes></span>
	                                                </td>
	                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <div class="btn btn-cherryhan" style="margin-top: 10px">
                                            <span class="pvb_ddn-text" itinary-add-rows="#kpi-setdata"><i class="fa fa-plus-circle"></i> Add New Row</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <h1 class="bg-cherryhan"><?php echo translate('feature_photo_&_gallery') ?></h1>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label"><?php echo translate('feature_photo_*') ?></label>
                                        <input type="file" id="feature_photo" name="feature_photo" class="form-control {{ $errors->has('feature_photo') ? 'is-invalid':'' }}" value="{{ old('feature_photo') }}">
                                        @if($errors->has('feature_photo') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('feature_photo') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-3 mr-2 ml-2 mt-3" style="width: 100px;">
                                		<img class="img img-responsive w-100 h-75" src="{{asset('feature/tour/'.$tour->feature_photo)}}" alt="feature_photo">
                                	</div>  
                                </div>
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label"><?php echo translate('gallery_*') ?></label>
                                        <input type="hidden" name="old_feature_photo" value="{{$tour->feature_photo}}" class="myfrm form-control-file">
                                        <input type="file" multiple name="gallery[]" class="form-control {{ $errors->has('gallery') ? 'is-invalid':'' }}" value="{{ old('gallery') }}">
                                        @if($errors->has('gallery') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('gallery') }}</span>
                                        @endif
                                    </div>
                                	
                                	<div class="col-md-6">
                                		<div class="row">
                                		<?php                         
			                                $gallery = json_decode($tour->gallery, true);
			                                foreach($gallery as $key =>$img){
			                            ?>  
			                                <!-- start -->
				                                <div class="hdtuto col-md-3 ml-2 mt-3" style="min-width: 100px;">
				                                  <img src="{{asset('gallery/tour/'.$img)}}" alt="gallery_{{$key}}" class="img img-responsive w-100 h-75">
				                                        <input type="hidden" name="old_gallery[]" value="{{$img}}" class="myfrm">     
				                                        {{--<button class="remove img-times" type="button"><i class="fa fa-times"></i></button>--}}
                                                         <button class="remove img-times" type="button"><i class="fa fa-times"></i></button>
				                                </div>
			                                <!-- end -->
			                            <?php }?>
			                            </div>
                                	</div>
                                </div>
                            </div>
                        </fieldset>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection
