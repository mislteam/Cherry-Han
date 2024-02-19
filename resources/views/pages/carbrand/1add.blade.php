@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Car Model</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('carmodelIndex') }}">@lang('form.carbrand.title')</a></li>
                        <li class="breadcrumb-item active">@lang('global.add')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('form.carbrand.title')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('carbrandCreate') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>@lang('form.carbrand.name.label')</label>
                                <input type="text" name="name" placeholder="@lang('form.carbrand.name.placeholder')" class="form-control" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label>@lang('form.carbrand.slug.label')</label>
                                <input type="text" name="seo_title" placeholder="@lang('form.carbrand.slug.placeholder')" class="form-control" value="{{ old('seo_title') }}">
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="btn btn-success float-right ml-3">@lang('global.save')</button>
                                <a href="{{ route('carmodelIndex') }}" class="btn btn-default float-right">@lang('global.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
