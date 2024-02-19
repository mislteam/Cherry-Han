@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_travels_&_tours'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('tourIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    
                    <form enctype="multipart/form-data" id="form" method="post" action="{{ route('tourCreate')}}" class="wizard-big">
                        @csrf

                         <h1 class="bg-cherryhan"><?php echo translate('tour_information') ?></h1>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('tour_name') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_name'); ?> *</label>
                                        <input type="text" name="tour_name" placeholder="<?php echo translate('placeholder_tour_name') ?>"  class="form-control" required>
                                        @if($errors->has('tour_name') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('tour_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('tourcategory_id') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_category'); ?> *</label>
                                        <select  name="tourcategory_id" id="tourcategory_id" class="form-control select2_demo_1" data-live-search="true"  placeholder="<?php echo translate('placeholder_tour_category') ?>" required>
                                            <option value=""><?php echo translate('select...'); ?></option>
                                            @foreach($tourcategorys as $tourcategory)
                                                <option value="{{ $tourcategory->id }}">{{ $tourcategory->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('tourcategory_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('tourcategory_id') }}</span>
                                        @endif
                                    </div>


                                    {{--<div class="form-group {{ $errors->has('tourdestination_id') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_destination'); ?> *</label>
                                        <select  name="tourdestination_id[]" class="form-control multi_select2"  placeholder="<?php echo translate('placeholder_tour_destination') ?>" multiple>
                                            <option value=""><?php echo translate('select...'); ?></option>
                                            @foreach($tourdestinations as $tourdestination)
                                                <option value="{{ $tourdestination->id }}">{{ $tourdestination->name }}</option>
                                            @endforeach
                                        </select>
                                         
                                        @if($errors->has('tourdestination_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('tourdestination_id') }}</span>
                                        @endif
                                    </div>--}}

                                     <div class="form-group">
                                        <label><?php echo translate('tour_destination')?> *</label>
                                        <select  name="tourdestination_id[]" class="select2_demo_2 form-control" data-live-search="true" multiple="multiple"  placeholder="<?php echo translate('placeholder_tour_destination') ?>" required>
                                            @foreach($tourdestinations as $tourdestination)
                                                <option value="{{ $tourdestination->id }}">{{ $tourdestination->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                

                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo translate('price_*')?> </label>
                                        <input type="text" name="price" placeholder="<?php echo translate('placeholder_price') ?>"  class="form-control" required>
                                        @if($errors->has('price') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('description') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_description'); ?> *</label>
                                        <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" required></textarea>
                                        @if($errors->has('description') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>

                                   
                                </div> 
                                <div class="col-lg-6">
                                     <div class="form-group {{ ($errors->has('package')) ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_package_*') ?></label>
                                        <input type="text" name="package" placeholder="<?php echo translate('placeholder_package') ?>"  class="form-control" required>
                                        @if($errors->has('package') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('package') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group {{ ($errors->has('passenger'))? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('no_of_passenger_*') ?> </label>
                                        <input type="text" name="passenger" placeholder="<?php echo translate('placeholder_passenger') ?>"  class="form-control" required>
                                        @if($errors->has('passenger') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('passenger') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ ($errors->has('contact_person'))? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('contact_person_*') ?> </label>
                                        <input type="text" name="contact_person" placeholder="<?php echo translate('placeholder_contact_person') ?>"  class="form-control" required>
                                        @if($errors->has('contact_person') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('contact_person') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group {{ ($errors->has('phone'))? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('phone_*') ?> </label>
                                        <input type="text" name="phone" placeholder="<?php echo translate('placeholder_phone') ?>"  class="form-control" required>
                                        @if($errors->has('phone') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                     <div class="form-group {{ ($errors->has('email'))? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('email_*') ?> </label>
                                        <input type="email" name="email" placeholder="<?php echo translate('placeholder_email') ?>"  class="form-control" required>
                                        @if($errors->has('email') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ ($errors->has('website'))? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('website_*') ?> </label>
                                        <input type="text" name="website" placeholder="<?php echo translate('placeholder_website') ?>"  class="form-control" required>
                                        @if($errors->has('website') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('website') }}</span>
                                        @endif
                                    </div>
                                </div>                                                           
                            </div> 
                        </fieldset>

                        <h1 class="bg-cherryhan"><?php echo translate('tour_itineary') ?> *</h1>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('include') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_inclusive'); ?> *</label>
                                        <textarea name="include" class="form-control {{ $errors->has('include') ? 'is-invalid':'' }}" required></textarea>
                                        @if($errors->has('include') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('include') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('exclude') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('tour_exclusive_*'); ?> </label>
                                        <textarea name="exclude" class="form-control {{ $errors->has('exclude') ? 'is-invalid':'' }}" required></textarea>
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
                                            <tr>
                                                <td class="col-lg-6">
                                                    <input class="form-control " name="itinary_title[]" value="" type="text" placeholder="<?php echo translate('tour_itineary_title') ?>"  required>
                                                </td>
                                                <td class="col-lg-6">
                                                    <input class="form-control" name="itinary_description[]" value="" type="text" placeholder="<?php echo translate('tour_itineary_desc') ?>" required>
                                                </td>
                                                <td class="col-lg-2">
                                                    <span class=" btn btn-cherryhan fa fa-trash-o text-danger" misl-add-removes></span>
                                                </td>
                                            </tr>
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
                            <h2>Feature Gallery</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo translate('feature_photo') ?> *</label>
                                        <input type="file" id="feature_photo" name="feature_photo" class="form-control {{ $errors->has('feature_photo') ? 'is-invalid':'' }}" value="{{ old('feature_photo') }}" required>
                                        @if($errors->has('feature_photo') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('feature_photo') }}</span>
                                        @endif
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo translate('gallery') ?> *</label>
                                        <input type="file" multiple name="gallery[]" class="form-control {{ $errors->has('gallery') ? 'is-invalid':'' }}" value="{{ old('gallery') }}" required>
                                        @if($errors->has('gallery') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('gallery') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
 
 @endsection
