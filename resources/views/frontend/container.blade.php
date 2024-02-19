
@extends('layouts.frontend_template')
@section('content')
<?php $banner=get_one_banner('container_service'); ?>
@if($banner=="")
<section class="jumbotron text-center">
    <div class="container-lg mb-4">
      <h3><b>Container Service</b></h3>
     
    </div>
</section>
@else
<section class="jumbotron text-center banner_bgimage" style="background: url('../feature/banner/{{$banner}}')top center;background-size: cover;">
    <div class="container mb-4 overlay">
      <h3><b style="color:#fff">Container Service</b></h3>
     
    </div>
</section>
@endif

<div class="content">   
        <div class="row">
            <?php 
           
                foreach($containers as $row){
            ?>
            <div class="col-md-3 mb-3">
                <!-- <div class="card shadow-lg p-3 mb-5 bg-white rounded"> -->
                <div class="card" style="box-shadow: 0 0 40px 0 rgba(100, 100, 100, 0.26) !important;">
                    <a href="{{ route('frontendcontainerView', $row->id) }}" class="card-item">
                      <img class="card-img-top" src="{{asset('feature/container/'.$row->feature_photo)}}" alt="Card image cap" height="150">
                      <div class="card-body tex">
                        <p class="card-title">{{$row->brand->name}}/{{$row->car_model->name}}</p>

                        {{--<p class="card-text">{{$row->state->name}}</p>--}}
                        
                        
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