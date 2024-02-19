

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

     $(document).on('change', '#state_id', function (e) {
            $('#city_id').html("");
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
       
        $(".plus").click(function(){ 
          var lsthmtl = $(".increment").html();
          $(".increment").after(lsthmtl);
          });
          $("body").on("click",".remove",function(){ 
               $(this).parents(".hdtuto").remove();
          });

       /* $('.collapse').collapse()
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
        });*/


 



