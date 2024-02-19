@extends('layouts.admin')
@section('content')

<div class="row" >
    <div class="col-lg-12">
        <div class="ibox ">
        	<div class="ibox-content">
        		<button class="btn btn-cherryhan text-center mb-4 btncollect">Collected</button>
        	</div>       	
        </div>
    </div>
</div>

@endsection
<script src="{{ asset('misl/back/js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $(document).on('click', '.btncollect', function (e) {   
       
          var message_id=$("#message_id").val();        
          var subject=$("#subject").val();
           
            $.ajax({
                  url: "/point_collect/create",
                  type: "post",                  
                  data: {
                        _token: '{{csrf_token()}}',
                        message_id:message_id,
   
                    },

                        success: function(data){
                           
                      }
                      
                  });
                       
        });

    });
</script>


