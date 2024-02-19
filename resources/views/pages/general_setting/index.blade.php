@extends('layouts.admin')
@section('content')
        <!-- Main content -->
           
        
            <div class="row" >
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('general_setting_list'); ?></h5>
                            {{--@can('point_setting.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('pointsettingAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                            <th><?php echo translate('name') ?></th>
                                            <th><?php echo translate('value') ?></th>
                                            <th><?php echo translate('status') ?></th>
                                            <th class="text-center"><?php echo translate('action') ?></th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach($lists as $row)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>
                                                     @if($row->unit=="logo")
                                                        <img src="{{ asset('feature/company/'.$row->value) }}" alt="" width="200">
                                                    @else
                                                        {{ $row->value }}
                                                    @endif    
                                                </td>
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="car_status" class="onoffswitch-checkbox" change-point-status="{{$row->status}}-{{$row->id}}"  id="point{{$row->id}}" <?php if ($row->status==1){echo "checked";}else{ echo "";} ?>
                                                                
                                                            >
                                                            <label class="onoffswitch-label" for="point{{$row->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                        
                                                <td class="text-center">
                                                   
                                                        <div class="btn-group">
                                                            @can('general_setting.edit')
                                                                <a href="{{ route('generalsettingEdit',$row->id) }}" type="button" class="btn btn-info btn-sm"> <?php echo translate('edit') ?></a>
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
