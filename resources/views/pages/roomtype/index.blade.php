        @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('room_type'); ?></h5>
                            @can('car.add')
	                            <div class="ibox-tools">
	                                <a href="{{ route('roomtypeAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
		                                    <th class="text-center"><?php echo translate('description') ?></th>
                                            <th class="text-center"><?php echo translate('hotel') ?></th>
                                            <th class="text-center"><?php echo translate('price') ?></th>
		                                    <th class="text-center"><?php echo translate('action') ?></th>
		                                </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $roomtype)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            
                                            <td>{{ $roomtype->room_name }}</td>
                                            <td>{{ $roomtype->description }}</td>
                                            <td>{{ $roomtype->hotel->name }}</td>
                                            <td>{{ $roomtype->price }}</td>
         
                                            <td class="text-center">
                                                
                                                    <div class="btn-group">
                                                       
                                                        @can('roomtype.edit')
                                                            <a href="{{ route('roomtypeEdit',$roomtype->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('roomtype.delete')
                                                            <form action="{{ route('roomtypeDestroy', $roomtype->id) }}" method="post">
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