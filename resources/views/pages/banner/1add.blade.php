@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('cruds.banner.title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('bannerIndex') }}">@lang('cruds.banner.title')</a></li>
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
                        <h3 class="card-title">@lang('global.add')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('bannerCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>@lang('cruds.banner.page_name.label')</label>
                                <input type="text" name="page_name" class="form-control {{ $errors->has('page_name') ? 'is-invalid':'' }}" value="{{ old('page_name') }}" required>
                                @if($errors->has('page_name') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('page_name') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label>@lang('cruds.banner.service_type.label')</label>
                                <input type="text" name="service_type" class="form-control {{ $errors->has('service_type') ? 'is-invalid':'' }}" value="{{ old('service_type') }}" required>
                                @if($errors->has('service_type') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('service_type') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label>@lang('cruds.banner.banner_type.label')</label>
                                <input type="text" name="banner_type" class="form-control {{ $errors->has('banner_type') ? 'is-invalid':'' }}" value="{{ old('banner_type') }}" required>
                                @if($errors->has('banner_type') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('banner_type') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label>@lang('cruds.banner.banner_photo.label')</label>
                                <input type="file" name="banner_photo" class="form-control {{ $errors->has('banner_photo') ? 'is-invalid':'' }}" value="{{ old('banner_photo') }}" required>
                                @if($errors->has('banner_photo') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('banner_photo') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('bannerIndex') }}" class="btn btn-default float-right mr-3">@lang('global.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
