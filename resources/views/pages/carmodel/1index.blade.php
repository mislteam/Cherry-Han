@extends('layouts.admin')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@lang('cruds.carmodel.title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                            <li class="breadcrumb-item active">@lang('cruds.carmodel.title')</li>
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
                            <h3 class="card-title">@lang('cruds.carmodel.title_singular')</h3>
                            <!-- @can('carmodel.add') -->
                            <a href="{{ route('carmodelAdd') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                                @lang('global.add')
                            </a>
                            <!-- @endcan -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Data table -->
                            <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" role="grid" aria-describedby="dataTable_info">
                                <thead>
                                <tr>
                                    <th>@lang('cruds.carmodel.fields.id')</th>
                                    <th>@lang('cruds.carmodel.fields.name')</th>
                                    <!-- <th>@lang('cruds.carmodel.fields.brand_id')</th> -->
                                    <!-- <th>@lang('cruds.carmodel.fields.status')</th> -->
                                    <th class="w-25">@lang('global.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach($lists as $row)

                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{$row->name}}</td>
                                        <!-- <td>{{$row->car_brand_id}}</td> -->
                                        <!-- <td class="{{ $row->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($row->status) }}</td> -->
                                        <td class="text-center">
                                            @can('carmodel.delete')
                                            <form action="{{ route('carmodelDestroy',$row->id) }}" method="post">
                                                @csrf
                                                <div class="btn-group">
                                                    @can('roles.edit')
                                                        <a href="{{ route('carmodelEdit',$row->id) }}" type="button" class="btn btn-info btn-sm"> @lang('global.edit')</a>
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
