@extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('airline_price_list'); ?></h5>
                            @can('airline-price.add')
	                            <div class="ibox-tools">
	                                <a href="{{ route('airlinepricelistAdd', $airline_id) }}" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-plus-circle"></i> <?php echo translate('add_new'); ?></a>
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
		                                    <th class="text-center"><?php echo translate('airline_name') ?></th>
                                            <!-- <th class="text-center"><?php //echo translate('airline_code') ?></th> -->
                                            <th class="text-center"><?php echo translate('package_name') ?></th>
                                            <th class="text-center"><?php echo translate('price') ?></th>
                                            <th class="text-center"><?php echo translate('refund') ?></th>
		                                    <th class="text-center"><?php echo translate('status') ?></th>
		                                    <th class="text-center"><?php echo translate('action') ?></th>
		                                </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($pricing_list as $row)
                                    <?php
                                    // $text = str_replace(['&lt;', '&gt;'], ['<', '>'], $row->refund_description);
                                    // var_dump( $text);
                                    $text = ($row->refund_description);
                                    ?>
                                        <tr>
                                            <td class="text-right">{{ $count }}</td>
                                            <td>{{ $row->airline->name }}</td>
                                            <td>{{ $row->package_name }}</td>
                                            <td>MMK: {{ number_format($row->price) }} <br> USD: {{number_format($row->usprice, 2) }}</td>
                                            <td><span data-html="true" data-tool="tooltip"  data-placement="left" data-title="<?=$text?>">{{ ($row->isRefund== 'yes')?'Refundable':"Non Refundable"}}</span></td>
                                            <td class="{{ $row->status == 'active'? 'text-success': 'text-danger' }}">{{ ucwords($row->status) }}</td>
                                            <td class="text-center">
                                                    <div class="btn-group">
                                                        @can('airline-price.edit')
                                                            <a href="{{ route('airlinepricelistEdit', $row->id) }}" type="button" class="btn btn-info btn-sm pt-2"> <?php echo translate('edit') ?></a>
                                                        @endcan
                                                        @can('airline-price.delete')
                                                            <form action="{{ route('airlinepricelistDestroy', $row->id) }}" method="post">
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
