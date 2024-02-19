@extends('layouts.admin')

@section('content')
        <!-- Main content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('api_user_list'); ?></h5>
                            <!-- @can('carowner.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('apiuserAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
                                </div>
                            @endcan -->
                        </div>
                        <div class="ibox-content">
                            <?php $segment1 = Request::segment(1); ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-{{$segment1}}" >
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo translate('id') ?></th>
                                            <th>Username</th>
		                                    <th>Password</th>
		                                    <th>Valid period</th>
		                                    <th>Created by</th>
		                                    <th>Tokens</th>
		                                    <th>Activate</th>
                                            <th class="text-center"><?php echo translate('action') ?></th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($users as $user)
                                    <tr class="text-center">
                                        <td class="text-right">{{ $count }}</td>
                                        <td>
                                            @can('passport.view')<i class="fa fa-eye" onmousedown="showPassword({{ $user->id }})" onmouseup="hidePassword({{ $user->id }})"></i>@endcan
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            <span style="display: block" id="hidden_{{ $user->id }}">*****</span>
                                            @can('password.view')<span style="display: none" id="password_{{ $user->id }}">{{ $user->password }}</span>@endcan
                                        </td>
                                        <td>{{ $user->token_valid_period }}</td>
                                        <td>{{ $user->creator->name ?? '-' }}</td>
                                        <td>{{ $user->tokens->count() ?? 0 }}</td>
                                        <td class="text-center">
                                            <i style="cursor: pointer" id="api_user_{{ $user->id }}" class="fa {{ ($user->is_active) ? 'fa-check-circle text-success':'fa-times-circle text-danger' }}"
                                               @can("customer.edit") onclick="toggle_api_user({{ $user->id }})" @endcan ></i>
                                        </td>
                                        <td class="text-center">
                                            
                                                <div class="btn-group">
                                                    @can('customer.show')
                                                        <a href="{{ route('apiuserShow',$user->id) }}" type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                    @endcan
                                                    @can('customer.edit')
                                                    <a href="{{ route('apiuserEdit',$user->id) }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-pen"></i></a>
                                                    @endcan
                                                    @can('customer.delete')
                                                        <form action="{{ route('apiuserDestroy',$user->id) }}" method="post">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm(translate('are_you_sure?'))) { this.form.submit() } "><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            
                                        </td>
                                    </tr>
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
