        @extends('layouts.admin')

		@section('content')
            <div class="row ch-content">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                    	<div class="ibox-title">
                            <h5><?php echo translate('cars_information'); ?></h5>
                            @can('car.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('carsIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                                </div>
                            @endcan
                        </div>
                        <div class="ibox-content">
                        	<?php //print_r($car->brand->name) ?>
                        	<?php //print_r($car->driver->name) ?>
                        	<?php //print_r($car->owner) ?>
                            <div class="row">
                            	<!-- Car Feature Image and Gallery Start -->
                                <div class="col-md-5">
                                	<?php $segment1 = Request::segment(1); ?>
                                    <div class="product-images-{{$segment1}}">
                                    	<div>
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
	                                    <?php }?>
                                    </div>
                                </div>
                                <!-- Car Feature Image and Gallery End -->
                                <!-- Car Information -->
                                <div class="col-md-7 pl-4">

                                    <h2 class="font-bold m-b-xs">
                                        {{$car->name}}
                                    </h2>
                                    <hr>

                                    <h4><?php echo translate(' owner_information') ?></h4>

                                    <dl class="m-t-md">
                                        <dd><b><?php echo translate('owner_name:') ?></b> {{$car->owner->name}}</dd>
                                        <dd><b><?php echo translate('owner_phone_number:') ?></b> <a href="tel:{{$car->owner->phone}}">{{$car->owner->phone}}</a></dd>
                                        <dd><b><?php echo translate('owner_email_address:') ?></b> <a href="mailto:{{$car->owner->email}}">{{$car->owner->email}}</a></dd>
                                        <dd><b><?php echo translate('owner_address:') ?></b> {{$car->owner->address}}, {{$car->owner->city->name}}, {{$car->owner->state->name}}, {{$car->owner->country->name}}</dd>
                                    </dl>                                  
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- Car Information -->
                            	<div class="col-md-5">
                                    <hr>
                                    <h4 class="h4"><?php echo translate('cars_information_detail') ?></h4>
                                    <ul class="unstyled small m-t-md pl-2">
                                        <li><b><?php echo translate('name:') ?></b> {{$car->name}}</li>
                                        <li><b><?php echo translate('brand:') ?></b> {{$car->brand->name}}</li>
                                        <li><b><?php echo translate('model:') ?></b> {{$car->car_model->name}}</li>
                                        <li><b><?php echo translate('trip_type:') ?></b> {{$car->trip_type}}</li>
                                        <li><b><?php echo translate('available_use_case:') ?></b> {{$car->day_type}}</li>
                                        <li><b><?php echo translate('no_of_seat:') ?></b> {{$car->seat_no}}</li>
                                        <li><b><?php echo translate('a/c:') ?></b> {{ucwords($car->ac)}}</li>
                                        <li><b><?php echo translate('wheel_drive:') ?></b> {{strtoupper($car->wheel_drive)}}</li>
                                        <li><b><?php echo translate('abs:') ?></b> {{ucwords($car->abs)}}</li>
                                        <li><b><?php echo translate('airbag:') ?></b> {{ucwords($car->airbag)}}</li>
                                        <li><b><?php echo translate('no_of_laggage:') ?></b> {{$car->no_of_laggage}}</li>
                                        <li><b><?php echo translate('car_license_no:') ?></b> {{$car->license_type}}</li>
                                       
                                    </ul>
                                    <h4 class="h4"><?php echo translate('cars_service_inforamtion') ?></h4>
                                    <ul class="unstyled small m-t-md pl-2">
                                        <?php
                                          $services = json_decode($car->service, true);
                                          foreach($services as $key =>$val){
                                          ?>
                                        <li><b>{{$val}}</b></li>
                                        <?php }  ?>
                                                                               
                                    </ul>
                            	</div>
                                <!-- End Car Information -->

                                <!-- Car Driver Information -->
                            	<div class="col-md-7">
                                    <hr>
                                    <ul class="small m-t-md">
                                        <dt class="h4"><?php echo translate('driver_information') ?></dt>
                                        <dd><b><?php echo translate('driver_name:') ?></b> {{$car->driver->name}}</dd>
                                        <dd><b><?php echo translate('driver_phone_number:') ?></b> <a href="tel:{{$car->driver->phone}}">{{$car->driver->phone}}</a></dd>
                                        <dd><b><?php echo translate('driver_email_address:') ?></b> <a href="mailto:{{$car->driver->email}}">{{$car->driver->email}}</a></dd>
                                        <dd><b><?php echo translate('driver_address:') ?></b> {{$car->driver->address}}, {{$car->driver->city->name}}, {{$car->driver->state->name}}, {{$car->driver->country->name}}</dd>
                                        <dd><b><?php echo translate('driver_tours_exp:') ?></b> {{$car->driver->tour_exp}}</dd>
                                        <dd><b><?php echo translate('driver_driving_exp:') ?></b> {{$car->driver->drive_exp}}</dd>
                                        <dd><b><?php echo translate('driver_license_type:') ?></b> {{$car->driver->license_type}}</dd>
                                        <dd><b><?php echo translate('driver_drive_safety:') ?></b> {{($car->driver->demage == 'no')? 'Yes':'No'}}</dd>
                                    </ul>
                            	</div>
                                <!-- End Car Driver Information -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        @endsection