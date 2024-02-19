@extends('layouts.frontend_template')
@section('content')
<?php $banner=get_one_banner('delivery_service'); ?>
@if($banner=="")
<section class="jumbotron text-center">
    <div class="container-lg mb-4">
      <h3><b>Calculate Delivery Fee</b></h3>
     
    </div>
</section>
@else
<section class="jumbotron text-center banner_bgimage" style="background: url('../feature/banner/{{$banner}}')top center;background-size: cover;">
    <div class="container mb-4">
      <h3><b style="color:#fff">Calculate Delivery Fee</b></h3>
     
    </div>
</section>
@endif
<div class="content">   
        <div class="row">
               <div class="col-md-2"></div>               
               <div class="col-md-8">
                   <form action="{{ route('deliverybookingAdd') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label>Pickup Township</label>

                               <select  name="p_township" id="p_township" class="form-control single_select2" onchange="CalculateDelCharges()" placeh.older="@lang('form.categorytype.label')" required>
                                    <option value="">select township</option> 
                                    @foreach($cities as $city)            
                                        <option value="{{$city->id}}">{{ $city->name}}</option>
                                    @endforeach
                                        
                                </select>
                        </div>
                        <div class="form-group">
                            <label style="text-align: left;">Delivery Township</label>
                               <select  name="city_id" id="city_id" class="form-control single_select2"  placeh.older="@lang('form.categorytype.label')" required>
                                    <option value="">select township</option> 
                                        @foreach($deliverycity as $delivery)            
                                                                   
                                            <option value="{{$delivery->city_id}}" >{{ $delivery->city->name}}</option>

                                        @endforeach
                                </select>
                        </div>
                       
                               <input type="hidden" name="old_weight" id="old_weight" class="form-control old_weight" >
                                            
                               <input type="hidden" name="price" id="price" class="form-control price">
                       
                        <div class="form-group">
                            <label style="text-align: left;">Weight ( kg )</label>
                               <input type="text" name="weight" id="weight" onkeyup="CalculateDelCharges(this.value)" onchange="CalculateDelCharges()" value="1" id="weight" class="form-control weight" required>
                        </div>
                         <div class="form-group">
                            <label style="text-align: float;">Delivery Charges</label>
                            <input type="text" name="del_charges" onchange="CalculateDelCharges()" id="del_charges" value="0" class="form-control del_charges" required>
                        </div>
                       
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-cherryhan">Calculate</button>
                        </div>
                       
                   </form>
               </div>               
               <div class="col-md-2"></div>      
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
        
    </div>
@endsection
<!-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> -->
<script src="{{ asset('misl/back/js/jquery.min.js') }}"></script>
<!-- <script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.ok', function () {
            
           var pickup_township=$('#p_township').val();
           var city=$('#city_id').val();
            $.ajax({
            type: "post",
            url: "{{route('deliverybookingAdd')}}",
            data: {'pickup_township': pickup_township, 'city': city},
            dataType: "json",
            success: function (data) {
                
                $('#pickup_township').val(data.pickup_township);
                $('#city').val(data.city);
            }
        });
    });
</script> -->