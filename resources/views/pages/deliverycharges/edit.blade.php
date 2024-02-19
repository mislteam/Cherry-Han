@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('delivery_charges'); ?></h3>
                    <div class="ibox-tools">
                     
                        <a href="{{ route('deliverychargesIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>
                </div>

                <div class="ibox-content">
            
                    <form action="{{ route('deliverychargesUpdate',$deliverycharges->id) }}" method="POST" accept-charset="utf-8" class="wizard-big">
                       
                        @csrf
                            <div class="row">
                                <input type="hidden" name="stype" id="stype" value="delivery">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-4"><?php echo translate('country')?></label>
                                        <div class="col-sm-8">
                                            <select  name="country_id" class="form-control select2_demo_1" placeholder="@lang('form.car.country_id.placeholder')">
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}" <?php if ($country->id==$deliverycharges->country_id): echo "selected"; ?>
                                                        
                                                    <?php endif ?>>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4"><?php echo translate('state')?></label>
                                        <div class="col-sm-8">
                                            <select  name="state_id" id="state_id" class="form-control select2_demo_1" placeholder="@lang('form.car.country_id.placeholder')">
                                                @foreach($states as $state)
                                                    <option value="{{ $state->id }}" <?php if ($state->id==$deliverycharges->state_id): echo "selected"; ?>
                                                        
                                                    <?php endif ?>>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4"><?php echo translate('city')?></label>
                                        <div class="col-sm-8">
                                            <select  name="city_id" id="city_id" class="form-control select2_demo_1" placeholder="@lang('form.car.country_id.placeholder')">
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" <?php if ($city->id==$deliverycharges->city_id): echo "selected"; ?>
                                                        
                                                    <?php endif ?>>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-4"><?php echo translate('price')?></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="price" value="{{$deliverycharges->price}}" class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                            @if($errors->has('price') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4"><?php echo translate('weight')?></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="weight" value="{{$deliverycharges->weight}}" class="form-control {{ $errors->has('weight') ? 'is-invalid':'' }}" value="{{ old('weight') }}" required>
                                            @if($errors->has('weight') || 1)
                                                <span class="error invalid-feedback">{{ $errors->first('weight') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-cherryhan float-right"><?php echo translate('save') ?></button>
                                        <a href="{{ route('deliverychargesIndex') }}" class="btn btn-default float-right mr-3"><?php echo translate('cancel') ?></a>
                                                        
                                    </div>  
                                  
                                </div>
                            </div>
   
                    </form>
                </div>
               
            </div>
        </div>
    </div>

   
 
 @endsection
