@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?php echo translate('delivery_message_list'); ?></h5>
                    @can('car.add')
                        {{--<div class="ibox-tools">
                            <a href="{{ route('languageAdd') }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
                        </div>--}}
                    @endcan
                </div>
                <div class="ibox-content">
                    <?php $segment1 = Request::segment(1);
                          $segment = Request::segment(4);
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-{{$segment1}}" >
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo translate('id') ?></th>
                                   
                                    <th class="text-center"><?php echo translate('word') ?></th>
                                    <th class="text-center"><?php echo translate('english') ?></th>
                                    <th class="text-center"><?php echo translate('myanmar') ?></th>
                                    
                                    <th class="text-center"><?php echo translate('action') ?></th>

                                   
                                </tr>
                            </thead>
                            <tbody>

                            @php
                            $count = 1;
                            @endphp
                            @foreach($lists as $language)
                                <tr>
                                    <td class="text-right">{{ $count }}</td>
                                    
                                    <td>{{ $language->word }}</td>
                                    <td>{{ $language->english }}</td>
                                    <td>{{ $language->myanmar }}</td>
                                    
                                    <td class="text-center">

                                            <div class="btn-group">
                                               
                                                @can('language.edit')
                                                    {{--<a href="{{route('languageEdit',$language->word_id )}}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>--}}

                                                    <a href="{{URL('/language/edit/'.$language->word_id.'/'.'message')}}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>

                                                @endcan
                                                <!-- <input name="_method" type="hidden" value="DELETE">
                                                <button type="button" class="btn btn-danger btn-sm pt-2" onclick="if (confirm('<?php echo translate('are_you_sure?') ?>')) { this.form.submit() } "> <?php echo translate('delete') ?></button> -->
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