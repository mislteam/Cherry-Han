@extends('layouts.admin')

@section('content')
    <!-- Make Cake -->
    <div class="row m-5">
        <div class="col-md-4 mt-4">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">New Orders</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="badge badge-primary">{{ 'Today'}}</span>
                    </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="text-center fa-3x">12,750</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-4 mt-4">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">New Orders</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="badge badge-primary">{{ date('M')}}</span>
                    </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="text-center fa-3x">500</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-4 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Total Orders</h3>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="text-center fa-3x">12,750</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
