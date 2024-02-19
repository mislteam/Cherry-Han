@extends('layouts.admin')

@section('content')
        <!-- Main content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('car_driver_list'); ?></h5>
                            @can('carbrand.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('cardriverAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                            <th class="text-center"><?php echo translate('name') ?></th>
                                            <th class="text-center"><?php echo translate('phone') ?></th>
                                            <th class="text-center"><?php echo translate('email') ?></th>
                                            <th class="text-center"><?php echo translate('language') ?></th>
                                            <th class="text-center"><?php echo translate('address') ?></th>
                                            <!-- <th class="text-center"><?php //echo translate('country') ?></th>
                                            <th class="text-center"><?php //echo translate('city') ?></th> -->
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
                                            
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td><?php 
                                            
                                               $language =(array) json_decode($row->language, true);
                                                $c=count($language);
                                                
                                                if($c==1)
                                                {
                                                  echo $language[0];
                                                }else{
                                                 for($i=1;$i<$c;$i++){
                                                     echo $language[0].",".$language[$i];
                                                   }
                                                }
                                                
                                                ?>
           
                                            </td>
                                            
                                            <td>{{ $row->address.', '.$row->city->name.', '.$row->state->name.', '.$row->country->name }}</td>
                                            <!-- <td>{{ $row->country->name }}</td>
                                            <td>{{ $row->city->name }}</td> -->
                                            
                                            <td class="text-center">
                                                
                                                    <div class="btn-group">
                                                      
                                                        @can('cardriver.edit')
                                                            <a href="{{ route('cardriverEdit',$row->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('cardriver.delete')
                                                            <form action="{{ route('cardriverDestroy', $row->id) }}" method="post">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button type="button" class="btn btn-danger btn-sm pt-2" onclick="if (confirm('<?php echo translate('are_you_sure?') ?>')) { this.form.submit() } "> <?php echo translate('delete') ?></button>
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
