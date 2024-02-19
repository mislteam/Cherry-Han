@extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('cars_model_list'); ?></h5>
                            @can('car-model.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('carmodelAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                            <th class="text-center"><?php echo translate('car_model_name') ?></th>
                                            <th class="text-center"><?php echo translate('car_brand_name') ?></th>
                                            <th class="text-center"><?php echo translate('seo_title') ?></th>
                                            <th class="text-center"><?php echo translate('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    
                                    @endphp
                                    @foreach($lists as $carmodel)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            <td>{{ $carmodel->name }}</td>
                                            <td>{{ $carmodel->brand->name }}</td>
                                            <td>{{ $carmodel->seo_title }}</td>
                                            <!-- <td class="{{ $carmodel->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($carmodel->status) }}</td> -->
                                            <td class="text-center">
                                                
                                                    <div class="btn-group">
                                                        @can('car-model.edit')
                                                            <a href="{{ route('carmodelEdit',$carmodel->id) }}" type="button" class="btn btn-info btn-sm"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('car-model.delete')
                                                            <form action="{{ route('carmodelDestroy', $carmodel->id) }}" method="post">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm(<?php echo translate('are_you_sure_?') ?>)) { this.form.submit() } "> <?php echo translate('delete') ?></button>
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
        @endsection
