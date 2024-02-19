        @extends('layouts.frontend_template')
        @section('content')
                   
            <div class="ibox-content mt-5">
                  
                    <div class="table-responsive">
                        <table class="table"  >
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo translate('id') ?></th>
                                    <th class="text-center"><?php echo translate('delivery_township') ?></th>
                                    <th class="text-center"><?php echo translate('weight') ?></th>
                                    <th class="text-center"><?php echo translate('price') ?></th>
                                    <th class="text-center"><?php echo translate('action') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $total=0;
                            $weight=0;
                            $count = 1;
                            @endphp
                            @foreach($orderdetails as $order)
                           
                                <tr>
                                    <td class="text-center">{{ $count }}</td>                               
                                    <td class="text-center" id="delivery_township">{{ $order->city->name }}</td>
                                    <td class="text-center" id="weight">{{ $order->weight }} kg</td>
                                    <td class="text-center" id="del_charges">{{ $order->del_charges }}</td>
                                    
                                    <td class="text-center">
                                      
                                        <form action="{{route('deliverydetailorderDestroy',$order->id)}}" method="post">
                                            @csrf
                                            <div class="btn-group">
                                                                                             
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="button" class="btn btn-danger btn-sm pt-2" onclick="if (confirm('<?php echo translate('are_you_sure?') ?>')) { this.form.submit() } ">x</button>
                                            </div>
                                        </form>
                                       
                                    </td>
                                </tr>
                                @php
                                $count++;
                                $weight+=$order->weight;
                                $total+=$order->del_charges;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-center">Total</td>   
                                <td class="text-center">{{$weight}} kg</td>   
                                <td class="text-center">{{$total}}</td>   
                            </tr>
                        </tfoot>
                        </table>
                    </div>

                    <form action="{{route('deliverybooking')}}" method="post">
                 @csrf
                   
                    @foreach($orderdetails as $order)

                            <input type="hidden" name="id[]" value="{{$order->id}}">
                            <input type="hidden" name="user_id[]" value="{{$order->user_id}}">
                            <input type="hidden" name="sender_name[]" value="{{$order->sender_name}}">
                            <input type="hidden" name="sender_phone[]" value="{{$order->sender_phone}}">
                            <input type="hidden" name="receiver_name[]" value="{{$order->sender_name}}">
                            <input type="hidden" name="receiver_phone[]" value="{{$order->sender_phone}}">                        
                            <input type="hidden" name="pickup_township[]" value="{{$order->pickup_township}}">
                            <input type="hidden" name="delivery_township[]" value="{{$order->delivery_township}}">
                            <input type="hidden" name="weight[]" value="{{$order->weight}}">
                            <input type="hidden" name="del_charges[]" value="{{$order->del_charges}}">
                            <input type="hidden" name="detail_address[]" value="{{$order->detail_address}}">
                            <input type="hidden" name="note[]" value="{{$order->note}}">
                            @endforeach

                     <button type="submit" class="btn btn-primary"  style="padding: 5px 30px 5px ;margin-left: 350px;">Next</button>
                 </form>
            </div>
                
        @endsection

 