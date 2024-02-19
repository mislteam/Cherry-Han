            @extends('layouts.admin')

            @section('content')
        
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo translate('manage_roles') ?></h5>
                                @can('roles.add')
                                    <div class="ibox-tools">
                                        <a href="{{ route('roleAdd') }}" class="btn btn-sm btn-cherryhan pt-2 chfw-5"><i class="fa fa-plus-circle"></i> <?php echo translate('add_new') ?></a>
                                    </div>
                                @endcan
                            </div>
                            <div class="ibox-content">
                                <!-- table -->
                                <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" role="grid" aria-describedby="dataTable_info">
                                    <thead>
                                    <tr>
                                        <th class="text-right" width="10"><?php echo translate('id'); ?></th>
                                        <th><?php echo translate('name'); ?></th>
                                        <th><?php echo translate('title'); ?></th>
                                        <th class="w-50"><?php echo translate('permission'); ?></th>
                                        <th width ="35"><?php echo translate('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->title }}</td>
                                        <td>
                                            @foreach($role->permissions as $permission)
                                                <span class="badge badge-primary">{{ $permission->name }} </span>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            
                                                <div class="btn-group">
                                                    @can('roles.edit')
                                                        <a href="{{ route('roleEdit',$role->id) }}" type="button" class="btn btn-info btn-sm"> <?php echo translate('edit') ?></a>
                                                    @endcan
                                                    @can('roles.delete')
                                                        @if($role->id != auth()->user()->roles[0]->id)
                                                        <form action="{{ route('roleDestroy',$role->id) }}" method="post">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('<?php echo translate('are_you_sure?') ?>')) { this.form.submit() } "> <?php echo translate('delete') ?></button>
                                                        </form>
                                                        @endif
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

            @endsection
