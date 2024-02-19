        @extends('layouts.admin')

        @section('content')
            <div class="row ch-content">
                <div class="col-lg-12">
                    <?php 
                    $s="";
                    $form=json_decode($message->to_where);
                    foreach($form as $key =>$val){
                        $s.=$val.",";
                    }
                   
                    $exp=explode(",",$s);
                    $name=$exp[0];
                    $user_id=$exp[1];
                    
                    $username=DB::table('api_users')->where('id',$user_id)->first();

                     ?>
                    <div class="ibox product-detail">
                        <div class="ibox-title">
                              <h3>Reply Message</h3>                         
                            
                        </div>
                        <div class="ibox-content">
                            <h4>{{$message->subject}} <span class="float-right">{{$username->name}}</span></h4>  
                                                         
                        </div><br>
                       
                        {{--@foreach($replymessages as $reply)
                        <div class="ibox-content">
                            <h4>{{$reply->message}}</h4>       
                        </div>                       
                        @endforeach--}}

                        
                            <div id="accordion">

                            @foreach($replymessages as $reply)
                            <?php 
                                $s1="";
                                $form1=json_decode($reply->from_where);
                                foreach($form1 as $key =>$val1){
                                    $s1.=$val1.",";
                                }
                               
                                $exp1=explode(",",$s1);
                                $user_name=$exp1[0];
                                $user_id=$exp1[1];

                                 ?>
                              <div class="card">
                                <div class="card-header">
                                  <a class="card-link" data-toggle="collapse" href="#collapse{{$reply->id}}">
                                    {{$user_name}}
                                  </a>
                                </div>
                                <div id="collapse{{$reply->id}}" class="collapse show" data-parent="#accordion">
                                  <div class="card-body">
                                    {{$reply->message}}
                                  </div>
                                </div>
                              </div>
                              @endforeach

                            </div>
                       
                        <br>

                        <div>
                            <form enctype="multipart/form-data">
                             @csrf
                            <?php 
                                $time=time();
                                $viewstatus=array('user_show'=>'yes','admin_show' =>'no');
                                $view_status=json_encode($viewstatus,true);
                             ?>
                                <input type="hidden" id="message_id" name="message_id" value="{{$message->id}}">
                                <input type="hidden" id="from_where" name="from_where" value="{{$message->from_where}}">
                                <input type="hidden" id="to_where" name="to_where" value="{{$message->to_where}}">
                                <input type="hidden" id="subject" name="subject" value="{{$message->subject}}">
                                <input type="hidden" id="view_status" name="view_status" value="{{$view_status}}">

   
                                    <div class="form-group row {{ $errors->has('message') ? 'has-error':'' }}">
                                        <label class="col-sm-2 pt-5 col-form-label"><?php echo translate('reply_message'); ?></label>
                                        <div class="col-sm-6 pt-5">
                                            <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                                            @if($errors->has('message') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('message') }}</span>
                                            @endif
                                            
                                            {{--<input type="file" name="file" id="file" class="file-control-file">--}}
                                           
                                           
                                        </div>
                                    </div>
                                </form> 
                                <div class="col-md-8">
                                     <button class="btn btn-success float-right mr-3 mb-4 btnreply"><?php echo translate('reply') ?></button>
                                 </div>  
                                
                                    
                          
                        </div>
                          
                    </div>

                </div>
            </div>
        @endsection

<script src="{{ asset('misl/back/js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $(document).on('click', '.btnreply', function (e) {   
       
          var message_id=$("#message_id").val();        
          var subject=$("#subject").val();
          var from_where=$("#from_where").val();
          var to_where=$("#to_where").val();
          var message=$("#message").val();
          var view_status=$("#view_status").val();
          var file=$("#file").val();

           
            var data=$("#form").serialize()

            var append_data=" ";
           
            $.ajax({
                  url: "/message-reply/create",
                  type: "post",   
                  //data: data,                
                  data: {
                        _token: '{{csrf_token()}}',
                        message_id:message_id,
                        subject:subject,
                        from_where:from_where,
                        to_where:to_where,
                        message:message,
                        file:file,
                        view_status:view_status,
                       
                    },

                        success: function(data){
                            data1 = $.parseJSON(data);
                            var form=JSON.parse(data1.from_where);

                            append_data = "<div class='card'><div class='card-header'><a class='card-link' data-toggle='collapse' href='#collapse"+data1.id+"'>"
                                +form.type+
                                "</a></div><div id='collapse"+data1.id+"' class='collapse show' data-parent='#accordion'><div class='card-body'>"
                                +data1.message+
                                "</div></div></div>";

                            $("#accordion").append(append_data); 
                            $("#message").val("");
                            window.scrollBy(0,70);   
                        
                      }
                      
                  });
                       
        });

    });
</script>

                            