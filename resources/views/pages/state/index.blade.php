@extends('layouts.admin')

@section('content')
        <!-- Main content -->
        <!-- <div id="loading"></div> -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('state_list'); ?></h5>
                            @can('city.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('stateAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
                                </div>
                            @endcan
                        </div>
                        <div class="ibox-content">
                            <?php $segment1 = Request::segment(1); ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-{{$segment1}}" >
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo translate('id') ?></th>
                                            <th><?php echo translate('name') ?></th>
                                            <th><?php echo translate('country_name') ?></th>
                                            <th><?php echo translate('car_service') ?></th>
                                            <th><?php echo translate('cargo_service') ?></th>
                                            <th><?php echo translate('container_service') ?></th>
                                            <th><?php echo translate('delivery_service') ?></th>
                                            <th><?php echo translate('hotel_service') ?></th>
                                            <th class="text-center"><?php echo translate('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $count = 1;
                                        @endphp
                                        @foreach($states as $state)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $state->name }}</td>
                                                <td>{{ $state->country->name }}</td>
                                                {{--<td class="{{ $state->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($state->status) }}</td>--}}
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="car_status" class="onoffswitch-checkbox" change-status="page-states-car-{{$state->car_status}}-{{$state->id}}"  id="car{{$state->id}}" <?php if ($state->car_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="car{{$state->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="cargo_status" class="onoffswitch-checkbox" change-status="page-states-cargo-{{$state->cargo_status}}-{{$state->id}}"  id="cargo{{$state->id}}" <?php if ($state->cargo_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="cargo{{$state->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="container_status" class="onoffswitch-checkbox " change-status="page-states-container-{{$state->container_status}}-{{$state->id}}"  id="container{{$state->id}}" <?php if ($state->container_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="container{{$state->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="delivery_status" class="onoffswitch-checkbox" change-status="page-states-delivery-{{$state->delivery_status}}-{{$state->id}}"  id="delivery{{$state->id}}" <?php if ($state->delivery_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="delivery{{$state->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{--<td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="busticket_status" class="onoffswitch-checkbox" change-status="page-states-busticket-{{$state->busticket_status}}-{{$state->id}}"  id="busticket{{$state->id}}" <?php if ($state->busticket_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="busticket{{$state->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>--}}
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="hotel_status" class="onoffswitch-checkbox" change-status="page-states-hotel-{{$state->hotel_status}}-{{$state->id}}"  id="hotel{{$state->id}}" <?php if ($state->hotel_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="hotel{{$state->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{--<td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="tour_status" class="onoffswitch-checkbox" change-status="page-states-tour-{{$state->tour_status}}-{{$state->id}}"  id="tour{{$state->id}}" <?php if ($state->tour_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="tour{{$state->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>--}}
                                                <td class="text-center">
                                                    
                                                        <div class="btn-group">
                                                            @can('roles.edit')
                                                                <a href="{{ route('stateEdit', $state->id) }}" type="button" class="btn btn-info btn-sm"> @lang('global.edit')</a>
                                                            @endcan
                                                            @can('state.delete')
                                                                <form action="{{ route('stateDestroy', $state->id) }}" method="post">
                                                                    @csrf
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure?')) { this.form.submit() } "> @lang('global.delete')</button>
                                                                </form>
                                                            @endcan
                                                        </div>
                                                    
                                                </td>
                                            </tr>
                                            @php
                                            $count++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.content -->
@endsection
