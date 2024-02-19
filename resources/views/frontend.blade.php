<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo translate('system_name'); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap_my/my_style.css')}}">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="wrapper flex-center position-ref full-height">
    <?php //echo translate('cherry_han'); ?>
    <?php //echo translate('online_general_service_system'); ?>
    <?php //echo translate('misl'); ?>
    <?php //echo translate('developed_by'); ?>
    <?php //echo translate('version_no'); ?>
    <?php //echo translate('profile'); ?>
    <?php //echo translate('change_password'); ?>
    <?php //echo translate('sign_out'); ?>
    <?php //echo translate('login'); ?>
    <?php //echo translate('email_address'); ?>
    <?php //echo translate('password'); ?>
    <?php //echo translate('dashboard'); ?>
    <?php //echo translate('new_orders'); ?>
    <?php //echo translate('total_new_orders'); ?>
    <?php //echo translate('this_month_orders'); ?>
    <?php //echo translate('monthly_orders'); ?>
    <?php //echo translate('total_orders'); ?>
    <?php //echo translate('monthly'); ?>
    <?php //echo translate('total_income'); ?>
    <?php //echo translate('annual'); ?>
    <?php //echo translate('orders_status'); ?>
    <?php //echo translate('new_orders_status'); ?>
    <?php //echo translate('dash_view_message'); ?>
    <?php //echo translate('daily_message'); ?>
    <?php //echo translate('see_more'); ?>
    <?php //echo translate('show_more'); ?>
    <?php //echo translate('order_id'); ?>
    <?php //echo translate('order_description'); ?>
    <?php //echo translate('order_new'); ?>
    <?php //echo translate('order_completed'); ?>
    <?php //echo translate('order_pending'); ?>
    <?php //echo translate('order_cancel'); ?>
    <?php //echo translate('order_on_the_way'); ?>
    <?php //echo translate('action'); ?>
    <?php //echo translate('edit'); ?>
    <?php //echo translate('add_new'); ?>
    <?php //echo translate('delete'); ?>
    <?php //echo translate('view'); ?>
    <?php //echo translate('service_list'); ?>


    <?php //echo translate('all_order'); ?>
    <?php //echo translate('messages'); ?>
    <?php //echo translate('compose_message'); ?>
    <?php //echo translate('inbox_messages'); ?>
    <?php //echo translate('sent_messages'); ?>
    <?php //echo translate('delivery_service'); ?>
    <?php //echo translate('bus_tickets'); ?>
    <?php //echo translate('bus_tickets_booking'); ?>
    <?php //echo translate('travel_&_tours'); ?>
    <?php //echo translate('travel_&_tours_booking'); ?>
    <?php //echo translate('accommodation'); ?>
    <?php //echo translate('accommodation_booking'); ?>
    <?php //echo translate('cars_rental'); ?>
    <?php //echo translate('cars_rental_booking'); ?>
    <?php //echo translate('cargo_service'); ?>
    <?php //echo translate('cargo_booking'); ?>
    <?php //echo translate('container_service'); ?>
    <?php //echo translate('container_booking'); ?>
    <?php //echo translate('application_users'); ?>
    <?php //echo translate('customers'); ?>
    <?php //echo translate('agents'); ?>
    <?php //echo translate('owners_&_drivers'); ?>
    <?php //echo translate('owners'); ?>
    <?php //echo translate('drivers'); ?>
    <?php //echo translate('business_setting'); ?>
    <?php //echo translate('category'); ?>
    <?php //echo translate('sub_category'); ?>
    <?php //echo translate('child_category'); ?>
    <?php //echo translate('setting'); ?>
    <?php //echo translate('roles'); ?>
    <?php //echo translate('permissions'); ?>
    <div class="content">
        <div class="title">
            <?php echo translate('cherry_han') ?>
        </div>
        <ul>
        	<?php 
        	// print_r($cars);
        		foreach($cars as $row){
        	?>
        		<li><?php echo $row->name; ?></li>
        	<?php } ?>
        </ul>
    </div>
</div>
</body>
</html>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
    $(window).on('load', function() {
        $(".loader-in").fadeOut();
        $(".loader").delay(150).fadeOut("fast");
        $(".wrapper").fadeIn("fast");
        $("#app").fadeIn("fast");
    });
</script>
