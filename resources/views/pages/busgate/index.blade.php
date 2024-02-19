        @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('bus_gate_list'); ?></h5>
                            @can('bus-gate.add')
	                            <div class="ibox-tools">
	                                <a href="{{ route('busgateAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
		                                   
		                                    <th><?php echo translate('name') ?></th>
		                                    <th><?php echo translate('phone') ?></th>
		                                    <th><?php echo translate('address') ?></th>
		                                    <th><?php echo translate('action') ?></th>
		                                </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $busgate)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            
                                            <td>{{ $busgate->name }}</td>
                                            <td>{{ $busgate->phone }}</td>
                                            <td>{{ $busgate->address }}</td>
                                            {{--<td class="{{ $busgate->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($busgate->status) }}</td>--}}
                                            <td>
                                                
                                                    <div class="btn-group">
                                                       
                                                        @can('bus-gate.edit')
                                                            <a href="{{ route('busgateEdit',$busgate->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('bus-gate.delete')
                                                            <form action="{{ route('busgateDestroy', $busgate->id) }}" method="post">
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