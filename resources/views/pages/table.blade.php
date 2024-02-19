        @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('cars_rental_service_list'); ?></h5>
                            @can('car.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('carsAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                            <th class="text-center"><?php echo translate('feature_photo') ?></th>
                                            <th class="text-center"><?php echo translate('name') ?></th>
                                            <th class="text-center"><?php echo translate('trip_type') ?></th>
                                            <th class="text-center"><?php echo translate('day_type') ?></th>
                                            <th class="text-center"><?php echo translate('owners_name') ?></th>
                                            <th class="text-center"><?php echo translate('status') ?></th>
                                            <th class="text-center"><?php echo translate('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $car)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            <td><img class="img img-responsive img-width" src="{{ asset('feature/cars/'.$car->feature_photo) }}" alt=""></td>
                                            <td>{{ $car->name }}</td>
                                            <td>{{ $car->trip_type }}</td>
                                            <td>{{ $car->day_type }}</td>
                                            <td>{{ $car->ownner_id }}</td>
                                            <td class="{{ $car->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($car->status) }}</td>
                                            <td class="text-center">
                                                @can('car.delete')
                                                <form action="{{ route('carsDestroy', $car->id) }}" method="post">
                                                    @csrf
                                                    <div class="btn-group">
                                                        @can('car.view')
                                                            <a href="{{ route('carsView', $car->id) }}" type="button" class="btn btn-primary btn-sm"> @lang('global.view_detail')</a>
                                                        @endcan
                                                        @can('car.edit')
                                                            <a href="{{ route('carsEdit',$car->id) }}" type="button" class="btn btn-info btn-sm"> @lang('global.edit')</a>
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
                        </div>
                    </div>
                </div>
            </div>
        @endsection