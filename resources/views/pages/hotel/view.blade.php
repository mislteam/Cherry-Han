        @extends('layouts.admin')

		@section('content')
            <div class="row ch-content">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                    	<div class="ibox-title">
                            <h5><?php echo translate('hotel'); ?></h5>
                            @can('car.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('hotelIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
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
                                                <img class="img-width-view" src="{{asset('feature/hotel/'.$hotel->feature_photo)}}" alt="feature_photo">
                                            </div>
                                        </div>
	                                	<?php
	                                        $gallery = json_decode($hotel->gallery, true);
	                                        foreach($gallery as $key =>$img){
	                                    ?>
	                                        <div>
	                                            <div class="image-imitation">
	                                                <img class="img-width-view" src="{{asset('gallery/hotel/'.$img)}}" alt="gallery_{{$key}}">
	                                            </div>
	                                        </div>
	                                    <?php }?>
                                    </div>
                                </div>
                               
                                <div class="col-md-7 pl-4">
                                    <h4><?php echo translate('description') ?></h4>
                                      <p>{{$hotel->description}}</p>                          
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                            	<div class="col-md-6">
                                   <h4><?php echo translate('service') ?></h4>
                                   <?php
                                        $service = json_decode($hotel->service, true);
                                        foreach($service as $key =>$val){
                                    ?>
                                   <p>
                                       {{$val}}
                                   </p>
                               <?php } ?>
                            	</div>
                            	<div class="col-md-6">
                                    <h4><?php echo translate('address') ?></h4>
                                    <p>{{$hotel->address}}</p>
                                        
                            	</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        @endsection