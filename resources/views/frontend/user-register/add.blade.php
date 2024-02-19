@extends('layouts.frontend_template')
@section('content')

<div class="">   
        <div class="row mt-5">
               <div class="col-md-3"></div>               
               <div class="col-md-6">
                <h4 class="text-center mb-3"><b><?php echo translate('New User Account Registration') ?></b>
                {{--<a href="{{route('usertoagentAdd')}}" class="btn btn-cherryhan float-right mr-3 usertoagent">User To Agent</a>--}}
                </h4>
                    <form action="{{ route('userregisterCreate') }}" method="post"> 
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
                            <button type="submit" class="btn btn-primary float-right ">Register</button>
                            
                        </div>
                 </form>  
                 <a href="{{route('usertoagentAdd')}}" class="float-left mr-3 usertoagent">User To Agent</a>
                   
               </div>               
               <div class="col-md-3"></div>                        
        </div>      
        
        <hr>
               <div class="row" >
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-content">
                            
                             <?php 
                                if($pointcount == 0){?>
                                    {{--<button class="btn btn-cherryhan text-center mb-4 btncollect">Collected</button>--}}
                                <?php } else if($pointcount == 1 || date("Y-m-d",strtotime($pointlists->collect_date)) != date("Y-m-d")){ ?>
                                    <button class="btn btn-cherryhan text-center mb-4 btncollect">Collected</button>
                                <?php
                                    }else{
                                        ?>
                                        <button class="btn btn-cherryhan text-center mb-4 disabled">Collected</button>
                                        <?php
                                    }
                                ?>
                                
                            
                        </div>          
                    </div>
                </div>
                <div class="col-md-3">
                    @foreach($generalsetting as $gs)
                    
                    <button class="btn btn-cherryhan text-center mb-4" onclick="change_money(17,'{{$gs->id}}')">{{$gs->value}}</button>
                   
                    @endforeach
                </div>
            </div> 
    </div>
@endsection
<script src="{{ asset('misl/back/js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $(document).on('click', '.btncollect', function (e) {   
 
            $.ajax({
                  url: "/pointsetting/loginpoint_collect",
                  type: "post",                  
                  data: {
                        _token: '{{csrf_token()}}',
                        user_id:17,
                        coin_id:3,   
                    },

                        success: function(data){
                            location.reload();
                           
                      }
                      
                  });
                       
        });

    });
    function change_money(user_id,coin_id)
    {
        $.ajax({
                  url: "/pointsetting/change_money",
                  type: "post",                  
                  data: {
                        _token: '{{csrf_token()}}',
                        user_id:user_id,
                        coin_id:coin_id,   
                    },

                        success: function(data){
                            location.reload();
                           
                      }
                      
                  });
    }
</script>


