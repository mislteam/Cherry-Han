        @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('bus_ticket_service_list'); ?></h5>
                            @can('bus-ticket.add')
	                            <div class="ibox-tools">
	                                <a href="{{ route('busticketAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
	                            </div>
                            @endcan
                        </div>
                        <div class="ibox-content">
                            <?php $segment1 = Request::segment(1); ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-{{$segment1}}" >
                                    <thead>
                                        <tr>
		                                    <th width="5%"><?php echo translate('id') ?></th>
		                                    <th><?php echo translate('feature_photo') ?></th>
		                                    <th><?php echo translate('name') ?></th>
		                                    <th><?php echo translate('bus_type') ?></th>
		                                    <th><?php echo translate('bus_gate') ?></th>
		                                    <th><?php echo translate('status') ?></th>
		                                    @canany(['bus-ticket.edit','bus-ticket.delete','bus-ticket.show'])
		                                    <th><?php echo translate('action') ?></th>@endcanany
		                                </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $busticket)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            <td><img class="img img-responsive img-width" src="{{ asset('feature/busticket/'.$busticket->feature_photo) }}" alt=""></td>
                                            <td>{{ $busticket->name }}</td>
                                            <td>{{ $busticket->bus_type }}</td>
                                            <td>{{ $busticket->busgate->name }}</td>
                                            <td class="{{ $busticket->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($busticket->status) }}</td>
                                            <td>
                                                
                                                    <div class="btn-group">
                                                        
                                                        @can('bus-ticket.edit')
                                                            <a href="{{ route('busticketEdit', $busticket->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('bus-ticket.delete')
                                                            <form action="{{ route('busticketDestroy', $busticket->id) }}" method="post">
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