        @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('edit_new_bus_gate'); ?></h5>
                            @can('car.view')
                                <div class="ibox-tools">
                                    <a href="{{ route('busgateIndex') }}" class="btn btn-sm pt-2 btn-cherryhan" go-to-back ><i class="fa fa-reply"></i> <?php echo translate('back'); ?></a>
                                </div>
                            @endcan
                        </div>
                        <div class="ibox-content">
                            <form action="{{ route('busgateUpdate', $busgates->id) }}" method="post">
                                @csrf

                            <div class="form-group">
                                <label>@lang('cruds.car.name.label')</label>
                                <input type="text" name="name" value="{{$busgates->name}}" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
                                @if($errors->has('name') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.phone.label')</label>
                                <input type="text" name="phone" value="{{$busgates->phone}}" class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}" value="{{ old('phone') }}" required>
                                @if($errors->has('phone') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.email.label')</label>
                                <input type="email" name="email" value="{{$busgates->email}}" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ old('email') }}" required>
                                @if($errors->has('email') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.address.label')</label>
                                <input type="text" name="address" value="{{$busgates->address}}" class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}" value="{{ old('address') }}" required>
                                @if($errors->has('address') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label>@lang('cruds.car.country_id.label')</label>
                                <select  name="country_id" class="form-control" placeholder="@lang('form.car.country_id.placeholder')">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" <?php if ($country->id==$busgates->country_id): echo "selected";?>
                                            
                                        <?php endif ?>>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang('cruds.car.state_id.label')</label>
                                <select  name="state_id" class="form-control" placeholder="@lang('form.car.state_id.placeholder')">
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}" <?php if ($state->id==$busgates->state_id): echo "selected"; ?>
                                            
                                        <?php endif ?>>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang('cruds.car.city_id.label')</label>
                                <select  name="city_id" class="form-control" placeholder="@lang('form.car.city_id.placeholder')">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" <?php if ($city->id==$busgates->city_id): echo "selected";?>
                                            
                                        <?php endif ?>>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>@lang('cruds.bus-ticket.note.label')</label>
                                <input type="text" name="note" value="{{ $busgates->note }}" class="form-control {{ $errors->has('note') ? 'is-invalid':'' }}" value="{{ old('note') }}" required>
                                @if($errors->has('note') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('note') }}</span>
                                @endif
                            </div>
                                                     
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right"><?php echo translate('save'); ?></button>
                                <a href="{{ route('busgateIndex') }}" class="btn btn-default float-left"><?php echo translate('cancel'); ?></a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection