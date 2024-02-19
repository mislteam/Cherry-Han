        @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('accommodation_service_booking_list'); ?></h5>
                        </div>
                        <div class="ibox-content">
                            <?php $segment1 = Request::segment(1); ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-{{$segment1}}" >
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo translate('id') ?></th>
                                            <th class="text-center"><?php echo translate('name') ?></th>
                                            <th class="text-center"><?php echo translate('phone') ?></th>
                                            <th class="text-center"><?php echo translate('status') ?></th>
                                            <th class="text-center"><?php echo translate('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $hotel)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            <td>{{ $hotel->name }}</td>
                                            <td>{{ $hotel->phone }}</td>
                                            <td class="{{ $hotel->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($hotel->status) }}</td>
                                            <td class="text-center">
                                                @can('hotel.delete')
                                                <form action="{{ route('hotelDestroy', $hotel->id) }}" method="post">
                                                    @csrf
                                                    <div class="btn-group">
                                                         @can('hotel.view')
                                                            <a href="{{ route('hotelView', $hotel->id) }}" type="button" class="btn btn-primary btn-sm pt-2"> <?php echo translate('view_detail') ?></a>
                                                        @endcan 
                                                        @can('hotel.edit')
                                                            <a href="{{ route('hotelEdit',$hotel->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="button" class="btn btn-danger btn-sm pt-2" onclick="if (confirm('<?php echo translate('are_you_sure?') ?>')) { this.form.submit() } "> <?php echo translate('delete') ?></button>
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