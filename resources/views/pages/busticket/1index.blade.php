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
                            @can('car.add')
                            <a href="{{ route('carsAdd') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                                @lang('global.add')
                            </a>
                            @endcan
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Data table -->
                            <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" role="grid" aria-describedby="dataTable_info">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Feature Photo</th>
                                    <th>Name</th>
                                    <th>Trip Type</th>
                                    <th>Day Type</th>
                                    <th>Ownner Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach($lists as $car)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td><img class="img img-responsive img-width" src="{{ asset('feature/cars/'.$car->feature_photo) }}" alt=""></td>
                                        <td>{{ $car->name }}</td>
                                        <td>{{ $car->trip_type }}</td>
                                        <td>{{ $car->day_type }}</td>
                                        <td>{{ $car->ownner_id }}</td>
                                        <td class="{{ $car->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($car->status) }}</td>
                                        <td class="text-center">
                                            @can('car.delete')
                                            <form action="{{ route('carsDestroy', $car->id) }}" method="post">
                                                @csrf
                                                <div class="btn-group">
                                                    @can('car.view')
                                                        <a href="{{ route('carsView', $car->id) }}" type="button" class="btn btn-primary btn-sm"> @lang('global.view_detail')</a>
                                                    @endcan
                                                    @can('car.edit')
                                                        <a href="{{ route('carsEdit',$car->id) }}" type="button" class="btn btn-info btn-sm"> @lang('global.edit')</a>
                                                    @endcan
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure?')) { this.form.submit() } "> @lang('global.delete')</button>
                                                </div>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @php
                                    $count++;
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>
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
