@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?php echo translate('tour_destination_place_list'); ?></h5>
                    @can('car.add')
                        <div class="ibox-tools">
                            <a href="{{ route('tourdestinationplaceAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                    <th class="text-center"><?php echo translate('tour_destination') ?></th>
                                    <th class="text-center"><?php echo translate('tour_destination_place') ?></th>
                                    
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

                                    <td><img class="img img-responsive img-width" src="{{ asset('feature/tourdestinationplace/'.$row->feature_photo) }}" alt=""></td>
                                    
                                    <td>{{ $row->tourdestination->name }}</td>
                                    <td>{{ $row->name }}</td>
                                   {{-- <td>{{ $row->description }}</td>--}}
                                    
                                    <td class="text-center">
                                        
                                            <div class="btn-group">
                                               
                                                @can('tourdestinationplace.edit')
                                                    <a href="{{ route('tourdestinationplaceEdit',$row->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                @endcan
                                                @can('tourdestinationplace.delete')
                                                    <form action="{{ route('tourdestinationplaceDestroy', $row->id) }}" method="post">
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