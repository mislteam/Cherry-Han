<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Car Detail Css -->
    <link href="{{asset('misl/back/plugins/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('misl/back/plugins/slick/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('misl/back/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('misl/css/carousel.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="{{asset('misl/css/select2/select2-bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('misl/css/select2/select2.min.css')}}" rel="stylesheet">
    
    <!-- Car Detail Css End -->
    <title><?php echo translate('system_name'); ?></title>
    <style type="text/css">
        .navbar-dark .navbar-nav .nav-link:hover {
            text-decoration: none;
            color: #ea068d;
        }
        .navbar-dark .navbar-nav .nav-link.active{
            color: #ea068d;
        }
      
        .banner_bgimage {
          height: 250px;
          box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.3);

        }
      
        @media (max-width: 768px) {
            .mobile-car-view{
                display: inline-block;
            }

            .card{
                width: 125px !important;
                height: 100px !important;
                display: inline-block;
                margin: 2px;
            }
    }
  
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-lg">
            <a class="navbar-brand" href="#">Cherry Han</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php $segment = Request::segment(2); ?>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item ">
                        <a class="nav-link {{ ($segment =='' ) ? 'active':''}}" href="{{ route('frontend') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($segment =='delivery-booking' ) ? 'active':''}}" href="{{ route('deliverybookingIndex') }}">Delivery Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($segment =='tour-destination' ) ? 'active':''}}" href="{{ route('tourdestination') }}">Tour Destination</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($segment =='tours' ) ? 'active':''}}" href="{{ route('tours') }}">Travel & Tours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($segment =='hotel' ) ? 'active':''}}" href="{{ route('hotel') }}">Hotel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($segment =='busticket' ) ? 'active':''}}" href="{{ route('busticket') }}">Bus Ticket</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link {{ ($segment =='cars' ) ? 'active':''}}" href="{{ route('cars') }}">Car Rentals</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link {{ ($segment =='container-servcie' ) ? 'active':''}}" href="{{ route('container') }}">Container</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($segment =='cargo-service' ) ? 'active':''}}" href="{{ route('cargo') }}">Cargo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($segment =='user-register' ) ? 'active':''}}" href="{{ route('userregisterAdd') }}">Customer</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown06">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Optional JavaScript; choose one of the two! -->
    <div class="wrapper position-ref container-lg mt-4 mobile-view"> 

    @yield('content')
    

    </div>
     

    
    <script src="{{ asset('misl/back/js/jquery.min.js') }}"></script>
    <script src="{{ asset('misl/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('misl/back/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('misl/back/js/ajax_script.js') }}"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Car Detail Js -->

    <script src="{{ asset('misl/back/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('misl/back/plugins/slick/slick.min.js') }}"></script>
    <script src="{{asset('misl/js/select2/select2.full.min.js')}}"></script>
    <!-- Car Detail Js -->

    <script type="text/javascript">
      $(document).ready(function (){

        $('.alert-success').hide();
        $('.alert-danger').hide();
        

            $(document).on('click', '.verifybtn', function(){
                
                var session_code=$('#session_code').val();
                var verify_code=$('#verify_code').val();
                if(session_code==verify_code){
                    setInterval(function () {
                    $('.alert-success').show();                                         
                    $('.alert-danger').hide();
                    window.location='/en';
                    
                    }, 1000);
                    
                    
                }else{
                    $('.alert-danger').show();            
                    $('.alert-success').hide();
              
                }

            })

            

                
        $(document).on('change', '#state_id', function (e) {
            $('#city_id').html("");
            var state_id = $(this).val();
            var div_data = '<option value="">Select..</option>';
            $.ajax({
                type: "GET",
                url: "{{route('registergetstatecity')}}",
                data: {'state_id': state_id},
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


        $(document).on('change', '#city_id', function (e) {
         
            var city_id = $(this).val();
          
            $.ajax({
                type: "GET",
                url: "/getweight/"+city_id,
                //data: {'city_id': city_id},
                dataType: 'json',
                success: function (data) {
                 
                 var w=0;
                 var p=0;
                         
                    $.each(data, function (i, obj)                       
                    {
                        $("#old_weight").val(obj.weight);
                        $("#price").val(obj.price)                  
                        w+=parseFloat(obj.weight);                       
                        p+=parseFloat(obj.price);
                                            
                    });

                    var weight=$('#weight').val();
                    var d=(weight/w)*p;                    
                    $("#del_charges").val(d);                
                }

            });

            
        });
      });

     
      function CalculateDelCharges(value)
      {
        
        //var weight = value;    
       
        var weight = $('#weight').val();  
       
        var old_weight=$('#old_weight').val();
        var price=$('#price').val();
        //alert("old weight:"+old_weight+" and price:"+price);       

        var delivery_charges=parseFloat((weight/old_weight)*price);
        $("#del_charges").val(delivery_charges);

      }
      
    </script>

    <script type="text/javascript">
        $(document).on('change', '#city', function (e) {
         
            var city_id = $(this).val();
            //var weight=$('#weight');

            $.ajax({
                type: "GET",
                url: "/getweight/"+city_id,
                //data: {'city_id': city_id},
                dataType: 'json',
                success: function (data) {
                 var w=0;
                 var p=0;
                    $.each(data, function (i, obj)
                    {
                    
                        $("#old_weight").val(obj.weight);
                        $("#price").val(obj.price);
                        w+=obj.weight;
                        p+=obj.price;
                       
                    });
                    var weight=$("#weight").val();
                    var d=(weight/w)*p;
                    $('#del_charges').val(d);                  
                }
            });
        });
    </script>

    <script type="text/javascript">
    $(document).ready(function (){
        $(document).on('click', '.add-to-cart', function () {   
        
            var sender_name = $('#sender_name').val();
            var sender_phone = $('#sender_phone').val();
            var receiver_name = $('#receiver_name').val();
            var receiver_phone = $('#receiver_phone').val();
            var pickup_township = $('#pickup_township').val();
            var delivery_township = $('#city').val();
            var weight = $('#weight').val();
            var del_charges = $('#del_charges').val();
            var detail_address = $('#detail_address').val();
            var note = $('#note').val();
          
                 $.ajax({
                      url: "/delivery-booking/create",
                      type: "post",
                      data: {
                            _token: '{{csrf_token()}}',
                            sender_name:sender_name,
                            sender_phone:sender_phone,
                            receiver_name:receiver_name,
                            receiver_phone:receiver_phone,
                            pickup_township:pickup_township,
                            delivery_township:delivery_township,
                            weight:weight,
                            del_charges:del_charges,
                            detail_address:detail_address,
                            note:note
                        },

                          //cache: false,
                          success: function(dataResult){
                                                 
                            window.location = "/delivery-booking/addmore";         
                                                                  
                          }
                    });
            
           
                        
        });
    });
</script>
  </body>
</html>