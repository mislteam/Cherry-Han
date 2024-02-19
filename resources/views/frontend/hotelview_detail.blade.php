
@extends('layouts.frontend_template')
@section('content')
<?php $banner=get_one_banner('hotel_service'); ?>
@if($banner=="")
<section class="jumbotron text-center">
    <div class="container-lg mb-4">
      <h3><b>{{$hotel->name}}</b></h3>
     
    </div>
</section>
@else
<section class="jumbotron text-center banner_bgimage" style="background: url('../feature/banner/{{$banner}}')top center;background-size: cover;">
    <div class="container mb-4">
      <h3><b style="color:#fff">{{$hotel->name}}</b></h3>
     
    </div>
</section>
@endif
  <main id="main">
    <!-- ======= Portfolio Details Section ======= -->
    <section class="blog-wrapper sect-pt4" id="blog">
      <div class="container">  
        <div class="row">
          <div class="col-md-12">
            <div class=""><!-- post-box -->
              <div class="post-thumb">
                <!-- dfkas -->
               
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <?php   
                        $a=1;              
                        $gallery = json_decode($hotel->gallery, true);
                        foreach($gallery as $key =>$img){
                          if($a==1)
                            {
                              $c="active";
                            }else{
                              $c="";
                            }
                        ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$a}}">{{$a}}</li>
                    <?php $a++; } ?>
                   
                  </ol>
                  <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('feature/hotel/'.$hotel->feature_photo)}}" alt="">
                        <div class="container-lg">
                          <div class="carousel-caption text-center">
                            
                            <!-- <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> -->
                          </div>
                        </div>
                    </div>
                    <?php   
                        $a=1;              
                        $gallery = json_decode($hotel->gallery, true);
                        foreach($gallery as $key =>$img){
                          if($a==1)
                            {
                              $c="active";
                            }else{
                              $c="";
                            }
                        ?>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="{{asset('gallery/hotel/'.$img)}}" alt="">
                    </div>

                    <?php 
                    $a++; 
                      }  
                    ?>
                    
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <br><br>
              <div class="post-meta">
                <h4 class="article-title"><?php echo translate('over_view') ?></h4>
                <p>{{$hotel->description}}</p>
                  
              </div>
              <br><br>
              
              <div class="row">
                <div class="col-md-6">
                  <dl class="small m-t-md">
                    <dt class="h4"><?php echo translate('services') ?></dt>
                    <?php
                      $services = json_decode($hotel->service, true);
                      foreach($services as $key =>$ser){
                      ?>
                    <dd> - {{$ser}}</dd>
                    <?php }  ?>
                    
                  </dl>
                </div>
                <div class="col-md-6">
                  <dl class="small m-t-md">
                    <dt class="h4"><?php echo translate('room_type') ?></dt>
                    @foreach($roomtypes as $room)
                      <dd><b> - {{$room->room_name}} </b> MMK ( {{number_format($room->price)}} ) / Night</dd>
                    @endforeach
                      
                  </dl>
                </div>
              </div><br>
              <div class="row">
                <div class="col-sm-12">
                  <dl class="small m-t-md">
                    <dt class="h4"><?php echo translate('address') ?></dt>
                        <dd><b> {{$hotel->address}}</b></dd>
                        <dd><b> Tel: {{$hotel->phone}} </b> </dd>
                        <dd><b> Email: {{$hotel->email}} </b> </dd>
                        <dd><b> Web: {{$hotel->website}} </b> </dd>
                  </dl>
                </div>
              </div>
                
            </div>
          </div>
          
        </div>
     
      </div>
    </section>
  </main><!-- End #main -->

 
 @endsection