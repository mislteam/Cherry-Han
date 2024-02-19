        @extends('layouts.admin')
        @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo translate('customer_lists'); ?></h5>
                            
                        </div>
                        <div class="ibox-content">
                            <?php $segment1 = Request::segment(1); ?>
                            <div class="table-responsive">
                              
                                    <table class="table">
                                   
                                        <tr>
                                            <th><b><?php echo translate('customer_name') ?></b></th>
                                            <td class="text-left">{{$apiuser->name}}</td>
                                            
                                        </tr>
                                        <tr>                    
                                            <th><b><?php echo translate('customer_phone') ?></b></th>
                                            <td>{{$apiuser->phone}}</td>     
                                        </tr>
                                        <tr>                    
                                            <th><b><?php echo translate('customer_email') ?></b></th>
                                            <td>{{$apiuser->email}}</td>     
                                        </tr>
                                        <tr>                    
                                            <th><b><?php echo translate('customer_address') ?></b></th>
                                            <td>{{$apiuser->address}}</td>     
                                        </tr>
                                  
                                    
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection