@extends('layouts.admin')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@lang('cruds.car.title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                            <li class="breadcrumb-item active">@lang('cruds.car.title')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang('cruds.car.title_singular')</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                         <div class="row mb-4">
                             <div class="col-12 mb-4">
                                 <img class="img-width" src="{{asset('/feature/cars/'.$car->feature_photo)}}" alt="">
                            </div>
                            <div class="col-12">
                                <ul class="list-group list-group-horizontal">
                                    <?php
                                        $gallery = json_decode($car->gallery, true);
                                        foreach($gallery as $key =>$img){
                                    ?>
                                    <li class="list-group-item"><img class="img-width" src="{{asset('gallery/cars/'.$img)}}" alt=""></li>
                                    <?php }?>
                                </ul>
                            </div>
                         </div>
                        <div class="row mb-4">
                            <div class="col-4">Car Name :</div>
                            <div class="col-8">{{$car->name}}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">Car Brand :</div>
                            <div class="col-8">{{$car->brand_id}}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">Car Name :</div>
                            <div class="col-8">{{$car->model_id}}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">Car Name :</div>
                            <div class="col-8">{{$car->name}}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">Car Name :</div>
                            <div class="col-8">{{$car->name}}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">Car Name :</div>
                            <div class="col-8">{{$car->name}}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">Car Name :</div>
                            <div class="col-8">{{$car->name}}</div>
                        </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
@endsection
