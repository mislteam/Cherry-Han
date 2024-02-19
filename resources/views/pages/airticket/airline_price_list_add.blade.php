

@extends('layouts.admin')
@section('content')
{{print_r('pricelist')}}
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-10 mx-auto">
                <div class="ibox-title">
                    <h3>{{ translate('add_airline_price')}}</h3>
                    <div class="ibox-tools">
                        <a href="{{ route('airlinepricelistIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
                    </div>
                </div>
                <div class="ibox-content">

                    <form action="{{ route('airlinepricelistCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

                        @csrf
                            <input type="hidden" name="stype" id="stype" value="airticket">
                            <div class="row">
                            <div class="col-lg-12">
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

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><?php echo translate('package_name')?> *</label>
                                        <input type="text" name="package_name" placeholder="<?php echo translate('placeholder_package_name') ?>" class="form-control {{ $errors->has('refund') ? 'is-invalid':'' }}" value="{{ old('pacakge_name') }}" >
                                        @if($errors->has('package_name') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('pacakge_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><?php echo translate('price')?> *</label>
                                        <div class="row mx-auto">
                                            <input type="number" name="price" placeholder="<?php echo translate('placeholder_mm_price') ?>" class="form-control col-lg-5 {{ $errors->has('price') ? 'is-invalid':'' }}" value="{{ old('price') }}" >
                                            @if($errors->has('price') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                            @endif
                                            <input type="number" step="any" min="0" name="usprice" placeholder="<?php echo translate('placeholder_us_price') ?>" class="form-control col-lg-5 {{ $errors->has('usprice') ? 'is-invalid':'' }}" value="{{ old('usprice') }}" >
                                            @if($errors->has('usprice') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-form-label">{{translate('refund_status')}} *</label>

                                        <div class="d-flex">
                                            <input type="radio" id="isRefundyes" name="isRefund" class="mr-2 {{ $errors->has('isRefund') ? 'is-invalid':'' }}" value="yes" checked required> <label class="col-form-label" for="isRefundyes">{{translate('refundable')}}</label>
                                            <input type="radio" id="isRefundno" name="isRefund" class="mr-2 ml-4 {{ $errors->has('isRefund') ? 'is-invalid':'' }}" value="no" required> <label class="col-form-label" for="isRefundno">{{translate('no_refundable')}}</label>
                                        </div>
                                        @if($errors->has('isRefund') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('isRefund') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><?php echo translate('refund')?> *</label>
                                        <textarea name="refund_description" class="form-control {{ $errors->has('refund') ? 'is-invalid':'' }} snote" placeholder="<?php //echo translate('placeholder_refund') ?>" ></textarea>
                                        @if($errors->has('refund') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('refund') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-cherryhan float-right"><?php echo translate('save') ?></button>
                                        <a href="{{ route('airlinepricelistIndex') }}" class="btn btn-default float-right mr-3"><?php echo translate('cancel'); ?></a>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

 @endsection
