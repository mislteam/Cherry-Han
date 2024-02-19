@extends('layouts.admin')

@section('content')
        <!-- Main content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('agents_list'); ?></h5>
                            @can('agent.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('agentAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                            <th><?php echo translate('agent_name') ?></th>
                                            <th><?php echo translate('agent_phone') ?></th>
                                            <th><?php echo translate('agent_email') ?></th>
                                            <th><?php echo translate('agent_address') ?></th> 
                                            <th><?php echo translate('created_by') ?></th>
                                            <th><?php echo translate('status') ?></th>
                                            @can('point-setting.edit')
                                            <th><?php echo translate('point') ?></th>@endcan
                                            @canany(['agent.edit','agent.delete','agent.show'])
                                            <th class="text-center"><?php echo translate('action') ?></th>@endcanany
                                        </tr>

                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($users as $user)
                                    <tr class="text-center">
                                        <td class="text-right">{{ $count }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{ $user->creator->name ?? '-' }}</td>
                                        <td class="text-center">
                                            <i style="cursor: pointer" id="api_user_{{ $user->id }}" class="fa {{ ($user->is_active) ? 'fa-check-circle text-info':'fa-times-circle text-danger' }}"
                                               @can("customer.edit") onclick="toggle_api_user({{ $user->id }})" @endcan ></i>
                                        </td>
                                            @can('point-setting.edit')
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pointModal{{$user->id}}">
                                              Point
                                            </button>

                                            <!-- The Modal -->
                                            <div class="modal" id="pointModal{{$user->id}}">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                        
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Point Manual</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                        
                                                    <!-- Modal body -->
                                                   <form action="{{route('customerpoint',$user->id)}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                        
                                                        <div class="form-group row {{ $errors->has('coin_id') ? 'has-error':'' }}">
                                                            <label class="col-md-3 col-form-label"><?php echo translate('coin_id')?> *</label>
                                                            <div class="col-md-9">
                                                                <select  name="coin_id"  class="form-control " required><!-- id="coin_id" -->
                                                                    <option value="">Select...</option>
                                                                @foreach($generalsetting as $general)
                                                                    <option value="{{ $general->id }}">{{ $general->name }}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                        
                                                        <div class="form-group row {{ $errors->has('collected_point') ? 'has-error':'' }}">
                                                            <label class="col-md-3 col-form-label"><?php echo translate('collected_point')?> *</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="collected_point" class="form-control" required><!-- id="value"  -->
                                                                @if($errors->has('collected_point') || 1)
                                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('collected_point') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group row {{ $errors->has('coin_des') ? 'has-error':'' }}">
                                                            <label class="col-md-3 col-form-label"><?php echo translate('description')?> *</label>
                                                            <div class="col-md-9">
                                                                <textarea name="coin_des" id="coin_des" class="form-control" required></textarea>
                                                                
                                                                @if($errors->has('coin_des') || 1)
                                                                    <span class="form-text m-b-none text-danger">{{ $errors->first('coin_des') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                        
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                      <button type="submit" class="btn btn-cherryhan">Save</button>
                                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                                  
                                        
                                                  </div>
                                                </div>
                                            </div>
                                        </td>@endcan
                                        <td class="text-center">
                                            
                                                <div class="btn-group">
                                                    @can('agent.show')
                                                        <a href="{{ route('agentShow',$user->id) }}" type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                    @endcan
                                                    <!--@can('agent.edit')-->
                                                    <!--<a href="{{ route('apiuserEdit',$user->id) }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-pen"></i></a>-->
                                                    <!--@endcan-->
                                                    @can('agent.delete')
                                                        <form action="{{ route('apiuserDestroy',$user->id) }}" method="post">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><i class="fa fa-trash"></i></button>
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
        <!-- /.content -->
@endsection
