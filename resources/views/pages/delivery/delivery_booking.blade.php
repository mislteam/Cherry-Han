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
                            <h5><?php echo translate('delivery_service'); ?></h5>
                            {{--@can('delivery.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('deliveriesAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
                                </div>
                            @endcan--}}
                        </div>
                        <div class="ibox-content">
                            <?php $segment1 = Request::segment(1); ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-{{$segment1}}" >
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo translate('id') ?></th>
                                            <th class="text-center"><?php echo translate('sender_name') ?> / <?php echo translate('sender_phone') ?></th>
                                            
                                            <th class="text-center"><?php echo translate('receiver_name') ?> / <?php echo translate('receiver_phone') ?></th>
                                           
                                            <th class="text-center"><?php echo translate('pickup_township') ?></th>
                                            <th class="text-center"><?php echo translate('delivery_township') ?> / <?php echo translate('address') ?></th>
                                            <th class="text-center"><?php echo translate('weight') ?></th>
                                            <th class="text-center"><?php echo translate('delivery_charges') ?></th>
                                            
                                            <th class="text-center"><?php echo translate('note') ?></th>
                                            <!-- <th class="text-center"><?php echo translate('message') ?></th> -->
                                            <th class="text-center"><?php echo translate('status') ?></th>
                                             <th class="text-center"><?php echo translate('point') ?></th>
                                            <th class="text-center"><?php echo translate('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $row)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            
                                            <td>{{ $row->sender_name }} / {{ $row->sender_phone }}</td>
                                            
                                            <td>{{ $row->receiver_name }} / {{ $row->receiver_phone }}</td>
                                            
                                            <td>{{ $row->pickuptownship->name }}</td>
                                            <td>{{ $row->deliverytownship->name }} / {{ $row->detail_address }}</td>
                                            <td>{{ $row->weight }}</td>
                                            <td>{{ $row->del_charges }}</td>

                                            <td>{{ $row->note }}</td>
                                           
                                            <td>
                                                <div class="dropdown">
                                                  <button class="btn btn-cherryhan dropdown-toggle" type="button" data-toggle="dropdown">{{ucwords($row->status)}}
                                                  </button>
                                                  <ul class="dropdown-menu">
                                                    
                                                    <?php 
                                                    $status=delivery_status();

                                                    $ind=count($status);
    
        
                                                    $info=json_decode($row->status_info,true); 
                                                    unset($status[4]);
                                                    if(in_array('shipping', $info)){
                                                        $status[$ind]='completed';
                                                        unset($status[5]);
                                                        //print_r($status); 
                                                    }
   
                                                    ?>
                                                    @foreach($status as $key=>$s)
                                                   
                                                    <?php 
                                                    if(!in_array($s,$info)){
                                                        /*if(in_array('shipping',$info)){*/
                                                        ?>
                                                    <li><a href="{{URL('/delivery-booking/'.$row->id.'/'.$s)}}" class="btn btn-cherryhan">{{ ucwords($s) }}</a></li>

                                                    <?php  } ?>
                                                    @endforeach

                                                   
                                                    
                                                  </ul>
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <div class="dropdown">
                                                  <button class="btn btn-cherryhan dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                  </button>
                                                  <ul class="dropdown-menu">
                                                     
                                                    <li><a class="btn btn-cherryhan" data-toggle="modal" data-target="#pointModal{{$row->id}}">Point</a>  
                                                    </li>  
                                                    
                                                    
                                                  </ul>
                                                </div>
                                                <div class="modal" id="pointModal{{$row->id}}">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                            
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                          <h4 class="modal-title">Point </h4>
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                            
                                                        <!-- Modal body -->
                                                       <form action="{{route('deliverypoint',$row->user_id)}}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="user_id" value="{{$row->user_id}}">
                                            
                                                            <div class="form-group row {{ $errors->has('coin_id') ? 'has-error':'' }}">
                                                                <label class="col-md-3 col-form-label"><?php echo translate('coin_id')?></label>
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
                                                                <label class="col-md-3 col-form-label"><?php echo translate('collected_point')?></label>
                                                                <div class="col-md-9">
                                                                    <input type="text" name="collected_point"  class="form-control" required><!-- id="value"-->
                                                                    @if($errors->has('collected_point') || 1)
                                                                        <span class="form-text m-b-none text-danger">{{ $errors->first('collected_point') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row {{ $errors->has('coin_des') ? 'has-error':'' }}">
                                                                <label class="col-md-3 col-form-label"><?php echo translate('description')?></label>
                                                                <div class="col-md-9">
                                                                    <textarea name="coin_des" id="coin_des" class="form-control"></textarea>
                                                                    
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
                                            
                                            <td class="text-center">
                                               
                                                    <div class="btn-group">
                                                      @can('deliverybooking.show')
                                                            <a href="{{ route('deliverybookingView',$row->id) }}" type="button" class="btn btn-primary btn-sm pt-2"> <?php echo translate('view_detail') ?></a>
                                                        @endcan
                                                        @can('deliverybooking.edit')
                                                            <a href="{{ route('deliverybookingEdit',$row->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        {{--<input name="_method" type="hidden" value="DELETE">
                                                        <button type="button" class="btn btn-danger btn-sm pt-2" onclick="if (confirm('<?php echo translate('are_you_sure?') ?>')) { this.form.submit() } "> <?php echo translate('delete') ?></button>--}}
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
<!-- 
<script src="{{ asset('misl/back/js/jquery.min.js') }}"></script>

<script type="text/javascript">
     function delivery_status(id,status){
        alert(status);
            $.ajax({
                url: "/delivery-booking/"+id+"/"+status,
                type: "get",
                dataType: "json",
                success: function(result){
                   
                    if (result.status == 'collected'){
                        $("#d_status"+id).val('collected');
                        //window.location = "/delivery-booking/delivery-service";
                        //location.reload();
                    }
                  
                },
                error: function (errorMessage){
                    console.log(errorMessage)
                }
            });
        }
</script> -->


