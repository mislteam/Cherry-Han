
@extends('layouts.frontend_template')
@section('content')
<?php $banner=get_one_banner('tour_service'); ?>
@if($banner=="")
<section class="jumbotron text-center">
    <div class="container-lg mb-4">
      <h3><b>Tour Destination</b></h3>
     
    </div>
</section>
@else
<section class="jumbotron text-center banner_bgimage" style="background: url('../feature/banner/{{$banner}}')top center;background-size: cover;">
    <div class="container mb-4">
      <h3><b style="color:#fff">Tour Destination</b></h3>
     
    </div>
</section>
@endif


<div class="content">   
        <div class="row">
            <?php 
                foreach($tourdestinations as $row){
            ?>
            
            <div class="col-md-3 mb-5">
                <!-- <div class="card shadow-lg p-3 mb-5 bg-white rounded"> -->
                <div class="card" style="box-shadow: 0 0 40px 0 rgba(100, 100, 100, 0.26) !important;">
                    <a href="{{route('tourdestinationView', $row->id)}}" class="card-item">
                      <img class="card-img-top" src="{{asset('feature/tourdestination/'.$row->feature_photo)}}" alt="Card image cap" height="175px" >
                      <div class="card-body pt-0 text-center">
                        <p class="card-title"></p>

                        <p class="card-text">{{$row->name}}</p>
                        
                        
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
