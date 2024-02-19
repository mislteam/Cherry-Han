@extends('layouts.admin')
@section('content')
        <!-- Main content -->
           
        
            <div class="row" >
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                           
                                   
                            <h5><?php echo translate('point_setting_list'); ?></h5>
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
                                            <th><?php echo translate('user_name') ?></th>
                                            <!-- <th><?php echo translate('coin_type') ?></th> -->
                                            <th><?php echo translate('total_point') ?></th>
                                            <th><?php echo translate('use_point') ?></th>
                                            <th><?php echo translate('existing_point') ?></th>
                                            <!-- <th class="text-center"><?php echo translate('action') ?></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @php
                                            $count = 1;
                                        @endphp

                                       
                                       @foreach($lists as $row)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{$row->apiuser->name}}</td>
                                                
                                                <td>{{$row->total}}</td>
                                               
                                                <td>{{ $row->usepoint }}</td> 
                                                <td>{{ $row->total-$row->usepoint }}</td> 
                                                <?php 
                                                    if($row->total >= 10){
                                                        
                                                    }
                                                ?>
                                        
                                                {{--<td class="text-center">
                                                   
                                                        <div class="btn-group">
                                                            @can('point_setting.edit')
                                                                <a href="{{ route('busdestinationEdit',$row->id) }}" type="button" class="btn btn-info btn-sm"> <?php echo translate('edit') ?></a>
                                                            @endcan
                                                            @can('point_setting.delete')
                                                                <form action="{{ route('busdestinationDestroy',$row->id) }}" method="post">
                                                                    @csrf
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('are_you_sure?')) { this.form.submit() } "> <?php echo translate('delete') ?></button>
                                                                </form>
                                                            @endcan
                                                        </div>
                                                    
                                                </td>--}}
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
