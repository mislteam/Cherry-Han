@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-10 mx-auto">
                <div class="ibox-title">
                    <h3>{{ translate('add_new_airline')}}</h3>
                    <div class="ibox-tools">
                        <a href="{{ route('airlinetimescheduleIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
                    </div>
                </div>
                <div class="ibox-content">

                    <form action="{{ route('airlinetimescheduleCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="wizard-big">

                        @csrf
                            <input type="hidden" name="stype" id="stype" value="airticket">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class=""><?php echo translate('airline_name')?></label>
                                                <select  name="airline_id" class="form-control single_select2" placeholder="{{ translate('placeholder_airline_name') }}" >
                                                    <option value="">{{ translate('choose_airline') }}</option>
                                                    @foreach($airlines as $row)
                                                        <option value="{{ $row->id }}" {{($row->id == $airline_id)?'selected':'';}}>{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('name') || 1)
                                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo translate('airline_code')?> *</label>
                                                <input type="text" name="airline_code" placeholder="<?php echo translate('placeholder_airline_code') ?>" class="form-control {{ $errors->has('airline_code') ? 'is-invalid':'' }}" value="{{ old('airline_code') }}" required>
                                                @if($errors->has('airline_code') || 1)
                                                    <span class="error invalid-feedback">{{ $errors->first('airline_code') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo translate('class_type')?> *</label>
                                                <!-- <input type="text" name="business_type" placeholder="<?php //echo translate('placeholder_class_type') ?>" class="form-control {{ $errors->has('business_type') ? 'is-invalid':'' }}" value="{{ old('business_type') }}" required> -->
                                                <select name="business_type" class="form-control single_select2" id="" required>
                                                    <option value=""><?php echo translate('choose_one');?></option>
                                                    <option value="Business">Business</option>
                                                    <option value="Economy">Economy</option>
                                                    <option value="Premium Economy">Premium Economy</option>
                                                    <option value="First-class">First-class</option>
                                                </select>
                                                @if($errors->has('business_type') || 1)
                                                    <span class="error invalid-feedback">{{ $errors->first('business_type') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo translate('depart_date')?> *</label>
                                                <input type="text" name="depart_date" placeholder="<?php echo translate('placeholder_depart_date') ?>" class="form-control {{ $errors->has('depart_date') ? 'is-invalid':'' }}" value="{{ old('depart_date') }}" required>
                                                @if($errors->has('depart_date') || 1)
                                                    <span class="error invalid-feedback">{{ $errors->first('depart_date') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo translate('depart_time')?> *</label>
                                                <input type="time" name="depart_time" placeholder="<?php echo translate('placeholder_depart_time') ?>" class="form-control {{ $errors->has('depart_time') ? 'is-invalid':'' }}" value="{{ old('depart_time') }}" required>
                                                @if($errors->has('depart_time') || 1)
                                                    <span class="error invalid-feedback">{{ $errors->first('depart_time') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo translate('arrival_time')?> *</label>
                                                <input type="time" name="arrival_time" placeholder="<?php echo translate('placeholder_arrival_time') ?>" class="form-control {{ $errors->has('arrival_time') ? 'is-invalid':'' }}" value="{{ old('arrival_time') }}" required>
                                                @if($errors->has('arrival_time') || 1)
                                                    <span class="error invalid-feedback">{{ $errors->first('arrival_time') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo translate('from_airport')?> *</label>
                                                <select name="fromAirport" class="form-control single_select2" id="" required>
                                                    <option value=""><?php echo translate('choose_one');?></option>
                                                    <?php foreach($air_port as $key => $svalue){ ?>
                                                        <option value="{{$svalue->id}}">{{$svalue->name}}</option>
                                                    <?php }?>
                                                </select>
                                                @if($errors->has('fromAirport') || 1)
                                                    <span class="error invalid-feedback">{{ $errors->first('fromAirport') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo translate('to_airport')?> *</label>
                                                <!-- <input type="text" name="toAirport" placeholder="<?php //echo translate('placeholder_to_airport') ?>" class="form-control {{ $errors->has('toAirport') ? 'is-invalid':'' }}" value="{{ old('toAirport') }}" required> -->
                                                <select name="toAirport" class="form-control single_select2" id="" required>
                                                    <option value=""><?php echo translate('choose_one');?></option>
                                                    <?php foreach($air_port as $key => $stvalue){ ?>
                                                        <option value="{{$stvalue->id}}">{{$stvalue->name}}</option>
                                                    <?php }?>
                                                </select>
                                                @if($errors->has('toAirport') || 1)
                                                    <span class="error invalid-feedback">{{ $errors->first('toAirport') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><?php echo translate('available_baggage')?> *</label>
                                                <input type="text" name="baggage_kg" placeholder="<?php echo translate('placeholder_available_baggage') ?>" class="form-control {{ $errors->has('baggage_kg') ? 'is-invalid':'' }}" value="{{ old('baggage_kg') }}" required>
                                                @if($errors->has('baggage_kg') || 1)
                                                    <span class="error invalid-feedback">{{ $errors->first('baggage_kg') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label><?php echo translate('price_package_list')?> *</label><br>
                                    <div class="form-check abc-checkbox abc-checkbox-success form-check-inline">
                                        <input class="form-check-input" name="price_list" type="checkbox" id="inlineCheckbox1" value="1">
                                        <label class="form-check-label" for="inlineCheckbox1"> One </label>
                                    </div>
                                    <div class="form-check abc-checkbox abc-checkbox-success form-check-inline">
                                        <input class="form-check-input" name="price_list" type="checkbox" id="inlineCheckbox2" value="2" checked="">
                                        <label class="form-check-label" for="inlineCheckbox2"> Two </label>
                                    </div>
                                    <div class="form-check abc-checkbox abc-checkbox-success form-check-inline">
                                        <input class="form-check-input" name="price_list" type="checkbox" id="inlineCheckbox3" value="3">
                                        <label class="form-check-label" for="inlineCheckbox3"> Three </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-cherryhan float-right"><?php echo translate('save') ?></button>
                                        <a href="{{ route('airlinetimescheduleIndex') }}" class="btn btn-default float-right mr-3"><?php echo translate('cancel'); ?></a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 @endsection
