@extends('layouts.admin')

@section('content')
        <!-- Main content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('admin_user_list'); ?></h5>
                            @can('agent.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('userAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                            <th><?php echo translate('user_name') ?></th>
                                            <!-- <th><?php //echo translate('user_phone') ?></th> -->
                                            <th><?php echo translate('user_email') ?></th>
                                            <th><?php echo translate('user_roles') ?></th>
                                            <th><?php echo translate('user_permissions') ?></th> 
                                            <!-- <th><?php //echo translate('created_by') ?></th>
                                            <th><?php //echo translate('status') ?></th> -->
                                            <th class="text-center"><?php echo translate('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 1; ?>
                                        @foreach($users as $user)
                                            <tr>
                                                <td class="text-right">{{ $id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach($user->roles()->pluck('name') as $role)
                                                        <span class="badge badge-cherryhan">{{ $role }} </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($user->getAllPermissions()->pluck('title') as $permission)
                                                        <span class="badge badge-primary">{{ $permission }} </span>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                   
                                                        <div class="btn-group">
                                                            @can('user.edit')
                                                            <a href="{{ route('userEdit', $user->id) }}" type="button" class="btn btn-info btn-sm"> <?php echo translate('edit') ?></a>
                                                            @endcan
                                                            @can('user.delete')
                                                                <form action="{{ route('userDestroy', $user->id) }}" method="post">
                                                                    @csrf
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('are_you_sure?')) { this.form.submit() } "> <?php echo translate('delete') ?></button>
                                                                </form>
                                                            @endcan
                                                        </div>
                                                    
                                                </td>
                                            </tr>
                                            <?php $id++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.content -->
@endsection
