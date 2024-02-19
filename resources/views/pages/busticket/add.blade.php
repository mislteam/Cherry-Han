@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-10 mx-auto">
                <div class="ibox-title">
                    <h3>@lang('cruds.bus-ticket.title')</h3>
                    <div class="ibox-tools">
                
                        <a href="{{ route('busticketIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>
                <div class="ibox-content">
                              
                    <form action="{{ route('busticketCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="wizard-big">
                       
                        @csrf
                            <input type="hidden" name="stype" id="stype" value="busticket">
            
                            <div class="row">
                                <div class="col-lg-6">
                                   <div class="form-group">
                                        <label><?php echo translate('bus_ticket_name')?> *</label>
                                        <input type="text" name="name" placeholder="<?php echo translate('placeholder_bus_ticket_name') ?>" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                        @if($errors->has('name') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label><?php echo translate('bus_ticket_phone')?> *</label>
                                        <input type="text" name="phone" placeholder="<?php echo translate('placeholder_bus_ticket_phone') ?>" class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}" value="{{ old('phone') }}" required>
                                        @if($errors->has('phone') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('bus_ticket_email')?> *</label>
                                        <input type="email" name="email" placeholder="<?php echo translate('placeholder_bus_ticket_email') ?>" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ old('email') }}" required>
                                        @if($errors->has('email') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('bus_ticket_address')?> *</label>
                                        <input type="text" name="address" placeholder="<?php echo translate('placeholder_bus_ticket_address') ?>" class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}" value="{{ old('address') }}" required>
                                        @if($errors->has('address') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label><?php echo translate('price')?> *</label>
                                        <input type="number" name="price" placeholder="<?php echo translate('placeholder_bus_ticket_price') ?>" class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}" value="{{ old('price') }}" required>
                                        @if($errors->has('price') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>  
                                    <div class="form-group">
                                        <label><?php echo translate('note')?> *</label>
                                        <input type="text" name="note" placeholder="<?php echo translate('placeholder_note') ?>" class="form-control {{ $errors->has('note') ? 'is-invalid':'' }}" value="{{ old('note') }}" required>
                                        @if($errors->has('note') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('note') }}</span>
                                        @endif
                                    </div> 
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label><?php echo translate('bus_gate')?> *</label>
                                        <select  name="bus_gate_id" class="form-control select2_demo_1" placeholder="<?php echo translate('placeholder_country') ?>">
                                            <option value=""><?php echo translate('select...')?></option>
                                            @foreach($busgates as $busgate)
                                                <option value="{{ $busgate->id }}">{{ $busgate->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('bus_destination')?> *</label>
                                        <select  name="bus_destination_id[]" class="form-control multi_select2" placeholder="<?php echo translate('placeholder_country') ?>" multiple>
                                            <option value=""><?php echo translate('select...')?></option>
                                            @foreach($busdestinations as $busdes)
                                                <option value="{{ $busdes->id }}">{{ $busdes->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo translate('bus_type')?> *</label>
                                        <input type="text" name="bus_type" placeholder="<?php echo translate('placeholder_bus_type') ?>" class="form-control {{ $errors->has('bus_type') ? 'is-invalid':'' }}" value="{{ old('bus_type') }}" required>
                                        @if($errors->has('bus_type') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('bus_type') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label><?php echo translate('seat_no')?> *</label>
                                        <input type="number" name="seat_no" placeholder="<?php echo translate('placeholder_no_of_seat') ?>" class="form-control {{ $errors->has('seat_no') ? 'is-invalid':'' }}" value="{{ old('seat_no') }}" required>
                                        @if($errors->has('seat_no') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('seat_no') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label><?php echo translate('available_seat')?> *</label>
                                        <input type="number" name="available_seat" placeholder="<?php echo translate('placeholder_available_seat') ?>" class="form-control {{ $errors->has('available_seat') ? 'is-invalid':'' }}" value="{{ old('available_seat') }}" required>
                                        @if($errors->has('available_seat') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('available_seat') }}</span>
                                        @endif
                                    </div>
                           
                                    <div class="form-group">
                                        <label><?php echo translate('feature_photo')?> *</label>
                                        <input type="file" name="feature_photo" class="form-control {{ $errors->has('feature_photo') ? 'is-invalid':'' }}" value="{{ old('feature_photo') }}" required>
                                        @if($errors->has('feature_photo') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('feature_photo') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-cherryhan float-right"><?php echo translate('save') ?></button>
                                        <a href="{{ route('busticketIndex') }}" class="btn btn-default float-right mr-3"><?php echo translate('cancel'); ?></a>
                                    </div>
                                </div>
                            </div>    
  
                    </form>
                </div>
            </div>
        </div>
    </div>

 @endsection
