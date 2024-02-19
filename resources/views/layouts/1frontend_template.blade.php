<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo translate('system_name'); ?></title>

    <!-- Fonts -->
    <link href="{{asset('misl/back/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Styles -->

    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link href="{{asset('form/css/plugins/select2/select2-bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('form/css/plugins/select2/select2.min.css')}}" rel="stylesheet">

     <!-- Detail car view -->

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,500,500i,600,600i,700,700i&subset=cyrillic" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/vendor/style.css')}}" rel="stylesheet">
<!-- End Detail Car -->

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
            margin-top: 20px;
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

        /*Detail Car View Css*/
        .navbar-b {
    transition: all .5s ease-in-out;
    /*background-color: transparent;*/
    background-color: #48abec;
    padding-top: 1.563rem;
    padding-bottom: 1.563rem;
  }

    .navbar-b.navbar-reduce .navbar-brand {
    color: #48abec;
}
    

    * {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
  border: 4px solid #ccc;
  border-radius: 3px
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  /*height: 15px;*/
  /*width: 15px;*/
 /* margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;*/
  transition: background-color 0.6s ease;
}

 .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

.fade:not(.show) {
    opacity: 1 !important;
}

.post-box,.widget-sidebar,.dot{
  box-shadow: 3px 1px 20px 10px #ccc;
}


@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
  .logo-img{
  border: 3px solid #ccc;
  border-radius: 3px;
  width:50px;
}
}

.logo-img{
  border: 3px solid #ccc;
  border-radius: 3px;
  width:100px;
}
/*.post-box, .widget-sidebar, .dot {
    box-shadow: 3px 1px 20px 10px #ccc;
}*/
.post-box, .form-comments, .box-comments, .widget-sidebar {
    padding: 2rem;
    background-color: #fff;
    margin-bottom: 3rem;
}

.navbar-dark .navbar-nav .nav-link:hover {
    text-decoration: underline #ea068d;
}
.navbar-dark .navbar-nav .nav-link.active{
    color: #ea068d;
}
/*end Detail Car View*/
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
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
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="wrapper position-ref container mt-5"> 

    @yield('content')



    </div>
</body>
</html>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('misl/back/js/bootstrap.min.js') }}"></script>
<script src="{{asset('form/js/plugins/select2/select2.full.min.js')}}"></script>

<!-- Detial Car View js -->

<script src="{{asset('frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>   

  <!-- Template Main JS File -->
    <script src="{{asset('frontend/vendor/main.js')}}"></script> 
  
 <script type="text/javascript">
  
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
</script> 
<!-- End Detail Car View js -->


<script>
    $(window).on('load', function() {
        $(".loader-in").fadeOut();
        $(".loader").delay(150).fadeOut("fast");
        $(".wrapper").fadeIn("fast");
        $("#app").fadeIn("fast");
    });
</script>

 <script type="text/javascript">
      $(document).ready(function (){
                
               $('.randomalert').hide();
               $('.errorelert').hide();
        

            $(document).on('click', '.verifybtn', function(){
               
                var session_code=$('#session_code').val();
                var verify_code=$('#verify_code').val();
                if(session_code==verify_code){
                    $('.randomalert').show();                  
                    $('.errorelert').hide();
                }else{
                    $('.errorelert').show();
                    $('.randomalert').hide();
              
                }

            })

            $(".select2_demo_1").select2({
                theme: 'bootstrap4',
            });
            $(".select2_demo_2").select2({
                theme: 'bootstrap4',
            });
            $(".select2_demo_3").select2({
                theme: 'bootstrap4',
                placeholder: "Select a state",
                allowClear: true
            });

        $(document).on('change', '#state_id', function (e) {
            //$('#city_id').html("");
            var state_id = $(this).val();
            var div_data = '<option value="">Select..</option>';
            $.ajax({
                type: "GET",
                url: "{{route('getstatecity')}}",
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
