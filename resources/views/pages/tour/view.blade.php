@extends('layouts.admin')
@section('content')
    <div class="row ch-content">
        <div class="col-lg-12">

            <div class="ibox product-detail">
            	<div class="ibox-title">
                    <h5><?php echo translate('travels_&_tours'); ?></h5>
                    @can('car.view')
                        <div class="ibox-tools">
                            <a href="{{ route('tourIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                        </div>
                    @endcan
                </div>
                <div class="ibox-content">
                	
                    <div class="row">
                    	<!-- Car Feature Image and Gallery Start -->
                        <div class="col-md-5">
                        	<?php $segment1 = Request::segment(1); ?>
                            <div class="product-images-{{$segment1}}">
                            	<div>
                                    <div class="image-imitation">
                                        <img class="img-width-view" src="{{asset('feature/tour/'.$tour->feature_photo)}}" alt="feature_photo">
                                    </div>
                                </div>
                            	<?php
                                    $gallery = json_decode($tour->gallery, true);
                                    foreach($gallery as $key =>$img){
                                ?>
                                    <div>
                                        <div class="image-imitation">
                                            <img class="img-width-view" src="{{asset('gallery/tour/'.$img)}}" alt="gallery_{{$key}}">
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <!-- Car Feature Image and Gallery End -->
                        <!-- Car Information -->
                        <div class="col-md-7 pl-4">

                            <h3>Description</h3>
                            <p>{{$tour->description}}</p>
                        </div>

                    <hr>
                    </div>

                    <br><br>
                        <div class="row">
                        	<div class="col-md-12">
                                <h3><?php echo translate('tour_itineary'); ?></h3>
                                <div id="accordion">

                                <?php 
                                  $no=1;
                                  foreach($itineary as $list):
                                   ?>  
                                  <div class="card mb-2">
                                    <div class="card-header" style="padding: 0px !important;" id="heading{{$no}}">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$no}}" aria-expanded="true" aria-controls="collapse{{$no}}">
                                          <h4>{{$list->title}}</h4>
                                        </button>
                                      </h5>
                                    </div>

                                    <div id="collapse{{$no}}" class="collapse show" aria-labelledby="heading{{$no}}" data-parent="#accordion">
                                      <div class="card-body">
                                       {{ $list->description }}
                                      </div>
                                    </div>
                                  </div>
                                  <?php 
                                  $no++;
                                endforeach;
                                   ?> 
                                </div>
                        	</div>
                        	
                        </div>                
            </div>

        </div>
    </div>
@endsection