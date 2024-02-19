
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-10 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('add_new_agent')?></h5>
                    @can('agent.show')
                        <div class="ibox-tools">
                            <a href="{{ route('agentIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('agentCreate') }}" method="post"> 
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
                                       <select  name="state_id" id="state_id" class="form-control single_select2" placeholder="<?php echo translate('Select State/Region') ?>" required>
                                        <option value="">Select state</option>
                                                @foreach($states as $state)            
                                                                           
                                                    <option value="{{$state->id}}">{{ $state->name}}</option>
        
                                                @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
          
                                       <select  name="city_id" id="city_id" class="form-control single_select2" placeholder="<?php echo translate('Township') ?>" required>
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
                                        <h4>Shop Info</h4>
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
                                                    <span class=" btn btn-cherryhan fa fa-trash-o text-danger" misl-add-removes></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <div class="btn btn-cherryhan" style="margin-top: 10px">
                                                <span class="pvb_ddn-text" add-agent-row="#agent-setdata"><i class="fa fa-plus-circle"></i> Add New </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 
        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-cherryhan float-right">@lang('global.save')</button>
                                    <a href="{{ route('agentIndex') }}" class="btn btn-default mr-3 float-right">@lang('global.cancel')</a>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

