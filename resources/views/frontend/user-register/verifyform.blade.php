@extends('layouts.frontend_template')
@section('content')

<div class="">   
        <div class="row mt-5">
               <div class="col-md-2"></div>               
	               <div class="col-md-8">
	                  <h4 class="mt-5 texto-center"><?php echo translate('New User Account Registration') ?></h4>
                        <strong><?php echo $rand=Session::get('randomkey'); ?></strong> 
                      
                        <div class="alert alert-success">
                          <strong>Verification Successfylly! </strong> 
                          <?php Session::forget('randomkey');?>
                        </div>
                        <div class="alert alert-danger">
                          <strong>Do not match verify code!.</strong> 
                        </div>

                         <p> သင်၏ဖုန်းသို ရောက်ရှိသော SMSထဲမှ ကုဒ်နံပါတ်ကိုဖြည့်သွင်း၍ Verify Your Phone ကိုနှိပ်ပါ.</p>
                         {{--<form action="{{route('verificationCreate')}}" method="post">--}}
                         <div class="text-center">
                            <input type="hidden" id="session_code" value="{{$rand}}" class="form-control" > 
                            <input type="text" name="verify_code" id="verify_code" class="form-control" placeholder="<?php echo translate('Your SMS Verification Code') ?>"> <br>
                             <input type="submit" class="form-control btn-primary verifybtn" value="<?php echo translate('Verify Your Phone') ?>">   
                         </div>
                        <!-- </form> -->
	               </div>  
                                   
               <div class="col-md-2"></div>              
           
        </div>        
    </div>

 @endsection
