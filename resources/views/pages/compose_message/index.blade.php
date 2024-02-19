        @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('sent_message'); ?></h5>
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
                                          
                                            <th class="text-center"><?php echo translate('subject') ?></th>
                                           
                                            <th class="text-center"><?php echo translate('action') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($lists as $message)
                                        <tr>
                                            <td class="text-center">{{ $count }}</td>         
                                            
                                            <td class="text-center">{{ $message->subject }}</td>

                                            <td class="text-center"><a href="{{ route('messageView',$message->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('view') ?></a></td>
 
                                            {{--<td class="text-center">
                                                
                                                    <div class="btn-group">
                                                        @can('message.show')
                                                            <a href="{{ route('messageView',$message->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('view') ?></a>
                                                        @endcan
                                                        @can('message.edit')
                                                            <a href="{{ route('messageEdit',$message->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        
                                                        @can('message.delete')
                                                            <form action="{{ route('messageDestroy', $message->id) }}" method="post">
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
        @endsection