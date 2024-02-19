
@extends('layouts.frontend_template')
@section('content')
<section class="jumbotron text-center">
    <div class="container mb-4">
      <h3><b>Cars View Detail</b></h3>    
    </div>
  </section>
  <main id="main">
    <!-- ======= Portfolio Details Section ======= -->
    <section class="blog-wrapper sect-pt4" id="blog">
      <div class="container">  
        <div class="row">
          <div class="col-md-12">
            <div class=""><!-- post-box -->
              <div class="post-thumb">
                <!-- dfkas -->
                <h5>{{$car->brand->name}} / {{$car->car_model->name}} </h5>
                  <div class="slideshow-container">
                    <?php
                      $gallery = json_decode($car->gallery, true);
                      foreach($gallery as $key =>$img){
                      ?>
                    <div class="mySlides fade">
                      <div class="numbertext"></div>
                      <img src="{{asset('gallery/cars/'.$img)}}" class="img-fluid active h-50 w-100" alt="">
                      <div class="text">{{$key+1}}</div>
                    </div>
                    <?php }  ?>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                  </div>
                  <br>

                  <div style="text-align:center">

                        <?php 
                          $no=1; 
                          foreach($gallery as $key =>$img){
                          ?>  
                            <span class="dot" onclick="currentSlide('{{$no}}')"><img class="logo_img dot_image" src="{{asset('gallery/cars/'.$img)}}" width="100"></span> 
                          
                        <?php 
                        $no++;
                        } 
                      
                        ?>
                  
                  </div>
              </div>
              <br><br>
              <div class="post-meta">
                <h4 class="article-title"><?php echo translate('cars_owner') ?></h4>
                  <dl class="m-t-md">
                      <dd><b><?php echo translate('owner_name:') ?></b> {{$car->owner->name}}</dd>
                      <dd><b><?php echo translate('owner_phone_number:') ?></b> <a href="tel:{{$car->owner->phone}}">{{$car->owner->phone}}</a></dd>
                      <dd><b><?php echo translate('owner_email_address:') ?></b> <a href="mailto:{{$car->owner->email}}">{{$car->owner->email}}</a></dd>
                      <dd><b><?php echo translate('owner_address:') ?></b> {{$car->owner->address}}, {{$car->owner->city->name}}, {{$car->owner->state->name}}, {{$car->owner->country->name}}</dd>
                  </dl>
              </div>
              <br><br>
              <div class="article-content">
                
                  <h4><?php echo translate('cars_information_detail') ?></h4>

                    <dl class="m-t-md">
                        <dd><b><?php echo translate('owner_name:') ?></b> {{$car->name}}</dd>
                        
                        <dd><b><?php echo translate('owner_address:') ?></b> {{$car->address}}, {{$car->city->name}}, {{$car->state->name}}, {{$car->country->name}}</dd>
                        <dd><b><?php echo translate('seater:') ?></b> {{$car->seat_no}}</dd>
                        
                        <dd><b><?php echo translate('wheel_drive:') ?></b> {{$car->wheel_drive}}</dd>
                        <dd><b><?php echo translate('airbag:') ?></b> {{$car->airbag}}</dd>

                    </dl>                      
              </div><br><br>
              <div class="row">
                <div class="col-md-6">
                  <dl class="small m-t-md">
                    <dt class="h4"><?php echo translate('service') ?></dt>
                    <?php
                      $services = json_decode($car->service, true);
                      foreach($services as $key =>$ser){
                      ?>
                        <dd> {{$ser}}</dd>
                    <?php }  ?>
                    
                  </dl>
                </div>
                <div class="col-md-6">
                  <dl class="small m-t-md">
                    <dt class="h4"><?php echo translate('driver_information') ?></dt>
                      <dd><b><?php echo translate('driver_name:') ?></b> {{$car->driver->name}}</dd>
                      <dd><b><?php echo translate('driver_phone_number:') ?></b> <a href="tel:{{$car->driver->phone}}">{{$car->driver->phone}}</a></dd>
                      <dd><b><?php echo translate('driver_email_address:') ?></b> <a href="mailto:{{$car->driver->email}}">{{$car->driver->email}}</a></dd>
                      <dd><b><?php echo translate('driver_address:') ?></b> {{$car->driver->address}}, {{$car->driver->city->name}}, {{$car->driver->state->name}}, {{$car->driver->country->name}}</dd>
                      <dd><b><?php echo translate('driver_tours_exp:') ?></b> {{$car->driver->tour_exp}}</dd>
                      <dd><b><?php echo translate('driver_driving_exp:') ?></b> {{$car->driver->drive_exp}}</dd>
                      <dd><b><?php echo translate('driver_license_type:') ?></b> {{$car->driver->license_type}}</dd>
                      <dd><b><?php echo translate('driver_drive_safety:') ?></b> {{($car->driver->demage == 'no')? 'Yes':'No'}}</dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          
        </div>
     
      </div>
    </section>
  </main><!-- End #main -->

 
<script>
    $(document).ready(function(){


        $('.product-images').slick({
            dots: true
        });

    });

</script>
 @endsection