                @extends('layouts.admin')

				@section('content')

				<!-- <div class="row">
		            <div class="col-lg-3">
		                <div class="widget style1">
		                        <div class="row">
		                            <div class="col-4 text-center">
		                                <i class="fa fa-trophy fa-5x"></i>
		                            </div>
		                            <div class="col-8 text-right">
		                                <span> Today income </span>
		                                <h2 class="font-bold">$ 4,232</h2>
		                            </div>
		                        </div>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="widget style1 navy-bg">
		                    <div class="row">
		                        <div class="col-4">
		                            <i class="fa fa-cloud fa-5x"></i>
		                        </div>
		                        <div class="col-8 text-right">
		                            <span> Today degrees </span>
		                            <h2 class="font-bold">26'C</h2>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="widget style1 lazur-bg">
		                    <div class="row">
		                        <div class="col-4">
		                            <i class="fa fa-envelope-o fa-5x"></i>
		                        </div>
		                        <div class="col-8 text-right">
		                            <span> New messages </span>
		                            <h2 class="font-bold">260</h2>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="widget style1 yellow-bg">
		                    <div class="row">
		                        <div class="col-4">
		                            <i class="fa fa-music fa-5x"></i>
		                        </div>
		                        <div class="col-8 text-right">
		                            <span> New albums </span>
		                            <h2 class="font-bold">12</h2>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div> -->

				<div class="row">
		            <div class="col-lg-3">
		                <div class="ibox ">
		                    <div class="ibox-title">
		                        <div class="ibox-tools">
		                            <span class="label label-info float-right"><?php echo date('d-M-Y', time()) ?></span>
		                        </div>
		                        <h2 class="cherryhan"><?php echo translate('new_orders') ?></h2>
		                    </div>
		                    <div class="ibox-content">
		                        <h1 class="no-margins">{{ $daycount }}</h1>
		                        
		                        <small><?php echo translate('total_new_orders') ?></small>
		                    </div>
		                </div>
		            </div>

		            <div class="col-lg-3">
		                <div class="ibox ">
		                    <div class="ibox-title">
		                        <div class="ibox-tools">
		                            <span class="label label-info float-right"><?php echo date('F', time()) ?></span>
		                        </div>
		                        <h2 class="cherryhan"><?php echo translate('this_month_orders') ?></h2>
		                    </div>
		                    <div class="ibox-content">
		                        <h1 class="no-margins">{{ $monthcount }}</h1>
		                        
		                        <small><?php echo translate('monthly_orders') ?></small>
		                    </div>
		                </div>
		            </div>

		            <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-info float-right"><?php echo date('Y'); ?></span>
                                </div>
                                <h2 class="cherryhan"><?php echo translate('total_orders') ?></h2>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{ $yearcount }}</h1>
                                
                                <small><?php echo translate('total_orders') ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
		                <div class="ibox ">
		                    <div class="ibox-title">
		                        <div class="ibox-tools">
		                            <span class="label label-success float-right"><?php echo translate('annual') ?></span>
		                        </div>
		                        <h2 class="cherryhan"><?php echo translate('total_income') ?></h2>
		                    </div>
		                    <div class="ibox-content">
		                        <h1 class="no-margins">386,200</h1>
		                        
		                        <small><?php echo translate('total_income') ?></small>
		                    </div>
		                </div>
		            </div>
		        </div>

		        <div class="row">
		        	<div class="col-lg-6">
	                    <div class="ibox ">
	                        <div class="ibox-title">
	                            <h2 class="cherryhan"><?php echo translate('dash_view_message') ?></h2>
	                            <div class="ibox-tools">
	                                <span class="label label-warning-light float-right">10 <?php echo translate('daily_message') ?></span>
	                                
	                            </div>
	                        </div>
	                        <div class="ibox-content">
	                            <div>
	                                <div class="feed-activity-list">
	                                    <div class="feed-element">
	                                        <a class="float-left" href="profile.html">
	                                            <img alt="image" class="rounded-circle" src="{{asset('images/profile/a2.jpg')}}">
	                                        </a>
	                                        <div class="media-body ">
	                                            <small class="float-right"><?php echo translate('msg_send') ?></small>
	                                            <strong>Monica Smith</strong> posted a new blog. <br>
	                                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>

	                                        </div>
	                                    </div>

	                                    <div class="feed-element">
	                                        <a class="float-left" href="profile.html">
	                                            <img alt="image" class="rounded-circle" src="{{asset('images/profile/a2.jpg')}}">
	                                        </a>
	                                        <div class="media-body ">
	                                            <small class="float-right"><?php echo translate('msg_reply') ?></small>
	                                            <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
	                                            <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
	                                        </div>
	                                    </div>

	                                    <div class="feed-element">
	                                        <a class="float-left" href="profile.html">
	                                            <img alt="image" class="rounded-circle" src="{{asset('images/profile/a3.jpg')}}">
	                                        </a>
	                                        <div class="media-body ">
	                                            <small class="float-right"><?php echo translate('msg_reply') ?></small>
	                                            <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
	                                            <small class="text-muted">2 days ago at 8:30am</small>
	                                        </div>
	                                    </div>

	                                    <div class="feed-element">
	                                        <a class="float-left" href="profile.html">
	                                            <img alt="image" class="rounded-circle" src="{{asset('images/profile/profile_small.jpg')}}">
	                                        </a>
	                                        <div class="media-body ">
	                                            <small class="float-right text-navy"><?php echo translate('msg_send') ?></small>
	                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
	                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
	                                            <!-- <div class="actions">
	                                                <a href="" class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
	                                                <a href="" class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
	                                            </div> -->
	                                        </div>
	                                    </div>

	                                    <div class="feed-element">
	                                        <a class="float-left" href="profile.html">
	                                            <img alt="image" class="rounded-circle" src="{{asset('images/profile/a5.jpg')}}">
	                                        </a>
	                                        <div class="media-body ">
	                                            <small class="float-right"><?php echo translate('msg_reply') ?></small>
	                                            <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
	                                            <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
	                                            <!-- <div class="actions">
	                                                <a href="" class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
	                                                <a href="" class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
	                                            </div> -->
	                                            <!-- <div class="well">
	                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
	                                                Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
	                                            </div>
	                                            <div class="float-right">
	                                                <a href="" class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
	                                            </div> -->
	                                        </div>
	                                    </div>

	                                    <div class="feed-element">
	                                        <a class="float-left" href="profile.html">
	                                            <img alt="image" class="rounded-circle" src="{{asset('images/profile/profile_small.jpg')}}">
	                                        </a>
	                                        <div class="media-body ">
	                                            <small class="float-right"><?php echo translate('msg_send') ?></small>
	                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
	                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
	                                        </div>
	                                    </div>

	                                    <div class="feed-element">
	                                        <a class="float-left" href="profile.html">
	                                            <img alt="image" class="rounded-circle" src="{{asset('images/profile/a7.jpg')}}">
	                                        </a>
	                                        <div class="media-body ">
	                                            <small class="float-right"><?php echo translate('msg_reply') ?></small>
	                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
	                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
	                                        </div>
	                                    </div>
	                                </div>

	                                <button class="btn btn-cherryhan btn-block m-t"><?php echo translate('show_more') ?> <i class="fa fa-angle-double-right"></i></button>

	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-lg-6">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h2 class="cherryhan"><?php echo translate('order_status') ?> </h2>
                                <div class="ibox-tools">
                                    <span class="label label-danger float-right"><?php echo translate('new_orders_status') ?></span>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <table class="table">
                                    <thead>
	                                    <tr>
	                                        <th>#</th>
	                                        <th><?php echo translate('dash_orders_status') ?></th>
	                                        <th><?php echo translate('order_id') ?></th>
	                                        <th><?php echo translate('order_description') ?></th>
	                                    </tr>
                                    </thead>
                                    <tbody>
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

                        		<button class="btn btn-cherryhan btn-block m-t"><?php echo translate('show_more') ?> <i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>
                    </div>
		        </div>
                
                @endsection