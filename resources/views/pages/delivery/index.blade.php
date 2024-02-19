@extends('layouts.admin')

@section('content')
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
                                            <th class="text-center"><?php echo translate('sender_name') ?></th>
                                            <th class="text-center"><?php echo translate('sender_phone') ?></th>
                                            <th class="text-center"><?php echo translate('receiver_name') ?></th>
                                            <th class="text-center"><?php echo translate('receiver_phone') ?></th>
                                            <th class="text-center"><?php echo translate('pickup_township') ?></th>
                                            <th class="text-center"><?php echo translate('delivery_township') ?></th>
                                            <th class="text-center"><?php echo translate('weight') ?></th>
                                            <th class="text-center"><?php echo translate('delivery_charges') ?></th>
                                            <th class="text-center"><?php echo translate('address') ?></th>
                                            <th class="text-center"><?php echo translate('note') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $row)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            
                                            <td>{{ $row->sender_name }}</td>
                                            <td>{{ $row->sender_phone }}</td>
                                            <td>{{ $row->receiver_name }}</td>
                                            <td>{{ $row->receiver_phone }}</td>
                                            <td>{{ $row->pickuptownship->name }}</td>
                                            <td>{{ $row->delivery_township }}</td>
                                            <td>{{ $row->weight }}</td>
                                            <td>{{ $row->deli_charges }}</td>
                                            <td>{{ $row->detail_address }}</td>
                                            <td>{{ $row->note }}</td>
                                            
                                            
                                            {{--<td class="text-center">
                                                
                                                    <div class="btn-group">
                                                      
                                                        @can('delivery.edit')
                                                            <a href="{{ route('deliveriesEdit',$row->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('delivery.delete')
                                                            <form action="{{ route('deliveriesDestroy', $row->id) }}" method="post">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button type="button" class="btn btn-danger btn-sm pt-2" onclick="if (confirm('<?php echo translate('are_you_sure?') ?>')) { this.form.submit() } "> <?php echo translate('delete') ?></button>
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
