@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_hotel'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('hotelIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    
                    <form enctype="multipart/form-data" id="form" method="post" action="{{ route('hotelCreate')}}" class="wizard-big">
                        @csrf

                       

                        <h1 class="bg-cherryhan">Hotel Information</h1>
                        <fieldset>
                            <input type="hidden" name="stype" id="stype" value="hotel">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                    <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('hotel_name_*'); ?></label>
                                        <input type="text" name="name" placeholder="<?php echo translate('placeholder_hotel_name') ?>"  class="form-control" required>
                                        @if($errors->has('name') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('phone') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('phone_*'); ?></label>
                                        <input type="text" name="phone" placeholder="<?php echo translate('placeholder_phone') ?>"  class="form-control" required>
                                        @if($errors->has('phone') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>                                    
                                    <div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('email_*'); ?></label>
                                        <input type="email" name="email" placeholder="<?php echo translate('placeholder_email') ?>"  class="form-control" required>
                                        @if($errors->has('email') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('address') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('address_*'); ?></label>
                                        <input type="text" name="address" placeholder="<?php echo translate('placeholder_address') ?>"  class="form-control" required>
                                        @if($errors->has('address') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>   
                                    <div class="form-group {{ $errors->has('website') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('website_*'); ?></label>
                                        <input type="text" name="website" placeholder="<?php echo translate('placeholder_website') ?>"  class="form-control" required>
                                        @if($errors->has('website') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('website') }}</span>
                                        @endif
                                    </div> 
                                </div>
                                <div class="col-lg-6">
                                    
                                    <div class="form-group {{ $errors->has('star_level') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('star_level_*'); ?></label>
                                        <select  name="star_level" class="form-control select2_demo_1" data-live-search="true" placeholder="<?php echo translate('placeholder_placeholder_star_level') ?>" required>
                                            <option><?php echo translate('star_level') ?></option>
                                            @foreach($starlevels as $key=>$val)
                                                <option value="{{ $val }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('star_level') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('star_level') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group  {{ $errors->has('country_id') ? 'has-error':'' }">
                                        <label class="col-form-label"><?php echo translate('country_*') ?></label>
                                        <select  name="country_id" id="country_id" class="form-control select2_demo_1" placeholder="<?php echo translate('placeholder_country') ?>" required>
                                            <option value=""><?php echo translate('select...') ?></option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('country_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('country_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group  {{ $errors->has('state_id') ? 'has-error':'' }">
                                        <label class="col-form-label"><?php echo translate('state_*') ?></label>
                                        <select  name="state_id" id="state_id" class="form-control select2_demo_1" placeholder="<?php echo translate('placeholder_state') ?>" required>
                                            <option value=""><?php echo translate('select...') ?></option>
                                             @foreach($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('state_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('state_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group  {{ $errors->has('city_id') ? 'has-error':'' }">
                                        <label class="col-form-label"><?php echo translate('city_*') ?></label>

                                        <select  name="city_id" id="city_id" class="form-control select2_demo_1" placeholder="<?php echo translate('placeholder_city') ?>" required>
                                            <option value=""><?php echo translate('select...') ?></option>    
                                        </select>
                                        @if($errors->has('city_id') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('city_id') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('description') ? 'has-error':'' }}">
                                        <label class="col-form-label"><?php echo translate('description_*'); ?></label>
                                        <textarea name="description" placeholder="<?php echo translate('placeholder_description') ?>"  class="form-control" required></textarea>
                                        
                                        @if($errors->has('description') || 1)
                                            <span class="form-text m-b-none text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>                               
                            </div> 
                        </fieldset>
                  
                        
                         <h1 class="bg-cherryhan">Services & Pricing Plan</h1>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><span class="text-right text-muted text-small">Services *</span></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="service-setdata">
                                                <tr>
                                                    <td class="col-lg-10">
                                                        <input class="form-control" name="service[]" value="" type="text" placeholder="Service ..." required>
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
                                                <span class="pvb_ddn-text" misl-add-rows="#service-setdata"><i class="fa fa-plus-circle"></i> Add New Service</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><span class="text-right text-muted text-small">Room Name *</span></th>
                                                <th><span class="text-right text-muted text-small">Pricing Plan($) *</span></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="price-setdata">
                                            <tr>
                                                <td class="col-lg-8">
                                                    <input class="form-control" name="room_name[]" value="" type="text" placeholder="Room name (eg. Delux Single)" required>
                                                </td>
                                                <td class="col-lg-2">
                                                    <input class="form-control" name="price[]" value="" type="text" placeholder="Price (eg. 500)" required>
                                                </td>
                                                <td class="col-lg-2">
                                                    <span class=" btn btn-cherryhan fa fa-trash-o text-danger" misl-add-removes></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <div class="btn btn-cherryhan" style="margin-top: 10px">
                                                <span class="pvb_ddn-text" add-room-price="#price-setdata"><i class="fa fa-plus-circle"></i> Add New Price</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                        <h1 class="bg-cherryhan">Feature Photo & Gallery</h1>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo translate('feature_photo_*') ?></label>
                                        <input type="file" id="feature_photo" name="feature_photo" class="form-control {{ $errors->has('feature_photo') ? 'is-invalid':'' }}" value="{{ old('feature_photo') }}" required>
                                        @if($errors->has('feature_photo') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('feature_photo') }}</span>
                                        @endif
                                    </div>  
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo translate('gallery_*') ?></label>
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
