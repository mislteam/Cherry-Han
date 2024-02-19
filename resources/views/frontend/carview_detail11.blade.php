<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo translate('system_name'); ?></title>

    <!-- Fonts -->
    <link href="{{asset('misl/back/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Styles -->

    <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo translate('system_name'); ?>e</title>

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
<link href="{{asset('misl/back/css/font-awesome.min.css')}}" rel="stylesheet">
 
  
  
  <style type="text/css">
 
    

  </style>

</head>
<body>
   
 
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .img-width-view{
            width: 100%;
        }

    </style>
</head>
<body>
 <div class="wrapper position-ref container"> 
    <div class="content">
        <div class="row ch-content">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-title">
                            <h5><b><?php echo translate('cars_information'); ?></b></h5>
                            
                        </div>
                        <div class="ibox-content">
                           
                            <div class="row">
                                <!-- Car Feature Image and Gallery Start -->
                                <div class="col-md-12">
                                    <?php $segment1 = Request::segment(1); ?>
                                    <div class="product-images-{{$segment1}}">
                                        {{--<div>
                                            <div class="image-imitation">
                                                <img class="img-width-view" src="{{asset('feature/cars/'.$car->feature_photo)}}" alt="feature_photo">
                                            </div>
                                        </div>
                                        <?php
                                            $gallery = json_decode($car->gallery, true);
                                            foreach($gallery as $key =>$img){
                                        ?>
                                            <div>
                                                <div class="image-imitation">
                                                    <img class="img-width-view" src="{{asset('gallery/cars/'.$img)}}" alt="gallery_{{$key}}">
                                                </div>
                                            </div>
                                        <?php }?>--}}
                                    <div class="container mt-5">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
 
                                            <div class="carousel-inner">

                                            <?php      
                                             $a=1;
                                             
                                            $gallery = json_decode($car->gallery, true);
                                            foreach($gallery as $key =>$img)
                                                                                
                                              {
                                                if($a==1)
                                                {
                                                  $c="active";
                                                }else{
                                                  $c="";
                                                }
                                                ?>
                                            <div class="carousel-item {{$c}}">
                                              <img class="img-width-view" src="{{asset('gallery/cars/'.$img)}}" alt="gallery_{{$key}}"> </div>

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
                                    </div><!-- end container -->
                                    
                                    </div>
                                    <ol class="carousel-indicators">
                                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                </div>                                
                            </div>

                            <!-- car owner -->
                            <div class="row">
                                <div class="col-md-12 pl-4">


                                    <h4><?php echo translate('cars_owner') ?></h4>

                                    <dl class="m-t-md">
                                        <dd><b><?php echo translate('owner_name:') ?></b> {{$car->owner->name}}</dd>
                                        <dd><b><?php echo translate('owner_phone_number:') ?></b> <a href="tel:{{$car->owner->phone}}">{{$car->owner->phone}}</a></dd>
                                        <dd><b><?php echo translate('owner_email_address:') ?></b> <a href="mailto:{{$car->owner->email}}">{{$car->owner->email}}</a></dd>
                                        <dd><b><?php echo translate('owner_address:') ?></b> {{$car->owner->address}}, {{$car->owner->city->name}}, {{$car->owner->state->name}}, {{$car->owner->country->name}}</dd>
                                    </dl>                                  
                                </div>
                            </div>
                                

                                <!-- Car Feature Image and Gallery End -->
                                <!-- Car Information -->
                            <div class="row">
                                <div class="col-md-7 pl-4">

                                    <h5 class="font-bold m-b-xs">
                                        {{$car->name}}
                                    </h5>
                                  
                                    <h4><?php echo translate('cars_information_detail') ?></h4>

                                    <dl class="m-t-md">
                                        <dd><b><?php echo translate('owner_name:') ?></b> {{$car->name}}</dd>
                                        
                                        <dd><b><?php echo translate('owner_address:') ?></b> {{$car->address}}, {{$car->city->name}}, {{$car->state->name}}, {{$car->country->name}}</dd>
                                        <dd><b><?php echo translate('seater:') ?></b> {{$car->seat_no}}</dd>
                                        
                                        <dd><b><?php echo translate('wheel_drive:') ?></b> {{$car->wheel_drive}}</dd>
                                        <dd><b><?php echo translate('airbag:') ?></b> {{$car->airbag}}</dd>

                                    </dl>                                  
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-md-6">
                                    <dl class="small m-t-md">
                                        <dt class="h4"><?php echo translate('service') ?></dt>
                                        <dd><b><?php echo translate('owner_name:') ?></b> {{$car->owner->name}}</dd>
                                        <dd><b><?php echo translate('owner_phone_number:') ?></b> <a href="tel:{{$car->owner->phone}}">{{$car->owner->phone}}</a></dd>
                                        <dd><b><?php echo translate('owner_email_address:') ?></b> <a href="mailto:{{$car->owner->email}}">{{$car->owner->email}}</a></dd>
                                        <dd><b><?php echo translate('owner_address:') ?></b> {{$car->owner->address}}, {{$car->owner->city->name}}, {{$car->owner->state->name}}, {{$car->owner->country->name}}</dd>
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
    </div>

 </div>
</body>
</html>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('misl/back/js/bootstrap.min.js') }}"></script>

<script>
    $(window).on('load', function() {
        $(".loader-in").fadeOut();
        $(".loader").delay(150).fadeOut("fast");
        $(".wrapper").fadeIn("fast");
        $("#app").fadeIn("fast");
    });
</script>
