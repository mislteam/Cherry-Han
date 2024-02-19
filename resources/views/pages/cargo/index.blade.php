@extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('cars_cargo_service_list'); ?></h5>
                            @can('container.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('cargoAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                            <th class="text-center"><?php echo translate('feature_photo') ?></th>
                                            <th class="text-center"><?php echo translate('name') ?></th>
                                            <th class="text-center"><?php echo translate('car_type') ?></th>
                                            <th class="text-center"><?php echo translate('capacity') ?></th>
                                            <th class="text-center"><?php echo translate('owners_name') ?></th>
                                            <th class="text-center"><?php echo translate('status') ?></th>
                                            <th class="text-center"><?php echo translate('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    
                                    @endphp
                                    @foreach($lists as $cargo)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            <td><img class="img img-responsive img-width" src="{{ asset('feature/cargo/'.$cargo->feature_photo) }}" alt=""></td>
                                            <td>{{ $cargo->name }}</td>
                                            <td>{{ $cargo->cartype->name }}</td>
                                            <td>{{ $cargo->capacity }}</td>
                                            <td>{{ $cargo->owner->name }}</td>
                                            <td class="{{ $cargo->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($cargo->status) }}</td>
                                            <td class="text-center">
                                                
                                                    <div class="btn-group">
                                                        @can('cargo.show')
                                                            <a href="{{ route('cargoView', $cargo->id) }}" type="button" class="btn btn-primary btn-sm"> <?php echo translate('view_detail'); ?> </a>
                                                        @endcan
                                                        @can('cargo.edit')
                                                            <a href="{{ route('cargoEdit',$cargo->id) }}" type="button" class="btn btn-info btn-sm"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('cargo.delete')
                                                        <form action="{{ route('cargoDestroy', $cargo->id) }}" method="post">
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
        @endsection