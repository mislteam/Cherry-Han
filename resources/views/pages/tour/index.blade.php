        @extends('layouts.admin')
        @section('content')
            <div class="row">                
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('travels_&_tours_service_list'); ?></h5>
                            @can('tour.add')
                                <div class="ibox-tools">
                                    <a href="{{ route('tourAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
                                            <th class="text-center"><?php echo translate('tour_category') ?></th>
                                            <!-- <th class="text-center"><?php echo translate('tour_destination') ?></th> -->
                                            <th class="text-center"><?php echo translate('status') ?></th>                                           
                                            <th class="text-center"><?php echo translate('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $tour)
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            <td><img class="img img-responsive img-width" src="{{ asset('feature/tour/'.$tour->feature_photo) }}" alt=""></td>
                                            <td>{{ $tour->tour_name }}</td>
                                            <td>{{ $tour->tourcategory->name }}</td>
                                            {{--<td>{{ $tour->tourdestination->name }}</td>--}}
                                            <td class="{{ $tour->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($tour->status) }}</td>
                                            <td class="text-center">
                                                
                                                    <div class="btn-group">
                                                        @can('tour.show')
                                                            <a href="{{ route('tourView', $tour->id) }}" type="button" class="btn btn-primary btn-sm pt-2"> <?php echo translate('view_detail') ?></a>
                                                        @endcan
                                                       
                                                        @can('tour.edit')
                                                            <a href="{{ route('tourEdit',$tour->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('tour.delete')
                                                            <form action="{{ route('tourDestroy', $tour->id) }}" method="post">
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