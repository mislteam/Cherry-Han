@extends('layouts.frontend_template')
@section('content')
<?php $banner=get_one_banner('car_service'); ?>
@if($banner=="")
<section class="jumbotron text-center">
  <div class="container-lg mb-4">
    <h3><b>Car Rentals</b></h3>
  </div>
</section>
@else
<section class="jumbotron text-center banner_bgimage"
  style="background: url('../feature/banner/{{$banner}}')top center;background-size: cover;background-size: cover; height:150px">
  <div class="container mb-4">
    <h3><b style="color:#fff">Car Rentals</b></h3>
  </div>
</section>
@endif

<div class="content">
  <div class="row">
    <h3 class="text-center mb-3" style="color: #ea068d">Car Rental Service</h3>
    <div class="card-group mobile-car-view">
      <?php 
            $counter = 0;
                foreach($cars as $row){
                  if($counter >= 3) {
                break; // Exit the loop if we've shown 3 items
            }
            ?>
  
      <div class="card">
        <a href="{{ route('frontendcarsView', $row->id) }}" class="card-item">
        <img class="card-img-top " src="{{asset('feature/cars/'.$row->feature_photo)}}" alt="Card image cap"
          height="150">
        <div class="card-body">
          <p class="card-title">{{$row->brand->name}}</p>
          <small class="card-text">{{$row->state->name}}</small>
          <small class="card-text">No. of Seat: {{$row->seat_no}}</small>
        </div>
        </a>
      </div>
      <?php  $counter++;
            } ?>
    </div>
    <div class="text-center mt-3 mb-2">
      <a href="#" class="btn btn-sm" style="background-color: #ea068d;color:#fff;">see more</a>
    </div>
  </div>
  <hr>
  {{-- cargos --}}
  <div class="row">
    <h3 class="text-center m-3" style="color: #ea068d">Cargo Service</h3>
    <div class="card-group mobile-car-view">
      <?php 
            $counter = 0;
                foreach($cargos as $row){
                  if($counter >= 3) {
                break; // Exit the loop if we've shown 3 items
            }
            ?>
      <div class="card">
        <a href="{{ route('frontendcarsView', $row->id) }}" class="card-item">
        <img class="card-img-top " src="{{asset('feature/cargo/'.$row->feature_photo)}}" alt="Card image cap"
          height="150">
        <div class="card-body">
          <p class="card-title">{{$row->brand->name}}/{{$row->car_model->name}}</p>
          <small class="card-text">{{$row->state->name}}</small>
          <small class="card-text">No. of lincense: {{$row->seat_no}}</small>
        </div>
        </a>
      </div>
      <?php  $counter++;
            } ?>
    </div>
    <div class="text-center mt-3">
      <a href="#" class="btn btn-sm" style="background-color: #ea068d;color:#fff;">see more</a>
    </div>
  </div>
  <hr>
  {{-- cargos --}}

    {{-- hotels --}}
    <div class="row">
      <h3 class="text-center m-3" style="color: #ea068d">Accommodations</h3>
      <div class="card-group mobile-car-view">
        <?php 
              $counter = 0;
                  foreach($hotels as $row){
                    if($counter >= 3) {
                  break; // Exit the loop if we've shown 3 items
              }
              ?>
        <div class="card">
          <a href="{{ route('frontendcarsView', $row->id) }}" class="card-item">
          <img class="card-img-top" src="{{asset('feature/hotel/'.$row->feature_photo)}}" alt="Card image cap"
            height="150">
          <div class="card-body">
            <small class="card-title">{{ implode(' ', array_slice(explode(' ', $row->name), 0, 2)) }}</small>{{--  limit 2 words --}}
            <small class="card-text">{{$row->phone}}</small>
            <small class="card-text"> {{$row->email}}</small>
          </div>
          </a>
        </div>
        <?php  $counter++;
              } ?>
      </div>
      <div class="text-center mt-3">
        <a href="#" class="btn btn-sm" style="background-color: #ea068d;color:#fff;">see more</a>
      </div>
    </div>
    <hr>
    {{-- hotels --}}

      {{-- cargos --}}
  <div class="row">
    <h3 class="text-center m-3" style="color: #ea068d">Bus Ticket Service</h3>
    <div class="card-group mobile-car-view">
      <?php 
            $counter = 0;
                foreach($bustickets as $row){
                  if($counter >= 3) {
                break; // Exit the loop if we've shown 3 items
            }
            ?>
      <div class="card">
        <a href="{{ route('frontendcarsView', $row->id) }}" class="card-item">
        <img class="card-img-top " src="{{asset('feature/busticket/'.$row->feature_photo)}}" alt="Card image cap"
          height="150">
        <div class="card-body">
          <p class="card-title">{{ implode(' ', array_slice(explode(' ', $row->name), 0, 1)) }}</p>
          <small class="card-text">{{$row->phone}}</small>
          <small class="card-text">{{$row->price}}</small>
        </div>
        </a>
      </div>
      <?php  $counter++;
            } ?>
    </div>
    <div class="text-center mt-3">
      <a href="#" class="btn btn-sm" style="background-color: #ea068d;color:#fff;">see more</a>
    </div>
  </div>
  <hr>
  {{-- cargos --}}





  {{-- <br><br>
  <?php //if($terms!=""){?>

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
  <?php //} ?>
</div> --}}
@endsection