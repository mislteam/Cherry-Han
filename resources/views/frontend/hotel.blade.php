@extends('layouts.frontend_template')
@section('content')
<?php $banner=get_one_banner('hotel_service'); ?>
@if($banner=="")
<section class="jumbotron text-center">
    <div class="container-lg mb-4">
      <h3><b>Accommodation</b></h3>
     
    </div>
</section>
@else
<section class="jumbotron text-center banner_bgimage" style="background: url('../feature/banner/{{$banner}}')top center;background-size: cover;">
    <div class="container mb-4">
      <h3><b style="color:#fff">Accommodation</b></h3>
     
    </div>
</section>
@endif
<div class="content">   
        <div class="row">
            <?php 
                foreach($hotels as $row){
            ?>
            <div class="col-md-3 mb-3">
                <!-- <div class="card shadow-lg p-3 mb-5 bg-white rounded"> -->
                <div class="card" style="box-shadow: 0 0 40px 0 rgba(100, 100, 100, 0.26) !important;">
                    <a href="{{ route('frontendhotelView', $row->id) }}" class="card-item">
                      <img class="card-img-top" src="{{asset('feature/hotel/'.$row->feature_photo)}}" alt="Card image cap" height="150">
                      <div class="card-body text-center">
                        <p class="card-title">
                        <?php 
                        $level = ($row->star_level < 5)?$row->star_level: 5;
                        for ($i=1; $i <= $level ; $i++) { 
                            echo '<i class="bi bi-star-fill pl-1 pr-1"></i>';
                        } 
                        ?></p>
                        <p class="card-text">{{$row->name}}</p>                        
                        <p class="card-text">{{$row->state->name}}</p>                        
                        {{--<p>{{$row->id}}</p>--}}
                        <p><?php
                                                  
                            $roomtype= DB::select('SELECT max(price) as maxprice,min(price) as minprice FROM hotel_room_types WHERE hotel_id = "'.$row->id.'" GROUP BY hotel_id');
                          
                             foreach($roomtype as $rt)    

                                {
                                    if($rt->minprice==$rt->maxprice){
                                        echo "MMK (".(number_format($rt->maxprice)).")";
                                    }else{
                                       echo  $price = "MMK (".(number_format($rt->minprice)."-".number_format($rt->maxprice)).")";
                                    }
                                }

                            ?>

                        </p>
                      </div>
                    </a> 
                </div>               
            </div>
        <?php } ?>
           
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
