@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('cruds.bus-ticket.title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('busTicketIndex') }}">@lang('cruds.bus-ticket.title')</a></li>
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
                        <form action="{{ route('busTicketCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>@lang('cruds.car.name.label')</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                @if($errors->has('name') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.phone.label')</label>
                                <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}" value="{{ old('phone') }}" required>
                                @if($errors->has('phone') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.email.label')</label>
                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ old('email') }}" required>
                                @if($errors->has('email') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.address.label')</label>
                                <input type="text" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}" value="{{ old('address') }}" required>
                                @if($errors->has('address') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.bus_type.label')</label>
                                <input type="text" name="bus_type" class="form-control {{ $errors->has('bus_type') ? 'is-invalid':'' }}" value="{{ old('bus_type') }}" required>
                                @if($errors->has('bus_type') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('bus_type') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.price.label')</label>
                                <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}" value="{{ old('price') }}" required>
                                @if($errors->has('price') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.bus_gate_id.label')</label>
                                <select  name="bus_gate_id" class="form-control" placeholder="@lang('form.car.country_id.placeholder')">
                                    @foreach($busgates as $busgate)
                                        <option value="{{ $busgate->id }}">{{ $busgate->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang('cruds.car.country_id.label')</label>
                                <select  name="country_id" class="form-control" placeholder="@lang('form.car.country_id.placeholder')">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang('cruds.car.state_id.label')</label>
                                <select  name="state_id" class="form-control" placeholder="@lang('form.car.state_id.placeholder')">
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang('cruds.car.city_id.label')</label>
                                <select  name="city_id" class="form-control" placeholder="@lang('form.car.city_id.placeholder')">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>@lang('cruds.car.seat_no.label')</label>
                                <input type="number" name="seat_no" class="form-control {{ $errors->has('seat_no') ? 'is-invalid':'' }}" value="{{ old('seat_no') }}" required>
                                @if($errors->has('seat_no') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('seat_no') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.available_seat.label')</label>
                                <input type="number" name="available_seat" class="form-control {{ $errors->has('available_seat') ? 'is-invalid':'' }}" value="{{ old('available_seat') }}" required>
                                @if($errors->has('available_seat') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('available_seat') }}</span>
                                @endif
                            </div>
                           
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.note.label')</label>
                                <input type="text" name="note" class="form-control {{ $errors->has('note') ? 'is-invalid':'' }}" value="{{ old('note') }}" required>
                                @if($errors->has('note') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('note') }}</span>
                                @endif
                            </div>
                            
                           
                            <div class="form-group">
                                <label>@lang('cruds.car.feature_photo.label')</label>
                                <input type="file" name="feature_photo" class="form-control {{ $errors->has('feature_photo') ? 'is-invalid':'' }}" value="{{ old('feature_photo') }}" required>
                                @if($errors->has('feature_photo') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('feature_photo') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('busTicketIndex') }}" class="btn btn-default float-right mr-3">@lang('global.cancel')</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
