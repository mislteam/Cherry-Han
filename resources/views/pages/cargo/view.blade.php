@extends('layouts.admin')

@section('content')
    <div class="row ch-content">
        <div class="col-lg-12">

            <div class="ibox product-detail">
                <div class="ibox-title">
                    <h5><?php echo translate('cargo_information'); ?></h5>
                    <div class="ibox-tools">
                        <a href="{{ route('cargoIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <?php //print_r($cargo->brand->name) ?>
                    <?php //print_r($cargo->driver->name) ?>
                    <?php //print_r($cargo->owner) ?>
                    <div class="row">
                        <!-- Car Feature Image and Gallery Start -->
                        <div class="col-md-5">
                            <?php $segment1 = Request::segment(1); ?>
                            <div class="product-images-{{$segment1}}">
                                <div>
                                    <div class="image-imitation">
                                        <img class="img-width-view" src="{{asset('feature/cargo/'.$cargo->feature_photo)}}" alt="feature_photo">
                                    </div>
                                </div>
                                <?php
                                    $gallery = json_decode($cargo->gallery, true);
                                    foreach($gallery as $key =>$img){
                                ?>
                                    <div>
                                        <div class="image-imitation">
                                            <img class="img-width-view" src="{{asset('gallery/cargo/'.$img)}}" alt="gallery_{{$key}}">
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <!-- Car Feature Image and Gallery End -->
                        <!-- Car Information -->
                        <div class="col-md-7 pl-4">

                            <h2 class="font-bold m-b-xs">
                                {{$cargo->name}}
                            </h2>
                            <hr>

                            <h4><?php echo translate('owner_information') ?></h4>

                            <dl class="m-t-md">
                                <dd><b><?php echo translate('owner_name:') ?></b> {{$cargo->owner->name}}</dd>
                                <dd><b><?php echo translate('owner_phone_number:') ?></b> <a href="tel:{{$cargo->owner->phone}}">{{$cargo->owner->phone}}</a></dd>
                                <dd><b><?php echo translate('owner_email_address:') ?></b> <a href="mailto:{{$cargo->owner->email}}">{{$cargo->owner->email}}</a></dd>
                                <dd><b><?php echo translate('owner_address:') ?></b> {{$cargo->owner->address}}, {{$cargo->owner->city->name}}, {{$cargo->owner->state->name}}, {{$cargo->owner->country->name}}</dd>
                            </dl>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <dl class="small m-t-md">
                                <dt class="h4"><?php echo translate('cars_information_detail') ?></dt>
                                <dd><b><?php echo translate('owner_name:') ?></b> {{$cargo->owner->name}}</dd>
                                <dd><b><?php echo translate('owner_phone_number:') ?></b> <a href="tel:{{$cargo->owner->phone}}">{{$cargo->owner->phone}}</a></dd>
                                <dd><b><?php echo translate('owner_email_address:') ?></b> <a href="mailto:{{$cargo->owner->email}}">{{$cargo->owner->email}}</a></dd>
                                <dd><b><?php echo translate('owner_address:') ?></b> {{$cargo->owner->address}}, {{$cargo->owner->city->name}}, {{$cargo->owner->state->name}}, {{$cargo->owner->country->name}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="small m-t-md">
                                <dt class="h4"><?php echo translate('driver_information') ?></dt>
                                <dd><b><?php echo translate('driver_name:') ?></b> {{$cargo->driver->name}}</dd>
                                <dd><b><?php echo translate('driver_phone_number:') ?></b> <a href="tel:{{$cargo->driver->phone}}">{{$cargo->driver->phone}}</a></dd>
                                <dd><b><?php echo translate('driver_email_address:') ?></b> <a href="mailto:{{$cargo->driver->email}}">{{$cargo->driver->email}}</a></dd>
                                <dd><b><?php echo translate('driver_address:') ?></b> {{$cargo->driver->address}}, {{$cargo->driver->city->name}}, {{$cargo->driver->state->name}}, {{$cargo->driver->country->name}}</dd>
                                <dd><b><?php echo translate('driver_tours_exp:') ?></b> {{$cargo->driver->tour_exp}}</dd>
                                <dd><b><?php echo translate('driver_driving_exp:') ?></b> {{$cargo->driver->drive_exp}}</dd>
                                <dd><b><?php echo translate('driver_license_type:') ?></b> {{$cargo->driver->license_type}}</dd>
                                <dd><b><?php echo translate('driver_drive_safety:') ?></b> {{($cargo->driver->demage == 'no')? 'Yes':'No'}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
