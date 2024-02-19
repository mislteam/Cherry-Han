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
                                            <td class="align-middle text-right ">{{ $count }}</td>
                                            <td class="align-middle"><img class="img img-responsive img-width" src="{{ asset('feature/cars/'.$car->feature_photo) }}" alt=""></td>
                                            <td class="align-middle">{{ $car->name }}</td>
                                            <td class="align-middle">{{ $car->trip_type }}</td>
                                            <td class="align-middle">{{ $car->day_type }}</td>
                                            <td class="align-middle">{{ $car->owner->name }}</td>
                                            <td class="align-middle text-center"><i class="fa <?php echo ($car->status=='yes')? 'fa-check-circle text-success': 'fa-times-circle'; ?>"></i></td>
                                            <td class="align-middle text-center">
                                                
                                                    <div class="btn-group">
                                                        @can('car.show')
                                                            <a href="{{ route('carsView', $car->id) }}" type="button" class="btn btn-primary btn-sm"> <?php echo translate('view_detail') ?></a>
                                                        @endcan
                                                        @can('car.edit')
                                                            <a href="{{ route('carsEdit',$car->id) }}" type="button" class="btn btn-info btn-sm"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('car.delete')
                                                        <form action="{{ route('carsDestroy', $car->id) }}" method="post">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure?')) { this.form.submit() } "> <?php echo translate('delete') ?></button>
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
        @endsection