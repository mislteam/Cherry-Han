
@extends('layouts.frontend_template')
@section('content')
<?php $banner=get_one_banner('tour_service'); ?>
@if($banner=="")
<section class="jumbotron text-center">
    <div class="container-lg mb-4">
      <h3><b>{{$tour->tour_name}}</b></h3>
     
    </div>
</section>
@else
<section class="jumbotron text-center banner_bgimage" style="background: url('../feature/banner/{{$banner}}')top center;background-size: cover;">
    <div class="container mb-4">
      <h3><b style="color:#fff">{{$tour->tour_name}}</b></h3>
     
    </div>
</section>
@endif
  <main id="main">
    <!-- ======= Portfolio Details Section ======= -->
    <section class="blog-wrapper sect-pt4" id="blog">
      <div class="container">  
        <div class="row">
          <!-- <div class="col-md-12"> -->
            <div class="col-md-8">
              <div class="post-thumb">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                     <?php   
                        $a=1;              
                        $gallery = json_decode($tour->gallery, true);
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
                        <img class="d-block w-100" src="{{asset('feature/tour/'.$tour->feature_photo)}}" alt="">
                        <div class="container-lg">
                          <div class="carousel-caption text-center">
                            
                            <!-- <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> -->
                          </div>
                        </div>
                    </div>
                    <?php   
                        $a=1;              
                        $gallery = json_decode($tour->gallery, true);
                        foreach($gallery as $key =>$img){
                          if($a==1)
                            {
                              $c="active";
                            }else{
                              $c="";
                            }
                        ?>
                    <div class="carousel-item ">
                      <img class="d-block w-100" src="{{asset('gallery/tour/'.$img)}}" alt="">
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
            </div>
            <div class="col-md-4">
              <div class="post-meta">
                <!-- <h4 class="article-title"><?php //echo translate('travel_&_Tour') ?></h4> -->
                  <dl class="m-t-md">
                      <dd><b><?php echo translate('tour_category:') ?></b> {{$tour->tourcategory->name}}</dd>
                      {{--<dd><b><?php echo translate('tour_destination:') ?></b> {{$tour->tourdestination->name}}</dd>--}}
                      <dd><b><?php echo translate('tour_destination:') ?></b> 
                        <?php 
                        
                        $segment2 = Request::segment(2);
                        $des_id = Request::segment(4);
                       
                            $name=[];
                            $destination=json_decode($tour->destination_id, true);
                            
                            for($i=0;$i<count($destination);$i++){
                            
                              $des_name= DB::select('SELECT name as desname FROM tour_destinations WHERE id = "'.$destination[$i].'"');
                               $name[$i] = $des_name[0]->desname;
       
                            }
                            echo implode('-',$name);

                         ?>
                      </dd>
                      <dd><b><?php echo translate('contact_person:') ?></b> {{$tour->contact_person}}</dd>
                      <dd><b><?php echo translate('phone_no:') ?></b> {{$tour->phone_no}} </dd>
                      <dd><b><?php echo translate('email:') ?></b> {{$tour->email}}</dd>
                      <dd><b><?php echo translate('website:') ?></b> {{$tour->website}} </dd>
                      <dd><b><?php echo translate('price:') ?></b> {{number_format($tour->price)}} Ks/person</dd>
                      <dd><b><?php echo translate('package:') ?></b> {{$tour->package}}</dd>
                      <dd><b><?php echo translate('no_of_passenger:') ?></b> {{$tour->passenger}}</dd>
                      <dd><b><?php echo translate('tour_inclusive:') ?></b> {{$tour->include}}</dd>
                      <dd><b><?php echo translate('tour_exclusive:') ?></b> {{$tour->exclude}}</dd>
                      {{--<dd><b><?php echo translate('overview:') ?></b> {{$tour->description}}</dd>--}}
                  </dl>
              </div>
            </div>
      
          <!-- </div>  col-md-12-->
          
        </div><br><br>

        <div class="post-meta">
          <h4 class="article-title"><?php echo translate('over_view') ?></h4>
          <p>{{$tour->description}}</p>
            
        </div>
        <br><br>

        <div class="row">
          <div class="col-md-12">
                <h4><?php echo translate('tour_itineary'); ?></h4>
                <div id="accordion">

                <?php 
                  $no=1;
                  foreach($itineary as $list):
                   ?>  
                  <div class="card mb-2">
                    <div class="card-header" style="padding: 0px !important;" id="heading{{$no}}">
                      <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$no}}" aria-expanded="true" aria-controls="collapse{{$no}}">
                          <h6>{{$list->title}}</h6>
                        </button>
                      </h5>
                    </div>

                    <div id="collapse{{$no}}" class="collapse " aria-labelledby="heading{{$no}}" data-parent="#accordion">
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
    </section>
  </main><!-- End #main -->

 
 @endsection