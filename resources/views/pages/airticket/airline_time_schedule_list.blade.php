        @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('airline_service_list'); ?></h5>
                            @can('airline.add')
	                            <div class="ibox-tools">
	                                <a href="{{ route('airlinetimescheduleAdd',0) }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
		                                    <th class="text-center"><?php echo translate('name') ?></th>
                                            <th class="text-center"><?php echo translate('setup_price_list') ?></th>
                                            <th class="text-center"><?php echo translate('setup_flight_time_schedule') ?></th>
		                                    <th class="text-center"><?php echo translate('status') ?></th>
		                                    <th class="text-center"><?php echo translate('action') ?></th>
		                                </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($time_schedule as $row)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td class="text-center"><a href="{{ route('airlinepricelistAdd', $row->id) }}" type="button" class="btn btn-primary btn-sm pt-2"> <?php echo translate('setup_price_list') ?></a></td>
                                            <td class="text-center"><a href="{{ route('airlinetimescheduleAdd', $row->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('setup_flight_time_schedule') ?></a></td>
                                            <td class="{{ $row->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($row->status) }}</td>
                                            <td class="text-center">
                                                    <div class="btn-group">
                                                        {{--@can('airline.show')
                                                            <a href="{{ route('airlineView', $row->id) }}" type="button" class="btn btn-primary btn-sm pt-2"> <?php echo translate('view_detail') ?></a>
                                                        @endcan--}}
                                                        @can('airline.edit')
                                                            <a href="{{ route('airlineEdit', $row->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('airline.delete')
                                                            <form action="{{ route('airlineDestroy', $row->id) }}" method="post">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button type="button" class="btn btn-danger btn-sm pt-2" onclick="if (confirm('<?php echo translate('are_you_sure?') ?>')) { this.form.submit() } "> <?php echo translate('delete') ?></button>
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
