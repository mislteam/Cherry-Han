$('body').on('change', '[stack-country-change="true"]', function(){
	var vals = $(this).val();
	if(vals==='MM'){
		$.ajax({
			type: 'GET',
		    url: baseURL('crud/region'),
		    dataType: "html",
		    success: function(results){
		    	$('#region-set').html(results);
		    	$.plugin();
		    }
		});
	} else {
		$('#region-set').html('<input type="text" class="form-control" name="region" placeholder="တိုင်းဒေသကြီး / ပြည်နယ်" required>');
		$('#district-set').html('<input type="text" class="form-control" name="district" placeholder="ခရိုင်" required>');
		$('#township-set').html('<input type="text" class="form-control" name="township" placeholder="မြို့နယ်" required>');
	}
});

$('body').on('change', '[stack-chage-data="uinfo"]', function(){
	if($(this).is(':checked')){
		$.ajax({
			type: 'GET',
		    url: baseURL('member/member/uinfo'),
		    dataType: "json",
		    success: function(results){
		    	var json = results;
		    	var address = json.member_address+'၊ '+json.member_township+'၊ '+json.member_district+'၊ '+json.member_region+'။';
		    	// console.log(json.member_pp_back);
		    	$('[stack-value-r="name"]').val(json.member_name_mm);
		    	$('[stack-value-r="phone"]').val(json.member_phone);
		    	$('[stack-value-r="email"]').val(json.member_email);
		    	$('[stack-value-r="nrcno"]').val(json.member_nrc_no);
		    	$('[stack-value-r="nrcno"]').trigger('change');
		    	$('[stack-value-r="nrcDef"]').val(json.member_nrc_ch);
		    	$('[stack-value-r="nrcNumber"]').val(json.member_nrc);
		    	
		    	setTimeout(function(){
		    	    $('[name="nrclist"]').val(json.member_nrc_code);
		    	    $('[stack-select]').selectpicker('refresh');
		    	}, 700);
		    	if(json.member_nrc_front!=''&&json.member_nrc_front!=null){
		    		$('[stack-value-r="nrcFront"]').html('<img class="w-100" style="height: 100%;" src="'+baseURL('uploads/user/')+json.member_nrc_front+'"><input type="hidden" name="Textnrc_front" value="'+json.member_nrc_front+'">');
		    	}
		    	if(json.member_nrc_back!=''&&json.member_nrc_back!=null){
		    		$('[stack-value-r="nrcBack"]').html('<img class="w-100" style="height: 100%;" src="'+baseURL('uploads/user/')+json.member_nrc_back+'"><input type="hidden" name="Textnrc_back" value="'+json.member_nrc_back+'">');
		    	}
		    	if(json.member_pp_front!=null){
		    		$('[stack-value-r="ppFirst"]').html('<img class="w-100" style="height: 100%;" src="'+baseURL('uploads/user/')+json.member_pp_front+'"><input type="hidden" name="ppTextFront" value="'+json.member_pp_front+'">');
		    	}
		    	if(json.member_pp_back!=null){
		    		$('[stack-value-r="ppBack"]').html('<img class="w-100" style="height: 100%;" src="'+baseURL('uploads/user/')+json.member_pp_back+'"><input type="hidden" name="Textpp_back" value="'+json.member_pp_back+'">');
		    	}
		    	// $('input[name=nrcFront]').attr("disabled", "true");
		    	// $('input[name=nrcBack]').attr('disabled', "true");
		    	// $('input[name=passCoverImage]').attr('disabled', "true");
		    	// $('input[name=passFirstImg]').attr('disabled', "true");

		    	// if (json.member_passport =='') {
		    	// 	$('[stack-value-r="passportNo"]').attr("disabled", "true");
		    	// }else{
		    	// 	$('[stack-value-r="passportNo"]').removeAttr("disabled", "false");
		    	// }
		    	// if (json.member_nrc =='') {
		    	// 	$('[stack-value-r="nrcNumber"]').attr("disabled", "true");
		    	// }else{
		    	// 	$('[stack-value-r="nrcNumber"]').removeAttr("disabled", "false");
		    	// }

		    	$('[stack-value-r="passportNo"]').val(json.member_passport);
		    	$('[stack-value-r="address"]').val(address);
		    }
		});
	} else {
		$('[stack-value-r="name"]').val('');
    	$('[stack-value-r="phone"]').val('');
    	$('[stack-value-r="email"]').val('');
    	$('[stack-value-r="nrcno"]').val('1');
    	$('[stack-value-r="nrcDef"]').val('');
    	$('[name="nrclist"]').val('');
    	$('[stack-value-r="nrcNumber"]').val('');
    	$('[stack-value-r="nrcFront"]').html('');
    	$('[stack-value-r="nrcBack"]').html('');
    	$('[stack-value-r="ppFirst"]').html('');
    	$('[stack-value-r="ppBack"]').html('');
    	$('[stack-value-r="passportNo"]').val('');
    	$('[stack-value-r="address"]').val('');
    	// $('input[name=nrcFront]').removeAttr("disabled", "false");
    	// $('input[name=nrcBack]').removeAttr("disabled", "false");
    	// $('input[name=passCoverImage]').removeAttr("disabled", "false");
    	// $('input[name=passFirstImg]').removeAttr("disabled", "false");
    	// $('[stack-value-r="passportNo"]').removeAttr("disabled", "false");
    	setTimeout(function(){
    	    $('[stack-value-r="nrcno"]').trigger('change');
    	    $('[stack-select]').selectpicker('refresh');
    	}, 700);
	}
	
});