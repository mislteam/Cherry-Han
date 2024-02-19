@extends('layouts.frontend_template')
@section('content')

<div class="">   
        <div class="row mt-5">
               <div class="col-md-3"></div>               
               <div class="col-md-6">
                <h4 class="text-center mb-3"><b><?php echo translate('New Agent Registration') ?></b></h4>
                    <form action="{{ route('usertoagentCreate') }}" method="post"> 
                    @csrf
                        <div class="form-group">
                            
                               <input type="text" name="name" class="form-control" placeholder="<?php echo translate('Your Full Name') ?>" required>
                               @if($errors->has('name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('name') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            
                               <input type="text" name="phone" class="form-control" placeholder="<?php echo translate('Mobile Phone') ?>" required>
                               @if($errors->has('phone') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                               <input type="email" name="email" class="form-control" placeholder="<?php echo translate('Your Email Address') ?>" required>
                               @if($errors->has('email') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('email') }}</span>
                                @endif
                        </div>
                       
                        <div class="form-group">  
                               <select  name="state_id" id="state_id" class="form-control select2_demo_1" placeholder="<?php echo translate('Select State/Region') ?>" required>
                                <option value="">Select state</option>
                                        @foreach($states as $state)            
                                                                   
                                            <option value="{{$state->id}}">{{ $state->name}}</option>

                                        @endforeach
                                </select>
                        </div>
                        <div class="form-group">
  
                               <select  name="city_id" id="city_id" class="form-control select2_demo_1" placeholder="<?php echo translate('Township') ?>" required>
                                   <option value="">Select city</option>
                                {{--@foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach--}}
                                                                                               
                                </select>
                        </div>
                       
                        <div class="form-group">
                             
                               <input type="text" name="address" class="form-control" placeholder="<?php echo translate('Street Address') ?>" required>
                               
                               @if($errors->has('address') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('address') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                             
                               <input type="password" name="new_password" id="new_password" class="form-control" placeholder="<?php echo translate('Password') ?>" required>
                               
                               @if($errors->has('new_password') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('new_password') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                             
                               <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="<?php echo translate('Confirm Password') ?>" required>
                               
                               @if($errors->has('confirm_password') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <table class="table">
                                <h5>Shop Info</h5>
                                <thead>
                                    <tr>
                                        <th><span class="text-right text-muted text-small">Label Name *</span></th>
                                        <th><span class="text-right text-muted text-small">Label Value *</span></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="agent-setdata">
                                    <tr>
                                        <td class="col-lg-5">
                                            <input class="form-control" name="label_name[]" value="" type="text" placeholder="Label name" required>
                                        </td>
                                        <td class="col-lg-5">
                                            <input class="form-control" name="label_value[]" value="" type="text" placeholder="Value" required>
                                        </td>
                                        <td class="col-lg-2">  
                                            <span class="btn-sm btn-cherryhan pvb_ddn-text" misl-add-removes><i class="fa fa-times-circle">X</i></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <div class="btn btn-cherryhan" style="margin-top: 10px">
                                        <span class="pvb_ddn-text" add-agent-row1="#agent-setdata"><i class="fa fa-plus-circle"></i> Add New </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         

                         <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right ">Save</button>
                            
                        </div>
                 </form>  
                  
                   
               </div>               
               <div class="col-md-3"></div>                        
        </div>        
    </div>
@endsection

