

    @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('all_services_order_list'); ?></h5>
                        </div>
                        <div class="ibox-content">
                            <?php $segment1 = Request::segment(1); ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-{{$segment1}}" >
                                    <thead>
                                        <tr>
	                                        <th>#</th>
	                                        <th><?php echo translate('dash_orders_status') ?></th>
	                                        <th><?php echo translate('order_id') ?></th>
	                                        <th><?php echo translate('order_description') ?></th>
	                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    	$count = 1;
                                    @endphp
	                                    <tr>
	                                        <td>1</td>
	                                        <td><?php echo translate('order_new') ?></td>
	                                        <td>1035</td>
	                                        <td>Delivery Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>2</td>
	                                        <td><?php echo translate('order_completed') ?></td>
	                                        <td>1034</td>
	                                        <td>Tour Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>3</td>
	                                        <td><?php echo translate('order_pending') ?></td>
	                                        <td>1033</td>
	                                        <td>Car Rental Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>4</td>
	                                        <td><?php echo translate('order_cancel') ?></td>
	                                        <td>1032</td>
	                                        <td>Car Rental Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>5</td>
	                                        <td><?php echo translate('order_completed') ?></td>
	                                        <td>1031</td>
	                                        <td>Tour Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>6</td>
	                                        <td><?php echo translate('order_pending') ?></td>
	                                        <td>1030</td>
	                                        <td>Cargo Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>7</td>
	                                        <td><?php echo translate('order_pending') ?></td>
	                                        <td>1029</td>
	                                        <td>Container Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>8</td>
	                                        <td><?php echo translate('order_new') ?></td>
	                                        <td>1028</td>
	                                        <td>Delivery Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>9</td>
	                                        <td><?php echo translate('order_completed') ?></td>
	                                        <td>1027</td>
	                                        <td>Accommodation</td>
	                                    </tr>
	                                    <tr>
	                                        <td>10</td>
	                                        <td><?php echo translate('order_pending') ?></td>
	                                        <td>1026</td>
	                                        <td>Bus Ticket</td>
	                                    </tr>
	                                    <tr>
	                                        <td>11</td>
	                                        <td><?php echo translate('order_cancel') ?></td>
	                                        <td>1025</td>
	                                        <td>Delivery Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>12</td>
	                                        <td><?php echo translate('order_new') ?></td>
	                                        <td>1024</td>
	                                        <td>Delivery Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>13</td>
	                                        <td><?php echo translate('order_completed') ?></td>
	                                        <td>1023</td>
	                                        <td>Car Rental Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>14</td>
	                                        <td><?php echo translate('order_pending') ?></td>
	                                        <td>1022</td>
	                                        <td>Delivery Service</td>
	                                    </tr>
	                                    <tr>
	                                        <td>15</td>
	                                        <td><?php echo translate('order_cancel') ?></td>
	                                        <td>1021</td>
	                                        <td>Cargo</td>
	                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection