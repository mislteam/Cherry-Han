            @extends('layouts.admin')

            @section('content')
        
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Category List </h5>
                                @can('category.add')
                                    <div class="ibox-tools">
                                        <a href="{{ route('categoryAdd') }}" class="btn btn-sm btn-cherryhan pt-2 chfw-5"><i class="fa fa-plus-circle"></i> @lang('global.add') New</a>
                                    </div>
                                @endcan
                            </div>
                            <div class="ibox-content">
                                <!-- table -->
                                <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" role="grid" aria-describedby="dataTable_info">
                                    <thead>
                                    <tr>
                                        <th>@lang('cruds.category.fields.id')</th>
                                        <th>@lang('cruds.category.fields.name')</th>
                                        <th>@lang('cruds.category.fields.image')</th>
                                        <th>@lang('cruds.category.fields.status')</th>
                                        <th class="w-25">@lang('global.actions')</th>
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
                                            <td>{{ $row->image }}</td>
                                            <td class="{{ $row->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($row->status) }}</td>
                                            <td class="text-center">
                                                @can('category.delete')
                                                <form action="{{ route('categoryDestroy',$row->id) }}" method="post">
                                                    @csrf
                                                    <div class="btn-group">
                                                        @can('roles.edit')
                                                            <a href="{{ route('categoryEdit',$row->id) }}" type="button" class="btn btn-info btn-sm"> @lang('global.edit')</a>
                                                        @endcan
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure?')) { this.form.submit() } "> @lang('global.delete')</button>
                                                    </div>
                                                </form>
                                                @endcan
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
