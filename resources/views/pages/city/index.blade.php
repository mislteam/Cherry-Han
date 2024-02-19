@extends('layouts.admin')

@section('content')
        <!-- Main content -->
        <!-- <div id="loading"></div>  -->
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('city_list'); ?></h5>
                            @can('city.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('cityAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                            <th><?php echo translate('city_name') ?></th>
                                            <th><?php echo translate('state_name') ?></th>
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
                                        @foreach($cities as $city)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $city->name }}</td>
                                                <td>{{ $city->state->name }}</td>
                                                <td>{{ $city->country->name }}</td>
                                                {{--<td class="{{ $city->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($city->status) }}</td>--}}

                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="car_status" class="onoffswitch-checkbox" change-status="page-cities-car-{{$city->car_status}}-{{$city->id}}"  id="car{{$city->id}}" <?php if ($city->car_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="car{{$city->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="cargo_status" class="onoffswitch-checkbox" change-status="page-cities-cargo-{{$city->cargo_status}}-{{$city->id}}"  id="cargo{{$city->id}}" <?php if ($city->cargo_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="cargo{{$city->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="container_status" class="onoffswitch-checkbox " change-status="page-cities-container-{{$city->container_status}}-{{$city->id}}"  id="container{{$city->id}}" <?php if ($city->container_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="container{{$city->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="delivery_status" class="onoffswitch-checkbox" change-status="page-cities-delivery-{{$city->delivery_status}}-{{$city->id}}" id="delivery{{$city->id}}" <?php if ($city->delivery_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="delivery{{$city->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{--<td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="busticket_status" class="onoffswitch-checkbox" change-status="page-cities-busticket-{{$city->busticket_status}}-{{$city->id}}"  id="busticket{{$city->id}}" <?php if ($city->busticket_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="busticket{{$city->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>--}}
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="hotel_status" class="onoffswitch-checkbox" change-status="page-cities-hotel-{{$city->hotel_status}}-{{$city->id}}" id="hotel{{$city->id}}" <?php if ($city->hotel_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="hotel{{$city->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{--<td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="tour_status" class="onoffswitch-checkbox" change-status="page-cities-tour-{{$city->tour_status}}-{{$city->id}}"  id="tour{{$city->id}}" <?php if ($city->tour_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="tour{{$city->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>--}}
                                                <td class="text-center">
                                                    
                                                        <div class="btn-group">
                                                            @can('city.edit')
                                                                <a href="{{ route('cityEdit',$city->id) }}" type="button" class="btn btn-info btn-sm"> <?php echo translate('edit') ?></a>
                                                            @endcan
                                                            @can('city.delete')
                                                                <form action="{{ route('cityDestroy',$city->id) }}" method="post">
                                                                    @csrf
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('are_you_sure?')) { this.form.submit() } "> <?php echo translate('delete') ?></button>
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
