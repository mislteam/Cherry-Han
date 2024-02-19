@extends('layouts.admin')
@section('content')
<style type="text/css">
    .dropdown-menu > li > a:hover{
        background-color: #e5399f !important;

    }
</style>
        <!-- Main content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('customer_list'); ?></h5>
                            <!-- @can('customer.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('customerAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                            <th class="text-center"><?php echo translate('customer_name') ?></th>
                                            <th class="text-center"><?php echo translate('customer_phone') ?></th>
                                            <th class="text-center"><?php echo translate('customer_email') ?></th>
                                            <th class="text-center"><?php echo translate('customer_address') ?></th> 
                                            <th class="text-center"><?php echo translate('is_approve') ?></th>
                                            <th class="text-center"><?php echo translate('isAgent') ?></th>
                                            <th class="text-center"><?php echo translate('status') ?></th>
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
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->address}}</td>
                                        {{--<td>{{ $user->creator->name ?? '-' }}</td>--}}
                                        <td>
                                            <?php 
                                            if($user->is_active==0){
                                                echo "<p id='approve_$user->id' class='text-danger'>need to approve</p>";
                                            }if($user->is_active==1){
                                              echo "<p>Approved</p>";
                                            }
                                             if($user->is_active==2){
                                              echo "<p>Bunned</p>";
                                            }
                                            ?>

                                        </td>
                                        
                                        {{--<td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$user->id}}">
                                              isAgent
                                            </button>

                                            <!-- The Modal -->
                                            <div class="modal" id="myModal{{$user->id}}">
                                              <div class="modal-dialog">
                                                <div class="modal-content">

                                                  <!-- Modal Header -->
                                                  <div class="modal-header">
                                                    <h4 class="modal-title">Agent Request</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  </div>

                                                  <!-- Modal body -->
                                                  <form action="{{route('customertoagent',$user->id)}}" method="post">
                                                    @csrf
                                                  <div class="modal-body">
    
                                                        <div class="form-group">
                                                            <table class="table">
                                                                <h4>Shop Info</h4>
                                                                <thead>
                                                                    <tr>
                                                                        <th><span class="text-right text-muted text-small">Label Name *</span></th>
                                                                        <th><span class="text-right text-muted text-small">Label Value *</span></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="agent-setdata">
                                                                    <tr>
                                                                        <td class="col-lg-5">
                                                                            <input class="form-control" name="label_name[]" value="" type="text" placeholder="Label name" required>
                                                                        </td>
                                                                        <td class="col-lg-5">
                                                                            <input class="form-control" name="label_value[]" value="" type="text" placeholder="Value" required>
                                                                        </td>
                                                                        <td class="col-lg-2">
                                                                            <span class=" btn btn-cherryhan fa fa-trash-o text-danger" misl-add-removes></span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="col-lg-12">
                                                                <div class="text-center">
                                                                    <div class="btn btn-cherryhan" style="margin-top: 10px">
                                                                        <span class="pvb_ddn-text" add-agent-row="#agent-setdata"><i class="fa fa-plus-circle"></i> Add New </span>
                                                                    </div>
                                                                </div>
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
                                        </td>--}}

                                        <td>
                                            <div class="dropdown">
                                              <button class="btn btn-cherryhan dropdown-toggle" type="button" data-toggle="dropdown">Action
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li><a class="btn btn-cherryhan" data-toggle="modal" data-target="#myModal{{$user->id}}">isAgent</a>
                                                </li> 
                                                <li><a class="btn btn-cherryhan" data-toggle="modal" data-target="#pointModal{{$user->id}}">Point</a>  
                                                </li>  
                                                
                                                
                                              </ul>
                                            </div>
    
                                                <div class="modal" id="myModal{{$user->id}}">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content">
                                            
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                              <h4 class="modal-title">Agent Request</h4>
                                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                            
                                                            <!-- Modal body -->
                                                            <form action="{{route('customertoagent',$user->id)}}" method="post">
                                                              @csrf
                                                            <div class="modal-body">
                                            
                                                                  <div class="form-group">
                                                                      <table class="table">
                                                                          <h4>Shop Info</h4>
                                                                          <thead>
                                                                              <tr>
                                                                                  <th><span class="text-right text-muted text-small">Label Name *</span></th>
                                                                                  <th><span class="text-right text-muted text-small">Label Value *</span></th>
                                                                                  <th></th>
                                                                              </tr>
                                                                          </thead>
                                                                          <tbody id="agent-setdata">
                                                                              <tr>
                                                                                  <td class="col-lg-5">
                                                                                      <input class="form-control" name="label_name[]" value="" type="text" placeholder="Label name" required>
                                                                                  </td>
                                                                                  <td class="col-lg-5">
                                                                                      <input class="form-control" name="label_value[]" value="" type="text" placeholder="Value" required>
                                                                                  </td>
                                                                                  <td class="col-lg-2">
                                                                                      <span class=" btn btn-cherryhan fa fa-trash-o text-danger" misl-add-removes></span>
                                                                                  </td>
                                                                              </tr>
                                                                          </tbody>
                                                                      </table>
                                                                      <div class="col-lg-12">
                                                                          <div class="text-center">
                                                                              <div class="btn btn-cherryhan" style="margin-top: 10px">
                                                                                  <span class="pvb_ddn-text" add-agent-row="#agent-setdata"><i class="fa fa-plus-circle"></i> Add New </span>
                                                                              </div>
                                                                          </div>
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
                                                <div class="modal" id="pointModal{{$user->id}}">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                            
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                          <h4 class="modal-title">Point </h4>
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                            
                                                        <!-- Modal body -->
                                                       <form action="{{route('customerpoint',$user->id)}}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                            
                                                            <div class="form-group row {{ $errors->has('coin_id') ? 'has-error':'' }}">
                                                                <label class="col-md-3 col-form-label"><?php echo translate('coin_id')?> *</label>
                                                                <div class="col-md-9">
                                                                    <select  name="coin_id"  class="form-control" required><!-- id="coin_id" -->
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
                                                                    <input type="text" name="collected_point"  class="form-control" required><!-- id="value"-->
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
                                            </td>


                                     
                                        <td class="text-center status{{$user->id}}">
                                            <i style="cursor: pointer" id="api_user_{{ $user->id }}" class="fa <?php if($user->is_active==0){ echo "fa-times-circle text-danger"; } elseif($user->is_active==1){echo "fa-check-circle text-info";}
                                            else{echo "fa-ban text-danger";}?>"
                                               @can("customer.edit") onclick="toggle_api_user({{ $user->id }},{{$user->is_active}})" @endcan ></i>
                                        </td>
                                        <td class="text-center">
                                            
                                                <div class="btn-group">
                                                    @can('customer.show')
                                                        <a href="{{ route('apiuserShow',$user->id) }}" type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                    @endcan
                                                    @can('customer.edit')
                                                    <a href="{{ route('customerEdit',$user->id) }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
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

<script src="{{ asset('misl/back/js/jquery.min.js') }}"></script>
  <script type="text/javascript">

        function toggle_api_user(id,is_active){
            $.ajax({
                url: "/api-user/toggle-status/"+id+"/"+is_active,
                type: "POST",
                //dataType: "json",
                data:{
                     _token: '{{csrf_token()}}',
                     user_id: id,
                     is_active:is_active
                },
                success: function(result){
                   
                    if (result.is_active == 1){
                        $("#api_user_"+id).attr('class',"fa fa-check-circle text-info");
                        window.location = "/customer";
                        //location.reload();
                    }
                    else if (result.is_active == 2){
                        $("#status"+id).html('banned');
                        window.location = "/customer";
                        //location.reload();
                    }
                    else
                    {
                        $("#api_user_"+id).val('class',"fa fa-times-circle text-danger");
                       // window.location = "/customer";  

                    }
                },
                error: function (errorMessage){
                    console.log(errorMessage)
                }
            });
        }

    </script>
