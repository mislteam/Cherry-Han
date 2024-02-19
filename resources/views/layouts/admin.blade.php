<!DOCTYPE html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo translate('system_name') ?></title>
	<link rel="icon" href="{{ asset('images/logo/ch-ico.jpg') }}">
	<!-- Tell the browser to be responsive to screen width -->
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('misl/back/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('misl/back/css/font-awesome.min.css')}}" rel="stylesheet"> -->
    <link href="{{asset('misl/back/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('misl/back/plugins/noti/noti.css')}}" rel="stylesheet">
<!--     <link href="{{asset('misl/back/plugins/select/select.css')}}" rel="stylesheet">
 -->    
 <!-- <link href="{{asset('misl/plugins/fontawesome-5.15.4/css/all.min.css')}}" rel="stylesheet"> -->
     <link href="{{asset('misl/back/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('misl/back/plugins/note/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('misl/back/plugins/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('misl/back/plugins/slick/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('misl/back/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('misl/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('misl/back/plugins/blueimp/blueimp-gallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('misl/back/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('misl/back/lightgallery/css/lightgallery.css')}}" rel="stylesheet"> 
    <!-- <link rel="stylesheet" href="{{asset('back/css/admin.css')}}"> -->

    <link href="{{asset('misl/back/plugins/steps/jquery.steps.css')}}" rel="stylesheet">

    <link href="{{asset('misl/css/select2/select2-bootstrap4.min.css')}}" rel="stylesheet">
     <link href="{{asset('misl/css/select2/select2.min.css')}}" rel="stylesheet">
     <style type="text/css">
         #loading {
            display:    none;
            position:   fixed;
            z-index:    1000;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: rgba( 255, 255, 255, .5 ) 
                        /*url("images/img/loading.png") */
                        50% 50% 
                        no-repeat;
      
   }
   .select2-container{
    width: 100% !important;
   }
     </style>
</head>

<body class="{{ auth()->user()->theme()['body'] ?? '' }} hold-transition sidebar-mini layout-fixed layout-navbar-fixed">

    <div id="loading"></div>

	<div id="wrapper">
	    <!-- sidebar  -->
	    @include('layouts.sidebar')
        <!-- sidebar End -->

        <div id="page-wrapper" class="gray-bg">

        	<!-- Right Content Noti Header -->
            @include('layouts.right_content_noti')
            <!-- Right Content Noti Header End -->

            <?php $segment1 = Request::segment(1); ?>

            <!-- Right Content Header -->
            @include('layouts.right_content_header')
            <!-- Right Content Header End -->

            <!-- Body Content  -->

            <div class="wrapper wrapper-content animated fadeInRight">
            	@yield('content')
            </div>
            <!-- Body Content End -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- Footer End -->
        </div>
    </div>

	<!-- Mainly scripts Back -->
	<script src="{{ asset('misl/back/js/jquery.min.js') }}"></script>
	<script src="{{ asset('misl/back/js/popper.min.js') }}"></script>
	<script src="{{ asset('misl/back/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('misl/back/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
	<script src="{{ asset('misl/back/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('misl/back/plugins/noti/noti.js') }}"></script>
	<script src="{{ asset('misl/back/plugins/select/select.min.js') }}"></script>
	<script src="{{ asset('misl/back/plugins/dragsort.js') }}"></script>
	<script src="{{ asset('misl/back/plugins/iCheck/icheck.min.js') }}"></script>
	<!-- Plugin -->
	<script src="{{ asset('misl/back/plugins/note/summernote.min.js') }}"></script>
	<script src="{{ asset('misl/plugins/alertbox/alertbox.js') }}"></script>
	<script src="{{ asset('misl/plugins/dataTables/datatables.min.js') }}"></script>
	<script src="{{ asset('misl/back/plugins/blueimp/jquery.blueimp-gallery.min.js') }}"></script>
    <script src="{{ asset('misl/plugins/ladda/ladda.min.js') }}"></script>
    <script src="{{ asset('misl/plugins/ladda/ladda.jquery.min.js') }}"></script>

	<!-- LightGallery Plugin -->
	<script type="text/javascript">
	    $(document).ready(function(){
	        $('#lightgallery').lightGallery();
	    });
	</script>
	<script src="{{ asset('misl/back/lightgallery/js/lightgallery-all.min.js') }}"></script>
	<!-- Custom and plugin javascript -->
	<script src="{{ asset('misl/back/js/theme.js') }}"></script>
	<script src="{{ asset('misl/back/plugins/pace/pace.min.js') }}"></script>
	<script src="{{ asset('misl/back/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('misl/back/js/ajax_script.js') }}"></script>
	    <!-- Steps -->
	<script src="{{ asset('misl/back/plugins/steps/jquery.steps.min.js') }}"></script>
    <script src="{{asset('misl/js/select2/select2.full.min.js')}}"></script>

    <!-- Jquery Validate -->
    <script src="{{asset('misl/back/plugins/validate/jquery.validate.min.js')}}"></script>
	<script src="{{ asset('misl/back/js/app.js') }}"></script>
    
	@if(session('_message'))
	    <script>
	        Swal.fire({
	            position: 'top-end',
	            icon: "{{ session('_type') }}",
	            title: "{{ session('_message') }}",
	            showConfirmButton: false,
	            timer: {{session('_timer') ?? 5000}}
	        });
	    </script>
	    @php(message_clear())
	@endif
	@yield('scripts')

	<!-- Page-Level Scripts -->
    <script>
        // Upgrade button class name
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-print-cherryhan btn-sm pt-2';

        $(document).ready(function(){
        	 /*iCheck Image*/
        	$('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

        	/*Item View Galley Image Carousel*/
        	$('.product-images-{{$segment1}}').slick({
            	dots: true,
            	// mobileFirst:true,
				infinite: true,
				speed: 500,
				fade: true,
				cssEase: 'linear',
				autoplay: true,
        	});

        	/*Dynamic Datatable*/
            $('.dataTables-{{$segment1}}').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'csv'},
                    {extend: 'excel', title: '{{ucwords($segment1)}}-list-{{date("d-M-Y h-i-s", time())}}'},
                    {extend: 'pdf', title: '{{ucwords($segment1)}}-list-{{date("d-M-Y h-i-s", time())}}'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]
            });
        });
    </script>

    <script type="text/javascript">
    	$(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
                
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
       
        $('#add').click(function(){
    
            var clone=$('.clonethis:last').clone();       
            var no=$('td.no').length; 
            clone.find("td[class='no']").html(no+1);
            clone.find("input[name='service[]']").val("");
            clone.appendTo('#source');


        });
        $('#addcontainerprice').click(function(){
    
            var clone=$('.clonethisprice:last-child').clone();       
            var no=$('td.no').length; 
            clone.find("td[class='no']").html(no+1);
            clone.find("select[name='car_type_id[]']").val("");
            clone.find("select[name='container_des_from_id[]']").val("");
            clone.find("select[name='container_des_to_id[]']").val("");
            clone.find("input[name='price[]']").val("");
            clone.appendTo('#sourceprice');


        });
    });

    function remove(event){
        var target = $(event.target);
        target.parent().parent().remove();
    
    }

