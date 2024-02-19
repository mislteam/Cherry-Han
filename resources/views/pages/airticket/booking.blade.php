        @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('bus_ticket_booking_list'); ?></h5>
                            {{--
                            @can('bus-ticket.add')
	                            <div class="ibox-tools">
	                                <a href="{{ route('busticketAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
	                            </div>
                            @endcan
                            --}}
                        </div>
                        <div class="ibox-content">
                            <?php $segment1 = Request::segment(1); ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-{{$segment1}}" >
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo translate('id') ?></th>
                                            <th class="text-center"><?php echo translate('name') ?></th>
                                            <th class="text-center"><?php echo translate('status') ?></th>
                                            <th class="text-center"><?php echo translate('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $busticket)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            <td>{{ $busticket->name }}</td>
                                            <td class="{{ $busticket->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($busticket->status) }}</td>
                                            <td class="text-center">
                                                @can('bus-ticket.delete')
                                                <form action="{{ route('busticketDestroy', $busticket->id) }}" method="post">
                                                    @csrf
                                                    <div class="btn-group">
                                                        {{--@can('bus-ticket.view')
                                                            <a href="{{ route('busticketbookingView', $busticket->id) }}" type="button" class="btn btn-primary btn-sm pt-2"> <?php echo translate('view_detail') ?></a>
                                                        @endcan--}}
                                                        @can('bus-ticket.edit')
                                                            <a href="{{ route('busticketEdit', $busticket->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
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