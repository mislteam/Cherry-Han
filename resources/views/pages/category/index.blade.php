            @extends('layouts.admin')

            @section('content')
        
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Service List</h5>
                            </div>
                            <div class="ibox-content">
                                <!-- table -->
                                <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" role="grid" aria-describedby="dataTable_info">
                                    <thead>
                                    <tr>
                                        <th><?php  echo translate('id'); ?></th>
                                        <th><?php  echo translate('service_name'); ?></th>
                                        <th><?php  echo translate('service_type'); ?></th>
                                        <th class="w-25"><?php  echo translate('action'); ?></th>
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
                                            <td>{{ ucwords(str_replace('_', ' ', $row->type)) }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    @can('roles.edit')
                                                        <a href="{{ route('categoryEdit',$row->id) }}" type="button" class="btn btn-info btn-sm"> @lang('global.edit')</a>
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
                                <!-- table end-->
                            </div>
                        </div>
                    </div>
                </div> 

            @endsection