</script>
 <script type="text/javascript">
    $(document).ready(function(){
       
        $('#roomadd').click(function(){
    
            var clone=$('.roomclonethis:last').clone();       
            var no=$('td.no').length; 
            clone.find("td[class='no']").html(no+1);
            clone.find("input[name='room_name[]']").val("");
            clone.find("input[name='price[]']").val("");
            clone.appendTo('#roomsource');


        });
    });

    function roomremove(event){
        var target = $(event.target);
        target.parent().parent().remove();
    
    }

</script>



<script type="text/javascript">
       

    $(document).ready(function() {
        $('.collapse').collapse()
        $(".select2_demo_1").select2({
                theme: 'bootstrap4',
            });
            $(".select2_demo_2").select2({
                theme: 'bootstrap4',
            });
            $(".single_select1").select2({
                theme: 'bootstrap4',
            });
            $(".select2_demo_3").select2({
                theme: 'bootstrap4',
                placeholder: "Select a state",
                allowClear: true
            });

         $(".select2_demo_4").select2({
                theme: 'bootstrap4',
                listStyle:'none',
               
                allowClear: true
            });
        $(document).on('change', '#brand_id', function (e) {
            $('#model_id').html("");
            var brand_id = $(this).val();
            var div_data = '<option value="">Select..</option>';
            $.ajax({
                type: "GET",
                url: "{{route('getbrandmodel')}}",
                data: {'brand_id': brand_id},
                dataType: "json",
                success: function (data) {
                    
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.name + "</option>";
                    });
                    $('#model_id').append(div_data);
                }
            });
        });
        
        $(document).on('change', '#country_id', function (e) {
            $('#state_id').html("");
            $('#city_id').html("");
            var country_id = $(this).val();
            var divdata = '<option value="">Select..</option>';
            var divcity = '<option value="">Select..</option>';
            var stype   = $('#stype').val();
            var service = (stype=='' || undefined) ? '':stype;
            // console.log(service);
            $.ajax({
                type: "GET",
                url: "{{route('getcountrystate')}}",
                data: {'country_id': country_id, 'service': service},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    $.each(data, function (i, obj)
                    {
                        $('#weight').val(obj.status);
                        divdata += "<option value=" + obj.id + ">" + obj.name + "</option>";
                    });
                    $('#state_id').append(divdata);
                    $('#city_id').append(divcity);
                }
            });
        });

        $(document).on('change', '#state_id', function (e) {
            $('#city_id').html("");
            var state_id = $(this).val();
            var stype = $('#stype').val();
            var service = (stype=='' || undefined) ? '':stype;
            // console.log(service);
            var div_data = '<option value="">Select..</option>';
            $.ajax({
                type: "GET",
                url: "{{route('getstatecity')}}",
                data: {'state_id': state_id, 'service': service},
                dataType: "json",
                success: function (data) {
                    
                    $.each(data, function (i, obj)
                    {
                        $('#weight').val(obj.status);
                        div_data += "<option value=" + obj.id + ">" + obj.name + "</option>";
                    });
                    $('#city_id').append(div_data);
                }
            });
        });

      $(".plus").click(function(){ 
          var lsthmtl = $(".increment").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".remove",function(){ 
           $(this).parents(".hdtuto").remove();
      });

     
    });
</script>

    
</body>
