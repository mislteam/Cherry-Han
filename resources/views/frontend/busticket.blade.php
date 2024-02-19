
@extends('layouts.frontend_template')
@section('content')
<?php $banner=get_one_banner('busticket_service'); ?>
@if($banner=="")
<section class="jumbotron text-center">
    <div class="container-lg mb-4">
      <h3><b>Bus Ticket</b></h3>
     
    </div>
</section>
@else
<section class="jumbotron text-center banner_bgimage" style="background: url('../feature/banner/{{$banner}}')top center;background-size: cover;">
    <div class="container mb-4">
      <h3><b style="color:#fff">Bus Ticket</b></h3>
     
    </div>
</section>
@endif
<div class="content">   
        <div class="row">
            <?php 
                foreach($bustickets as $row){
            ?>
            <div class="col-md-3">
                <!-- <div class="card shadow-lg p-3 mb-5 bg-white rounded"> -->
                <div class="card" style="box-shadow: 0 0 40px 0 rgba(100, 100, 100, 0.26) !important;">
                    <a href="#" class="card-item">
                  
                      <img class="card-img-top card-img-ticket" src="{{asset('feature/busticket/'.$row->feature_photo)}}" alt="Card image cap" height="150" >
                      <div class="card-body text-center">
                        <p class="card-title"></p>

                        <p class="card-text">{{$row->name}}</p>
                        <p class="card-text">{{$row->bus_type}}</p>
                        
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
