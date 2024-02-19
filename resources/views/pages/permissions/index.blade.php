            @extends('layouts.admin')

            @section('content')
        
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo translate('manage_permission') ?></h5>
                                @can('permission.add')
                                    <div class="ibox-tools">
                                        <a href="{{ route('permissionAdd') }}" class="btn btn-sm btn-cherryhan pt-2 chfw-5"><i class="fa fa-plus-circle"></i> <?php echo translate('add_new') ?></a>
                                    </div>
                                @endcan
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <!-- table -->
                                    <?php $segment1 = Request::segment(1); ?>
                                    <table class="table table-striped table-bordered table-hover dataTables-{{$segment1}}">
                                        <thead>
                                            <tr>
                                                <th class="text-center"><?php echo translate('id'); ?></th>
                                                <th><?php echo translate('name'); ?></th>
                                                <th><?php echo translate('title'); ?></th>
                                                <th><?php echo translate('roles'); ?></th>
                                                <th class="w-25"><?php echo translate('action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($permissions as $permission)
                                            <tr>
                                                <td class="text-right">{{ $permission->id }}</td>
                                                <td>{{ str_replace('.', ' ', $permission->name) }}</td>
                                                <td>{{ $permission->title }}</td>
                                                <td>
                                                    @foreach($permission->roles as $role)
                                                        <span class="badge badge-success">{{ $role->name }} </span>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    
                                                        <div class="btn-group">
                                                            @can('permission.edit')
                                                            <a href="{{ route('permissionEdit',$permission->id) }}" type="button" class="btn btn-info btn-sm"> <?php echo translate('edit') ?></a>
                                                            @endcan
                                                            @can('permission.delete')
                                                                <form action="{{ route('permissionDestroy',$permission->id) }}" method="post">
                                                                    @csrf
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('<?php echo translate('are_you_sure?') ?>')) {this.form.submit()}"> <?php echo translate('delete') ?></button>
                                                                </form>
                                                            @endcan    
                                                        </div>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!-- table end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

            @endsection
