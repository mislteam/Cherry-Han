@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox col-lg-10 mx-auto">
                <div class="ibox-title">
                    <h5><?php echo translate('edit_delivery_service'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('deliveryservice') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                    <form action="{{ route('deliverybookingUpdate', $deliveryservices->id) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label style="text-align: left;">Sender Name</label>
                               <input type="text" name="sender_name" value="{{$deliveryservices->sender_name}}" class="form-control" >
                               @if($errors->has('sender_name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('sender_name') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label style="text-align: left;">Sender Phone</label>
                               <input type="text" name="sender_phone" value="{{$deliveryservices->sender_phone}}" class="form-control" >
                               @if($errors->has('sender_phone') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('sender_phone') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label style="text-align: left;">Receiver Name</label>
                               <input type="text" name="receiver_name" value="{{$deliveryservices->receiver_name}}" class="form-control" >
                               @if($errors->has('receiver_name') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('receiver_name') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label style="text-align: left;">Receiver Phone</label>
                               <input type="text" name="receiver_phone" value="{{$deliveryservices->receiver_phone}}" class="form-control" >
                               @if($errors->has('receiver_phone') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('receiver_phone') }}</span>
                                @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Pickup Township</label>

                            
                               <select  name="pickup_township" id="pickup_township" class="form-control single_select2" placeh.older="@lang('form.categorytylpe.label')" >
                                
                                        @foreach($cities as $city)            
                                                                   
                                            <option value="{{$city->id}}" <?php if ($city->id==$deliveryservices->city_id): echo "selected"; ?>
                                                
                                            <?php endif ?>>{{ $city->name}}</option>

                                        @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label style="text-align: left;">Delivery Township</label>
                               <select  name="delivery_township" id="city" class="form-control single_select2"  placeh.older="@lang('form.categorytype.label')">
                                
                                   @foreach($deliverycity as $delivery)           
                                                                       
                                        <option value="{{$delivery->city_id}}" <?php if ($delivery->city_id==$deliveryservices->city_id): echo "selected";?>
                                            
                                        <?php endif ?>>{{ $delivery->city->name}}</option>

                                    @endforeach                               
                                </select>
                        </div>
                       
                               <input type="hidden" name="old_weight" id="old_weight" class="form-control" >
                                            
                               <input type="hidden" name="price" id="price" class="form-control">
                       
                        <div class="form-group">
                            <label style="text-align: left;">Weight ( kg )</label>
                             
                               <input type="text" name="weight" id="weight" value="{{$deliveryservices->weight}}" onkeyup="CalculateDelCharges(this.value)"class="form-control" >
                               
                               @if($errors->has('weight') || 1)
                                    <span class="form-text m-b-none text-danger">{{ $errors->first('weight') }}</span>
                                @endif
                        </div>
                         <div class="form-group">
                            <label style="text-align: float;">Delivery Charges</label>
                            <input type="text" name="del_charges" id="del_charges" onchange="CalculateDelCharges()" value="{{$deliveryservices->del_charges}}" class="form-control" >
                            
                        </div>

                        <div class="form-group">
                            <label style="text-align: float;">Delivery Detail Address</label>
                            <textarea name="detail_address" class="form-control">{{$deliveryservices->detail_address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label style="text-align: float;">Note</label>
                            <input type="text" name="note" value="{{$deliveryservices->note}}" class="form-control">
                        </div>
                        
                        

                        <!-- Submit Buttom -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <span class="float-right">
                                    <a href="{{ route('deliveryservice') }}" class="btn btn-white"><?php echo translate('cancel'); ?></a>
                                    <button type="submit" class="btn btn-cherryhan"><?php echo translate('save') ?></button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="{{ asset('misl/back/js/jquery.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change', '#city', function (e) {
         
            var city_id = $(this).val();

            //var weight=$('#weight');

            $.ajax({
                type: "GET",
                url: "/getdeliveryweight/"+city_id,
                //data: {'city_id': city_id},
                dataType: 'json',
                success: function (data) {
                 var w=0;
                 var p=0;
                    $.each(data, function (i, obj)
                    {
                                      
                        $("#old_weight").val(obj.weight);
                        $("#price").val(obj.price);
                        w+=obj.weight;
                        p+=obj.price;
                       
                    });

                    var weight=$("#weight").val();
                    var d=(weight/w)*p;
                    $('#del_charges').val(d);                  
                }
            });
        });

    })
    function CalculateDelCharges(value)
      {
        
        var weight = $('#weight').val();  
       
        /*var old_weight=$('#old_weight').val();
        var price=$('#price').val();
        var delivery_charges=parseFloat((weight/old_weight)*price);
        $("#del_charges").val(delivery_charges);*/
        
         var city_id = $('#city').val();
            $.ajax({
                type: "GET",
                url: "/getdeliveryweight/"+city_id,
                //data: {'city_id': city_id},
                dataType: 'json',
                success: function (data) {
                 var w=0;
                 var p=0;
                    $.each(data, function (i, obj)
                    {
                                      
                        $("#old_weight").val(obj.weight);
                        $("#price").val(obj.price);
                        w+=obj.weight;
                        p+=obj.price;
                       
                    });

                    var weight=$("#weight").val();
                    var d=(weight/w)*p;
                    $('#del_charges').val(d);                  
                }
            });

      }
</script>


