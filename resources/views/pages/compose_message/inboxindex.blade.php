        @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('inbox_message'); ?></h5>
                            {{--@can('message.add')
	                            <div class="ibox-tools">
	                                <a href="{{ route('messageAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
	                            </div>
                            @endcan--}}
                        </div>
                        <div class="ibox-content">
                            <?php $segment1 = Request::segment(1); ?>
                            <div class="table-responsive">
                                <!-- <table class="table table-striped table-bordered table-hover dataTables-{{$segment1}}" > -->
                                <table class="table">
                                    <thead>
                                        <tr>
		                                    <th class="text-center"><?php echo translate('id') ?></th>
                                             <th class="text-center"><?php echo translate('customer_name') ?></th>
		                                   
		                                    <th class="text-center"><?php echo translate('subject') ?></th>
		                                    <th class="text-center"><?php echo translate('desctiption') ?></th>
                                            <th class="text-center"><?php echo translate('date') ?></th>
		                                   		                                  
		                                </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $message)
                                        <tr>
                                            <td class="text-center">{{ $count }}</td>
                                            
                                            <td class="text-center">{{ $message->apiuserto->name }}</td>
                                            <td class="text-center">{{ $message->subject }}</td>
                                            <td class="text-center">{!! $message->description !!}</td>                                         
                                            <td class="text-center">{{ $message->created_at }}</td>                                         
                                         
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