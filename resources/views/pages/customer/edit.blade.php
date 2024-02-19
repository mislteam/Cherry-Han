
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-10 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('edit_customer')?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('customerIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                             <form action="{{ route('customerUpdate',$user->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label><?php echo translate('user_name')?></label>
                                   <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="<?php echo translate('Your Full Name') ?>" required>
                                   @if($errors->has('name') || 1)
                                        <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label><?php echo translate('user_phone')?></label>
                                   <input type="text" name="phone" value="{{$user->phone}}" class="form-control" placeholder="<?php echo translate('Mobile Phone') ?>" required>
                                   @if($errors->has('phone') || 1)
                                        <span class="form-text m-b-none text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label><?php echo translate('user_email')?></label>
                                   <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="<?php echo translate('Your Email Address') ?>" required>
                                   @if($errors->has('email') || 1)
                                        <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                               
                                <div class="form-group"> 
                                <label><?php echo translate('state')?></label> 
                                   <select  name="state_id" id="state_id" class="form-control select2_demo_1" placeholder="<?php echo translate('Select State/Region') ?>" required>
                                    <option value="">Select state</option>
                                            @foreach($states as $state)            
                                                                       
                                                <option value="{{$state->id}}" <?php if ($user->state_id==$state->id): echo "selected"; ?>
                                                    
                                                <?php endif ?>>{{ $state->name}}</option>

                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label><?php echo translate('city')?></label>
                                   <select  name="city_id" id="city_id" class="form-control select2_demo_1" placeholder="<?php echo translate('Township') ?>" required>
                                       <option value="">Select city</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" <?php if ($user->city_id==$city->id): echo "selected"; ?>
                                            
                                        <?php endif ?>>{{ $city->name }}</option>
                                    @endforeach
                                                                                                   
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                   <label><?php echo translate('address')?></label>  
                                   <input type="text" name="address" value="{{$user->address}}" class="form-control" placeholder="<?php echo translate('Street Address') ?>" required>
                                   
                                   @if($errors->has('address') || 1)
                                        <span class="form-text m-b-none text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                @if (auth()->user()->hasRole('Super Admin'))
                                    <input type="text" name="new_password" id="new_password" class="form-control" placeholder="<?php echo translate('Password') ?>">
                                   
                                   @if($errors->has('new_password') || 1)
                                        <span class="form-text m-b-none text-danger">{{ $errors->first('new_password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">                                    
                                   <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="<?php echo translate('Confirm Password') ?>">
                                   
                                   @if($errors->has('confirm_password') || 1)
                                        <span class="form-text m-b-none text-danger">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>
                                @else

                                @endif 
                                   
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                    <a href="{{ route('customerIndex') }}" class="btn btn-default float-right mr-3">@lang('global.cancel')</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

