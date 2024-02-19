@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5><?php echo translate('delivery_booking_detail'); ?></h5>
                
            </div>
            <div class="ibox-content">
                <?php $segment1 = Request::segment(1); ?>
                <div class="table-responsive">
                    
                        <table class="table">
                        <thead>
                            <tr>
                                <td><?php echo translate('sender_name') ?></td>
                                <td>{{$deliveryservices->sender_name}}</td>
                                
                            </tr>
                            <tr>
                                 <td><?php echo translate('sender_phone') ?></td>
                                 <td>{{$deliveryservices->sender_phone}}</td>
                                 
                            </tr>
                            <tr>
                                 <td><?php echo translate('receiver_name') ?></td>
                                 <td>{{$deliveryservices->receiver_name}}</td>
                                 
                            </tr>
                            <tr>
                                 <td><?php echo translate('receiver_phone') ?></td>
                                 <td>{{$deliveryservices->receiver_phone}}</td>
                                 
                            </tr>
                            <tr>
                                 <td><?php echo translate('pickup_township') ?></td>
                                 <td>{{$deliveryservices->pickuptownship->name}}</td>
                                 
                            </tr>
                            <tr>
                                 <td><?php echo translate('delivery_township') ?></td>
                                 <td>{{$deliveryservices->deliverytownship->name}}</td>
                                 
                            </tr><tr>
                                 <td><?php echo translate('weight') ?></td>
                                 <td>{{$deliveryservices->weight}}</td>
                                 
                            </tr>
                            <tr>
                                 <td><?php echo translate('delivery_charges') ?></td>
                                 <td>{{$deliveryservices->del_charges}}</td>
                                 
                            </tr>
                            <tr>
                                 <td><?php echo translate('delivery_detail_address') ?></td>
                                 <td>{{$deliveryservices->detail_address}}</td>
                                 
                            </tr>
                            <tr>
                                 <td><?php echo translate('note') ?></td>
                                 <td>{{$deliveryservices->note}}</td>
                                 
                            </tr>
                            
                        </thead>
  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection