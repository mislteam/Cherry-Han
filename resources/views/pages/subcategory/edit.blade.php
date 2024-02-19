
@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('form.category.title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roleIndex') }}">@lang('cruds.category.title')</a></li>
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
                        <h3 class="card-title">@lang('form.sub_category.title_edit')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('sub_categoryUpdate', $subcategory->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>@lang('form.sub_category.name.label')</label>
                                <input type="text" name="name" placeholder="@lang('form.sub_category.name.placeholder')" class="form-control" value="{{ old('name', $subcategory->name) }}">
                            </div>
                            <div class="form-group">
                                <label>@lang('form.sub_category.category_id.label')</label>
                                <select  name="category_id" class="form-control" placeholder="@lang('form.sub_category.category_id.placeholder')">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{($category->id == $subcategory->category_id)?'checked':''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>@lang('form.sub_category.slug.label')</label>
                                <input type="text" name="slug" placeholder="@lang('form.sub_category.slug.placeholder')" class="form-control" value="{{ old('slug', $subcategory->slug) }}">
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="btn btn-success float-right ml-3">@lang('global.save')</button>
                                <a href="{{ route('roleIndex') }}" class="btn btn-default float-right">@lang('global.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

