@extends('layouts.admin')
@section('content')
        <!-- Main content -->
           
        
            <div class="row" >
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('country_list'); ?></h5>
                            @can('country.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('countryAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                        @foreach($countries as $country)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $country->name }}</td>
                                                
                                                {{--<td class="{{ $country->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($country->status) }}</td>--}}
                                                {{--<td class="text-center">
                                                <i style="cursor: pointer" id="country_{{ $country->id }}" class="fa {{ ($country->status)=='active' ? 'fa-check-circle text-info':'fa-times-circle text-danger' }}"
                                                   @can("country.edit") onclick="toggle_country($country->id)" @endcan ></i>
                                                </td>--}}
                                        
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch"><!-- onclick="changecountry({{$country->id}})" -->
                                                            <input type="checkbox" name="car_status" class="onoffswitch-checkbox" change-status="page-countries-car-{{$country->car_status}}-{{$country->id}}" id="car{{$country->id}}" <?php if ($country->car_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="car{{$country->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch"><!-- onclick="changecountry({{$country->id}})" -->
                                                            <input type="checkbox" name="cargo_status" class="onoffswitch-checkbox" change-status="page-countries-cargo-{{$country->cargo_status}}-{{$country->id}}"  id="cargo{{$country->id}}" <?php if ($country->cargo_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="cargo{{$country->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="container_status" class="onoffswitch-checkbox" change-status="page-countries-container-{{$country->container_status}}-{{$country->id}}"  id="container{{$country->id}}" <?php if ($country->container_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="container{{$country->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="delivery_status" class="onoffswitch-checkbox" change-status="page-countries-delivery-{{$country->delivery_status}}-{{$country->id}}"  id="delivery{{$country->id}}" <?php if ($country->delivery_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="delivery{{$country->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{--<td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="busticket_status" class="onoffswitch-checkbox" change-status="page-countries-busticket-{{$country->busticket_status}}-{{$country->id}}" id="busticket{{$country->id}}" <?php if ($country->busticket_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="busticket{{$country->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>--}}
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox"  name="hotel_status" class="onoffswitch-checkbox" change-status="page-countries-hotel-{{$country->hotel_status}}-{{$country->id}}" id="hotel{{$country->id}}" <?php if ($country->hotel_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="hotel{{$country->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{--<td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="tour_status" class="onoffswitch-checkbox" change-status="page-countries-tour-{{$country->tour_status}}-{{$country->id}}" id="tour{{$country->id}}" <?php if ($country->tour_status=='active'){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="tour{{$country->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>--}}

                                                <td class="text-center">
                                                    
                                                        <div class="btn-group">
                                                            @can('roles.edit')
                                                                <a href="{{ route('countryEdit',$country->id) }}" type="button" class="btn btn-info btn-sm"> <?php echo translate('edit') ?></a>
                                                            @endcan
                                                            @can('country.delete')
                                                                <form action="{{ route('countryDestroy',$country->id) }}" method="post">
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

