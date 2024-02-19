@extends('layouts.frontend_template')
@section('content')

<!-- <section class="jumbotron text-center">
    <div class="container">
      <h1><b>Calculate Delivery Fee</b></h1>
     
    </div>
  </section> -->
<div class="">   
        <div class="row">
               <div class="col-md-2"></div>               
               <div class="col-md-8">
                    <form action="{{ route('deliverybookingCreate') }}" method="post"> 
                    @csrf
                        <div class="form-group  {{ $errors->has('sender_name') ? 'is-invalid':'' }}">
                            <label style="text-align: left;">Sender Name</label>
                               <input type="text" name="sender_name" id="sender_name" class="form-control" required>
                                @if ($errors->has('sender_name'))
                                    <span class="text-danger">{{ $errors->first('sender_name') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label style="text-align: left;">Sender Phone</label>
                               <input type="text" name="sender_phone" id="sender_phone" class="form-control" required>
                               @if($errors->has('sender_phone') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('sender_phone') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label style="text-align: left;">Receiver Name</label>
                               <input type="text" name="receiver_name" id="receiver_name" class="form-control" required>
                               @if($errors->has('receiver_name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('receiver_name') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label style="text-align: left;">Receiver Phone</label>
                               <input type="text" name="receiver_phone" id="receiver_phone" class="form-control" required>
                               @if($errors->has('receiver_phone') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('receiver_phone') }}</span>
                                @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Pickup Township</label>

                               <select  name="pickup_township" id="pickup_township" class="form-control" placeh.older="@lang('form.categorytype.label')" readonly>
                                   
                                    <option value="{{$pickup_township->id}}">{{ $pickup_township->name}}</option>

                                </select>
                        </div>
                        <div class="form-group">
                            <label style="text-align: left;">Delivery Township</label>
                               <select  name="delivery_township" id="city" class="form-control" placeh.older="@lang('form.categorytype.label')" readonly>
                           
                                    <option value="{{$cities->id}}">{{ $cities->name}}</option>                                
                                </select>
                        </div>
                       
                               <input type="hidden" name="old_weight" id="old_weight" class="form-control" >
                                            
                               <input type="hidden" name="price" id="price" class="form-control">
                       
                        <div class="form-group">
                            <label style="text-align: left;">Weight ( kg )</label>
                                @foreach($weight as $key=>$val)
                               <input type="text" name="weight" value="{{$val}}" id="weight" onkeyup="CalculateDelCharges(this.value)" id="weight" class="form-control" readonly>
                               @endforeach
                               @if($errors->has('weight') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('weight') }}</span>
                                @endif
                        </div>
                         <div class="form-group">
                            <label style="text-align: float;">Delivery Charges</label>
                            @foreach($del_charges as $key=>$val)
                            <input type="text" name="del_charges" value="{{$val}}" id="del_charges" class="form-control" readonly>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label style="text-align: float;">Delivery Detail Address</label>
                            <textarea name="detail_address" id="detail_address" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label style="text-align: float;">Note</label>
                            <input type="text" name="note" id="note" class="form-control" required>
                        </div>
                         <div class="form-group">
                            <button type="submit" class="btn btn-cherryhan float-right">Confirm</button>
                           <!--  <a href="" class="btn btn-primary float-right mr-3 add-to-cart">Add to cart</a>  -->
                           <!--  <button class="btn btn-primary float-right mr-3 add-to-cart">Add to cart</button> -->
                            {{--{{ route('deliverybookingAddmore') }}--}}
                        </div>
                 </form>   
                  <button class="btn btn-cherryhan float-right mr-3 add-to-cart">Add More</button>   
                   
               </div>               
               <div class="col-md-2"></div>  
           
        </div>  
        <br><br>
        <?php if($terms!=""){?>
              <!--Terms-->
              <div class="row">
                  <div class="col-md-12">
                    <div class="post-meta">
                        <h4 class="article-title">{{$terms->title}}</h4>
                        <p>{!! $terms->description !!}</p>
                      </div>
                  </div>
              </div>
              <!--end -->
       <?php } ?>
    </div>
@endsection
<script src="{{ asset('misl/back/js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $(document).on('click', '.add-to-cart', function () {

            var sender_name = $('#sender_name').val();
            var sender_phone = $('#sender_phone').val();
            var receiver_name = $('#receiver_name').val();
            var receiver_phone = $('#receiver_phone').val();
            var pickup_township = $('#pickup_township').val();
            var delivery_township = $('#city').val();
            var weight = $('#weight').val();
            var del_charges = $('#del_charges').val();
            var detail_address = $('#detail_address').val();
            var note = $('#note').val();
            
            if(sender_name=="" || sender_phone=="" || receiver_name=="" || receiver_phone=="" || detail_address=="" || note==""){
                alert("required fields");
            }else{
                $.ajax({
                url: "/en/delivery-booking/create",
                type: "post",
                data: {
                    _token: '{{csrf_token()}}',
                    sender_name:sender_name,
                    sender_phone:sender_phone,
                    receiver_name:receiver_name,
                    receiver_phone:receiver_phone,
                    pickup_township:pickup_township,
                    delivery_township:delivery_township,
                    weight:weight,
                    del_charges:del_charges,
                    detail_address:detail_address,
                    note:note
                },

                //cache: false,
                success: function(dataResult){
                         
                window.location = "/en/delivery-booking/addmore";         
                                          
                }
            });
            }
               
        });
    });
</script>