@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3><?php echo translate('compose_message'); ?></h3>
                    {{--<div class="ibox-tools">
                     
                        <a href="" class="btn btn-sm pt-2 btn-cherryhan" ><i class="fa fa-reply"></i><?php echo translate('back'); ?></a>
  
                    </div>--}}
                </div>
                <div class="ibox-content">
            
                    <form action="{{ route('messageCreate') }}" method="POST" accept-charset="utf-8" class="wizard-big" enctype="multipart/form-data">
                       
                        @csrf         
                            <div class="row">
                                <div class="col-lg-12">


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><?php echo translate('sent_type'); ?></label>
                                       
                                        <div class=" col-sm-6 d-flex"> 
                                            <input type="radio" id="sent_type" name="sent_type" class="mr-2 {{ $errors->has('sent_type') ? 'is-invalid':'' }}" value="all" onclick="sentmessage(this.value)" checked > All

                                            <input type="radio" id="sent_type" name="sent_type" class="mr-2 ml-4 {{ $errors->has('sent_type') ? 'is-invalid':'' }}" value="agent" onclick="sentmessage(this.value)" > Agent

                                            <input type="radio" id="sent_type" name="sent_type" class="mr-2 ml-4 {{ $errors->has('sent_type') ? 'is-invalid':'' }}" value="user" onclick="sentmessage(this.value)" > User
                                            
                                        </div>
                                        @if($errors->has('trip_type') || 1)
                                            <span class="error invalid-feedback">{{ $errors->first('trip_type') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group customize row {{ $errors->has('to_where') ? 'has-error':'' }}">
                                        <label class="col-sm-2 col-form-label"><?php echo translate('sent_to'); ?></label>
                                        <div class="col-sm-6">
                                            <select  name="customize" id="customize" class="form-control" >
                                                <option value="">select...</option>
                                                <option value="allagent">All</option>
                                                <option value="customize">Customize</option>
                                               
                                            </select>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group all row {{ $errors->has('to_where') ? 'has-error':'' }}">
                                        <label class="col-sm-2 col-form-label"><?php echo translate('sent_to'); ?></label>
                                        <div class="col-sm-6">
                                           <input type="text" name="all" class="form-control" value="All" readonly>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group to_where row {{ $errors->has('to_where') ? 'has-error':'' }}">
                                        <label class="col-sm-2 col-form-label"><?php echo translate('select_customize'); ?></label>
                                        <div class="col-sm-6">
                                            <select  name="to_where[]" id="to_where" class="form-control select2_demo_1" placeholder="<?php echo translate('placeholder_sent_to') ?>" multiple>
                                               {{--@foreach($apiusers as $apiuser)
                                                    <option value="{{ $apiuser->id }}">{{ $apiuser->name }}</option>
                                                @endforeach--}}
                                            </select>
                                            @if($errors->has('to_where') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('to_where') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('subject') ? 'has-error':'' }}">
                                        <label class="col-sm-2 col-form-label"><?php echo translate('subject'); ?></label>
                                        <div class="col-sm-6">
                                            <input type="text" name="subject" placeholder="<?php echo translate('placeholder_subject') ?>"  class="form-control">
                                            @if($errors->has('subject') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('subject') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('file') ? 'has-error':'' }}">
                                        <label class="col-sm-2 col-form-label"><?php echo translate('attach_file'); ?></label>
                                        <div class="col-sm-6">
                                            <input type="file" multiple name="file[]" placeholder="<?php echo translate('placeholder_attach_file') ?>"  class="form-control">
                                            @if($errors->has('file') || 1)
                                                <span class="form-text m-b-none text-danger">{{ $errors->first('file') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                   

                                    
                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-cherryhan float-right"><?php echo translate('save')?></button>
                                            <a href="{{ route('messageIndex') }}" class="btn btn-default float-right mr-3"><?php echo translate('cancel')?></a>
                                        </div>
                                    </div>
     
                                </div>
                                
                            </div>    
  
                    </form>
                </div>
            </div>
        </div>
    </div>
 
 @endsection
 <script src="{{ asset('misl/back/js/jquery.min.js') }}"></script>
 <script type="text/javascript">

$(document).ready(function(){
   
    $('.customize').hide();
    $('.to_where').hide();
    $(".all").show();

   });


    function sentmessage(value)
    {
        $('#customize').val(" ");
        var sent_type=value;

        if(sent_type=='all')
        {
            $(".all").show();
            $('.to_where').hide();
            $('.customize').hide();
        }
        if(sent_type=='agent')
        {   
            $(".all").hide();
            $('.to_where').hide();
            $('.customize').show();
            $(document).on('change', '#customize', function (e) {
            $(".to_where").show();

           var custom_name=$("#customize").val();

           if(custom_name=='allagent'){
            $(".all").show();
            $(".to_where").hide();
           }else{
            $(".all").hide();
            $(".to_where").show();
           }
           
            //$("#to_where").html("");
           var div_data = '<option value="">Select Customize sentmessage</option>';
            $.ajax({
                type: "GET",
                url: "{{route('getsentmessage')}}",
                data: {'isAgent': sent_type},
                dataType: "json",
                success: function (data) {
                    $("#to_where").html("");
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.name + "</option>";
                    });
                    $('#to_where').append(div_data);
                }
            });
        });
        }
        if(sent_type=='user'){

            $('.to_where').hide();
            $('.customize').show();

            $(document).on('change', '#customize', function (e) {
            $(".to_where").show();

            var allagent=$('#customize').val();
            //alert(allagent);
            if(allagent=='allagent'){
                $('.all').show();
                $('.to_where').hide();

            }else{
                $('.all').hide();
                $('.to_where').show();
            }
            
         
          
           // $("#to_where").html("");
            var div_data = '<option value="">Select..</option>';
            $.ajax({
                type: "GET",
                url: "{{route('getsentmessage')}}",
                data: {'isAgent': sent_type},
                dataType: "json",
                success: function (data) {
                    $("#to_where").html("");
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.name + "</option>";
                    });
                    $('#to_where').append(div_data);
                }
            });
        });

        }   

    }

 </script>
    
