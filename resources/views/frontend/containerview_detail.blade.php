
@extends('layouts.frontend_template')
@section('content')

<?php $banner=get_one_banner('container_service'); ?>
@if($banner=="")
<section class="jumbotron text-center">
    <div class="container-lg mb-4">
      <h3><b>{{$container->name}}</b></h3>
     
    </div>
</section>
@else
<section class="jumbotron text-center banner_bgimage" style="background: url('../../feature/banner/{{$banner}}')top center;background-size: cover;">
    <div class="container mb-4">
      <h3><b style="color:#fff">{{$container->name}}</b></h3>
     
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
            
              <!-- Carousel Start -->
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

                  <?php  
                    $a = 1;
                    $gallery = json_decode($container->gallery, true);
                        foreach($gallery as $key =>$img){
                        ?>
                        <li data-target="#myCarousel" data-slide-to="{{$a}}"></li>
                    <?php $a++; } ?>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('feature/container/'.$container->feature_photo)}}" alt="">
                        <div class="container-lg">
                          <div class="carousel-caption text-center">
                            <!--<h1>Feature Photo</h1>-->
                            <!-- <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> -->
                          </div>
                        </div>
                    </div>

                    <?php 
                        $b = 1;
                        foreach ($gallery as $key => $value) { ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('gallery/container/'.$img)}}" alt="">
                            <div class="container-lg">
                              <div class="carousel-caption text-center">
                                
                              </div>
                            </div>
                        </div>
                    <?php $b++; } ?>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <!-- Carousel End -->


              <br><br>
              <div class="post-meta row">
                <h4 class="article-title"><?php echo translate('cars_owner') ?></h4>
                <div class="col-md-2">
                    <img class="d-block" src="{{asset('feature/carowner/'.$container->owner->feature_photo)}}" alt="" width="150">
                </div>
                <div class="col-md-6">
                    <dl class="m-t-md">
                      <dd><b><?php echo translate('owner_name:') ?></b> {{$container->owner->name}}</dd>
                      <dd><b><?php echo translate('owner_phone_number:') ?></b> <a href="tel:{{$container->owner->phone}}">{{$container->owner->phone}}</a></dd>
                      <dd><b><?php echo translate('owner_email_address:') ?></b> <a href="mailto:{{$container->owner->email}}">{{$container->owner->email}}</a></dd>
                      <dd><b><?php echo translate('owner_address:') ?></b> {{$container->owner->address}}, {{$container->owner->city->name}}, {{$container->owner->state->name}}, {{$container->owner->country->name}}</dd>
                  </dl>
                </div>
                <div class="col-md-4"></div>
                  
              </div>
              <br><br>
              <div class="article-content">
                <div class="row">
                  <div class="col-md-6">
                      <h4><?php echo translate('cars_information_detail') ?></h4>
                    <dl class="m-t-md">
                        {{--<dd><b><?php echo translate('owner_address:') ?></b> {{$container->address}}, {{$container->city->name}}, {{$container->state->name}}, {{$container->country->name}}</dd>--}}
                        <dd><b><?php echo translate('wheel_drive:') ?></b> {{$container->wheel_drive}}</dd>
                        {{--<dd><b><?php echo translate('available_city:') ?></b> {{$container->state->name}}</dd>--}}
                        {{--<dd><b><?php echo translate('capacity:') ?></b> {{$container->capacity}}</dd>--}}
                        {{--<dd><b><?php echo translate('car_type:') ?></b> {{$container->cartype->name}}</dd>--}}
                        <dd><b><?php echo translate('license_type:') ?></b> {{$container->license_type}}</dd>
                        <dd><b><?php echo translate('car_body_space:') ?></b> {{$container->width}} x {{$container->height}} x {{$container->length}}</dd>
                    </dl>
                  </div>
                  <div class="col-md-6">
                      <dl class="small m-t-md">
                      <table class="table table-borderless">
                        <tr>
                          <th><?php echo translate('car_type') ?></th>
                          <th><?php echo translate('destination_from') ?></th>
                          <th><?php echo translate('destination_to') ?></th>
                          <th><?php echo translate('price') ?></th>
                        </tr>
                        <?php foreach($containerprices as $row) { ?>
                        <tr>
                          <td>{{$row->cartype->name}}</td>
                          <td>{{$row->containerdestinationfrom->name}}</td>
                          <td>{{$row->containerdestinationto->name}}</td>
                          <td>{{$row->price}}</td>
                        </tr>
                        <?php } ?>
                      </table>
                          
                      </dl>
                  </div>
                </div>      
              </div><br><br>
              <div class="row">
                <div class="col-md-6">
                  <dl class="small m-t-md">
                    <dt class="h4"><?php echo translate('services') ?></dt>
                    <?php
                      $services = json_decode($container->service, true);
                      foreach($services as $key =>$ser){
                      ?>
                        <dd> {{$ser}}</dd>
                    <?php }  ?>
                    
                  </dl>
                </div>
                <div class="col-md-6">
                  <dl class="small m-t-md">
                    <dt class="h4"><?php echo translate('driver_information') ?></dt>
                      <dd><b><?php echo translate('driver_name:') ?></b> {{$container->driver->name}}</dd>
                      <dd><b><?php echo translate('driver_phone_number:') ?></b> <a href="tel:{{$container->driver->phone}}">{{$container->driver->phone}}</a></dd>
                      <dd><b><?php echo translate('driver_email_address:') ?></b> <a href="mailto:{{$container->driver->email}}">{{$container->driver->email}}</a></dd>
                      <dd><b><?php echo translate('driver_address:') ?></b> {{$container->driver->address}}, {{$container->driver->city->name}}, {{$container->driver->state->name}}, {{$container->driver->country->name}}</dd>
                      <dd><b><?php echo translate('tours_experience:') ?></b> {{$container->driver->tour_exp}}</dd>
                      <dd><b><?php echo translate('driving_experience:') ?></b> {{$container->driver->drive_exp}}</dd>
                      <dd><b><?php echo translate('driver_license_type:') ?></b> {{$container->driver->license_type}}</dd>
                      <dd><b><?php echo translate('driver_drive_safety:') ?></b> {{($container->driver->demage == 'no')? 'Yes':'No'}}</dd>
                      <dd><b><?php echo translate('language:') ?></b>
                      <?php 
                                            
                           $language =(array) json_decode($container->driver->language, true);
                            $c=count($language);
                            
                            if($c==1)
                            {
                              echo $language[0];
                            }else{
                             for($i=1;$i<$c;$i++){
                                 echo $language[0].",".$language[$i];
                               }
                            }
                            
                            ?>
                      </dd>
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