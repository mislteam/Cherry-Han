
@extends('layouts.frontend_template')
@section('content')
<?php $banner=get_one_banner('tour_service'); ?>
@if($banner=="")
<section class="jumbotron text-center">
    <div class="container-lg mb-4">
      <h3><b>Travel & Tours</b></h3>
     
    </div>
</section>
@else
<section class="jumbotron text-center banner_bgimage" style="background: url('../feature/banner/{{$banner}}')top center;background-size: cover;">
    <div class="container mb-4">
      <h3><b style="color:#fff">Travel & Tours</b></h3>
     
    </div>
</section>
@endif
  
<div class="content">   
        <div class="row">
            <?php 
            //$name=[];
                foreach($tours as $row){
            ?>
            <div class="col-md-3 mb-3">
                <!-- <div class="card shadow-lg p-3 mb-5 bg-white rounded"> -->
                <div class="card" style="box-shadow: 0 0 40px 0 rgba(100, 100, 100, 0.26) !important;">
                      <img class="card-img-top" src="{{asset('feature/tour/'.$row->feature_photo)}}" alt="Card image cap" height="200">
                      <div class="card-body text-center">
                        <a href="{{ route('frontendtourView', $row->id) }}" class="">
                            <p class="card-title">{{$row->tour_name}}</p>
                        </a>
                        <p class="card-text">{{$row->package}}</p>
                        {{--<p class="card-text"> {{$row->tourdestination->name}}</p>--}} 
                        <p class="card-text"> 
                        <?php 
                        $name=[];
                            $destination=json_decode($row->destination_id, true);
                            
                            for($i=0;$i<count($destination);$i++){
                            
                              $des_name= DB::select('SELECT name as desname FROM tour_destinations WHERE id = "'.$destination[$i].'"');
                               $name[$i] = $des_name[0]->desname;
       
                            }
                            echo implode('-',$name);
                    
                         ?>
                        </p> 
                        <p class="card-text">{{number_format($row->price) }} Ks/person</p>
                      </div>
                      <div class="card-footer text-center">
                            <a href="{{ route('frontendtourView', $row->id) }}" class="btn btn-md btn-cherryhan">
                                View Detail
                            </a>
                      </div>
                </div>               
            </div>
        <?php }  ?>
           
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