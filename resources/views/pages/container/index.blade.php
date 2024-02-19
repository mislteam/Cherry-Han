@extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('cars_container_service_list'); ?></h5>
                            @can('container.add')
	                            <div class="ibox-tools">
	                                <a href="{{ route('containerAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
		                                    {{--<th class="text-center"><?php echo translate('car_type') ?></th>--}}
		                                    
		                                    <th class="text-center"><?php echo translate('owners_name') ?></th>
		                                    <th class="text-center"><?php echo translate('status') ?></th>
		                                    <th class="text-center"><?php echo translate('action') ?></th>
		                                </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $container)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            <td><img class="img img-responsive img-width" src="{{ asset('feature/container/'.$container->feature_photo) }}" alt=""></td>
                                            <td>{{ $container->name }}</td>
                                           
                                            <td>{{ $container->owner->name }}</td>
                                            <td class="{{ $container->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($container->status) }}</td>
                                            <td class="text-center">
                                               
                                                    <div class="btn-group">
                                                        @can('container.show')
                                                            <a href="{{ route('containerView', $container->id) }}" type="button" class="btn btn-primary btn-sm"> <?php echo translate('view_detail'); ?> </a>
                                                        @endcan
                                                        @can('container.edit')
                                                            <a href="{{ route('containerEdit',$container->id) }}" type="button" class="btn btn-info btn-sm"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('container.delete')
                                                            <form action="{{ route('containerDestroy', $container->id) }}" method="post">
                                                                @csrf
                                                                <?php $sure = translate('are_you_sure_?');?>
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('<?php echo $sure; ?>')) { this.form.submit() } "> <?php echo translate('delete') ?></button>
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
