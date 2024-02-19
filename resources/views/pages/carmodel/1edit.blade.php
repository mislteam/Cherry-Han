
@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('form.carmodel.title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roleIndex') }}">@lang('cruds.carmodel.title')</a></li>
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
                        <h3 class="card-title">@lang('form.carmodel.title')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('carmodelUpdate', $carmodel->id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>@lang('form.carmodel.name.label')</label>
                                <input type="text" name="name" placeholder="@lang('form.carmodel.name.placeholder')" class="form-control" value="{{ old('name', $carmodel->name) }}">
                            </div>
                            <div class="form-group">
                                <label>@lang('form.carmodel.brand_id.label')</label>
                                <select  name="brand_id" class="form-control" placeholder="@lang('form.carbrand.brand_id.placeholder')">
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{($brand->id == $carmodel->brand_id)? 'selected': ''}}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>@lang('form.carmodel.slug.label')</label>
                                <input type="text" name="seo_title" placeholder="@lang('form.carmodel.slug.placeholder')" class="form-control" value="{{ old('seo_title', $carmodel->seo_title) }}">
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

