function baseURL(url='')
{	
	var host = window.location.host;
	var base = window.location.origin;
	var pathArray = window.location.pathname.split( '/' );
	if (host=='localhost') {
		var baseurl = base+'/'+pathArray[1];
	} else {
		var baseurl = base;
	}
	if (url=='') {
		return baseurl+'/';
	} 
	if (url!='') {
		return baseurl+'/'+url;
	}
}
$(function(){
	$.noti = function(status, position, respon, title=''){
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-"+position,
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "7000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr[status](respon, title);   
    }
	$.plugin = function(){
		$('[stack-select]').selectpicker();
		$('[data-toggle="tooltip"]').tooltip();

		$('[stack-note]').summernote({
			height:300,
			toolbar: [
	          ['style', ['style']],
	          ['font', ['bold', 'underline', 'clear']],
	          ['color', ['color']],
	          ['para', ['ul', 'ol', 'paragraph']],
	          ['table', ['table']],
	          ['insert', ['link']],
	        ]
		});

		$('[stack-note-edit]').summernote({
			height:300,
			placeholder: "မိမိပြင်ဆင်လျှောက်ထားခဲ့သော အချက်အလတ်အကြောင်းအရာများအား ရေးသားရန်",
			toolbar: [
	          ['style', ['style']],
	          ['font', ['bold', 'underline', 'clear']],
	          ['color', ['color']],
	          ['para', ['ul', 'ol', 'paragraph']],
	          ['table', ['table']],
	          ['insert', ['link']],
	        ]
		});
		$('[stack-note-upg]').summernote({
			height:250,
			placeholder: "အကြောင်းအရာ ရိုက်ထည့်ပါ",
			toolbar: [
	          ['style', ['style']],
	          ['font', ['bold', 'underline', 'clear']],
	          ['fontname', ['fontname']],
	          ['fontsize', ['fontsize']],
	          ['color', ['color']],
	          ['para', ['ul', 'ol', 'paragraph']],
	        ]
		});
	}
	
	$.plugin();


	$.fragmentLoad = function(url, id, load=true, callback){
		// url = admin/setting/building/group
		// id = #stack-pages-replace
		$.ajax({
			type: 'GET',
		    url: url,
		    dataType: "html",
		    beforeSend: function(){
		    	if (load)
		        	$(id).html('<div class="stack-loading-container"><div class="stack-dual-ring"></div></div>');
		    },
		    success: function(results){
		    	$(id).hide().html(results).fadeIn();
				$('[stack-select="true"]').selectpicker();
		    	if ($(id).find('[stack-window-loads]').length) {
		    		// $.ajaxReload();
		    	}
		    }
		});
	}/*
	* Form Submit
	*/
	$('body').on('click', '[stack-submit]', function(e){
		var form = $(e.target).closest('form');
	    var can = '';
	    var a = 0;
	    var take = 'scroll';
	    var requireddd = $('input,textarea,select').filter('[required]:visible');
	    form.find(requireddd).each(function(){
	        var txt = '* This Field is Required.';
	        a++;
	        if(a == 1){
	            take = 'scroll';
	        }
	        var here = $(this);
	        if($.trim(here.val()) == ''){
	            if(!here.is('select')){
	                here.css({borderColor: 'red'});
	                if(here.attr('type') == ' '){
	                    txt = '* This Field is Number Required.';
	                }   
	                if (here.closest('div').hasClass('input-group')) {               
		                if(here.closest('div.input-group').parent().find('.require_alert').length){

		                } else {
		                    here.closest('div.input-group').parent().append(''
		                        +'  <span id="'+take+'" class="label label-danger require_alert" >'
		                        +'      '+txt
		                        +'  </span>'
		                    );
		                }
		            } else {
		            	if(here.closest('div').find('.require_alert').length){

		                } else {
		                    here.closest('div').append(''
		                        +'  <span id="'+take+'" class="label label-danger require_alert" >'
		                        +'      '+txt
		                        +'  </span>'
		                    );
		                }
		            }
	            } else if(here.is('select')){
	                if (here.closest('div.bootstrap-select').length) {
	                	here.closest('div.bootstrap-select').css({borderColor: 'red'});
		                if(here.closest('div.bootstrap-select').parent().find('.require_alert').length){

		                } else {
		                    here.closest('div.bootstrap-select').parent().append(''
		                        +'  <span id="'+take+'" class="label label-danger require_alert" >'
		                        +'      * Please Choose One'
		                        +'  </span>'
		                    );
		                }
		            } else {
		            	here.css({borderColor: 'red'});
		                if(here.closest('div').parent().find('.require_alert').length){

		                } else {
		                    here.closest('div').parent().append(''
		                        +'  <span id="'+take+'" class="label label-danger require_alert" >'
		                        +'      * Please Choose One'
		                        +'  </span>'
		                    );
		                }
		            }

	            }
	            here.first().focus();
			 	$('html, body').animate({
			        scrollTop: $('.require_alert').first().offset().top - 50
			    }, 1000, function (e) {
			        $('.require_alert').first().parent().find('input, textarea, select').focus();
			    }).promise().done(function (e) {
			      	$('.require_alert').first().parent().find('input, textarea, select').focus();
			    });
	            can = 'no';
	        } else {
	            here.removeAttr('style');
	            here.closest('div').find('.require_alert').remove();
	            here.closest('div').parent().find('.require_alert').remove();
	            here.closest('div.bootstrap-select').removeAttr('style');
	            here.closest('div.bootstrap-select').parent().find('.require_alert').remove();
	        }
	        take = '';
	    });

	    if(can !== 'no'){
	        var formid = form;
	        var formdata = false;
	        var aciton = formid.attr('action');
	        if (window.FormData){
	            formdata = new FormData(formid[0]);
	            if ($(this).prop('tagName')==='INPUT') {
	            	$(this).attr('name')
	            	formdata.append($(this).attr('name'), $(this).attr('value'));
	            }
	        }
	        $.ajax({
	            type    : "POST",
	            dataType: "json",
	            url     : aciton,
	            data    : formdata ? formdata : formid.serialize(),
	            cache       : false,
	            contentType : false,
	            processData : false,
	            beforeSend: function(){
	                $(e.target).prop('disabled', true);
	                $('body').addClass('modal-open');
	                $('body').append('<div class="lds-maind"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>');
	            },
	            success: function(res){
	                if(res.status){
	                    $.noti('success', 'top-right', res.message, res.title);
	                    $(e.target).prop('disabled', false);
	                    $('[stack-dismiss="modal"]').trigger('click');
	                    $('body').removeClass('modal-open');
	                    $('body').remove('.lds-maind');
	                    if (res.redirect) {
	                    	setTimeout(function(){ window.location.href = baseURL(res.redirect) }, 1000);
	                    }
	                    if (res.reload) {
	                    	setTimeout(function(){ window.location.href = window.location.href }, 1000);
	                    } else {
	                    	// $.ajaxReload();
	                    }
	                } else if(res.status===false) {
	                    $.noti('error', 'top-right', res.message, res.title);
	                    $(e.target).prop('disabled', false);
	                    $('body').removeClass('modal-open');
	                    $('body').remove('.lds-maind');
	                    if (res.redirect) {
	                    	setTimeout(function(){ window.location.href = baseURL(res.redirect) }, 1000);
	                    }
	                    if (res.reload) {
	                    	setTimeout(function(){ window.location.href = window.location.href }, 1000);
	                    } else {
	                    	// $.ajaxReload();
	                    }
	                } else {
                	 	$.noti('error', 'top-right', res, 'Error !!');
	                	$(e.target).prop('disabled', false);
	                	$('body').removeClass('modal-open');
	                    $('body').remove('.lds-maind');
	                }
	            },
	            error: function(e) {
	                console.log(e);
	            }
	        });
	    } else {
	        return false;
	    }
	});
	/*
	* Image Preview
	*/
	$('body').on('change', '[stack-preview-img]', function(e){
		var targetid = $(e.target).attr('stack-preview-img');
		var multiple = $(e.target).attr('multiple');
	    $(e.target.files).each(function () {
	        const file = this;
	        const fileType = file['type'];
	        const validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];
	        const validPDFTypes = ['application/pdf'];
	        const validdwgTypes = [''];
	        
	        var reader = new FileReader();
	        reader.readAsDataURL(this);
	        reader.onload = function (e) {
	        	var tid = targetid;
	        	var mut = multiple;
	            var output = "<img src='" + e.target.result + "' class=\"w-100\" style=\"height: 100%;\">";
	            if (validPDFTypes.includes(fileType)) {
	                output = "<i class=\"fa fa-file-pdf-o\" style=\"font-size: 9.5rem !important; background: #eee;\"></i>";
	            }
	            if (validdwgTypes.includes(fileType)) {
	                output = "<img src='" + baseURL('assert/img/dwg.png') + "'	 style=\"height: 100%;\">";
	            }
	            $(targetid).addClass('preview');
	            if (mut=='multiple') {
	            	$(targetid).addClass('w-100');
	            	$(targetid).css('overflow-y', 'scroll');
	            	output = "<p class='m-0' style='float:left;border:1px solid #5fbeaa;padding:2px;margin:2px;padding-left:10px;padding-right:10px;background-color:#ccc;display:flex;border-radius: 20px;'>"+file['name']+"</p>";
	          		$(targetid).append("<div style=''>"+output+"</div>");
	          		//<span class='ml-1'><i class='fa fa-close text-danger' style=\"top: 16%;position: relative;\"></i></span>
	          	} else {
	          		$(targetid).addClass('w-100');
	          		$(targetid).html("<div style='float:left;border:1px solid #5fbeaa;padding:2px;margin:2px;height: 100%;position: relative;width: 100%;text-align: center;background: #eee;'><div stack-file-remove='true' style=\"position: absolute;right: 0;border: 1px solid red;border-radius: 50%;width: 25px;height: 25px;cursor: pointer;display: block;bottom: 0;\"><i class=\"fa fa-close\" style=\"padding: 5px;\"></i></div>"+output+"</div>");
	          	}
	        }
	    });
	});

	$('body').on('change', '[stack-preview-pdf]', function(e){
		var targetid = $(e.target).attr('stack-preview-pdf');
		var multiple = $(e.target).attr('multiple');
	    $(e.target.files).each(function () {
	        const file = this;
	        const fileType = file['type'];
	        const validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];
	        const validPDFTypes = ['application/pdf'];
	        const validdwgTypes = [''];
	        
	        var reader = new FileReader();
	        reader.readAsDataURL(this);
	        reader.onload = function (e) {
	        	var tid = targetid;
	        	var mut = multiple;
	            var output = "<img src='" + e.target.result + "' class=\"w-100\" style=\"height: 100%;\">";
	            if (validPDFTypes.includes(fileType)) {
	                output = "<i class=\"fa fa-file-pdf-o\" style=\"font-size: 7rem !important;background: #eee;\"></i>";
	            }
	            if (validdwgTypes.includes(fileType)) {
	                output = "<img src='" + baseURL('assert/img/dwg.png') + "'	 style=\"height: 100%;\">";
	            }
	            $(targetid).addClass('preview');
	            if (mut=='multiple') {
	            	output = "<p class='m-0' style='float:left;border:1px solid #5fbeaa;padding:2px;margin:2px;padding-left:10px;padding-right:10px;background-color:#ccc;display:flex;border-radius: 20px;'>"+file['name']+"</p>";
	          		$(targetid).append("<div style='padding:2px;margin:2px;'>"+output+"</div>");
	          		//<span class='ml-1'><i class='fa fa-close text-danger' style=\"top: 16%;position: relative;\"></i></span>
	          	} else {
	          		$(targetid).addClass('w-100');
	          		$(targetid).html("<div style='float:left;border:1px solid #5fbeaa;padding:2px;margin:2px;height: 100%;position: relative;width: 99.5%;text-align: center;background: #eee;'><div stack-file-remove='true' style=\"position: absolute;right: 0;border: 1px solid red;border-radius: 50%;width: 25px;height: 25px;cursor: pointer;display: block;bottom: 0;\"><i class=\"fa fa-close\" style=\"padding: 5px;\"></i></div>"+output+"</div>");
	          	}
	        }
	    });
	});
	/*
	* Image File Remove
	*/
	$('body').on('click', '[stack-file-remove]', function(e){
	    e.preventDefault();
	    var form = $(e.target).closest('form');
	    var formData = new FormData(form[0]);
	    var $this = $(this);
	    var fileinput = $this.closest('.file-input-box').find('input[type="file"]');
	    fileinput.val('');
	    $this.closest('.preview').html('');
	    formData.delete(fileinput.attr('name'));
	})

	$('body').on('click', '[stack-mulImage-remove]', function(e){
	    e.preventDefault();
	    var $this = $(this);
		var target = $this.attr('stack-mulImage-remove'); //preview-image8
		$(target).html('');
		console.log(target);


	})

	/*
	* Confirm
	*/
	$('body').on('click', '[stack-confirm]', function(e){
		var $this = $(this);
		var pUrl = $this.attr('stack-confirm');
		var oUrl = pUrl.replace('page-', '');
		var regexp = new RegExp('-', 'g');
        var lUrl = oUrl.replace(regexp, '/');
		var rURL = baseURL(lUrl);

		var c = confirm("လျှောက်ထားရန်သေချာပြီလား ?");
    	if (c) {
    		$.ajax({
				type: 'GET',
			    url: rURL,
			    dataType: "html",
			    beforeSend: function(){

			    },
			    success: function(results){
			    	window.location.reload();
			    }
			});
    	}
		
	});
	$('body').on('click', '[stack-agree]', function(e){
		// console.log(e);
		var $this = $(this);
		var pUrl = $this.attr('stack-agree');
		var oUrl = pUrl.replace('page-', '');
		var regexp = new RegExp('-', 'g');
        var lUrl = oUrl.replace(regexp, '/');
		var rURL = baseURL(lUrl);
		
		var c = confirm("Download ပြုလုပ်မှာသေချာလား?");
    	if (c) {
    		$.ajax({
				type: 'GET',
			    url: rURL,
			    dataType: "html",
			    beforeSend: function(){

			    },
			    success: function(results){
			    	window.location.reload();
			    }
			});
    	}
	});
	$('body').on('click', '[stack-download]', function(e){
		var $this = $(this);
		var pUrl = $this.attr('stack-download');
		var oUrl = pUrl.replace('page-', '');
		var regexp = new RegExp('-', 'g');
        var lUrl = oUrl.replace(regexp, '/');
		var rURL = baseURL(lUrl);
		
		var c = confirm("Download ပြုလုပ်မှာသေချာလား?");
    	if (c) {
			window.location = rURL;
    	}
		
	});

	$('body').on('change', '[stack-change]', function(){
		var target = $(this).attr('stack-target');
		var func = $(this).attr('stack-change');
		var thisval = $(this).val();
		var url = 'crud/'+func+'/'+thisval;
		var rURL = baseURL(url);
		$.fragmentLoad(rURL, target);
		// console.log(url);
	});
	$('body').on('change', '[stack-change-search]', function(){
		var formid = $(this).attr('stack-formid');
		var target = $(this).attr('stack-target')+formid;
		var func = $(this).attr('stack-change-search');
		var thisval = $(this).val();
		var url = 'crud/'+func+'/'+thisval+'/'+formid;
		var rURL = baseURL(url);
		$.fragmentLoad(rURL, target);
		// console.log('target'+target);
		// if(formid!=''){
		// 	console.log(formid);
		// }else{
		// 	console.log('formid is empty');
		// }
	});
	$('body').on('change click keypress', '[stack-show]', function(){
		var target = $(this).attr('stack-show');
		$(target).show();
	});

	$('body').on('click', '[stack-lang]', function(e){
		var $this = $(this);
		console.log($this.attr('stack-lang'));
		var pUrl = $this.attr('stack-lang');
		var oUrl = pUrl.replace('page-', '');
		var regexp = new RegExp('-', 'g');
        var lUrl = oUrl.replace(regexp, '/');
		var rURL = baseURL(lUrl);
		$.ajax({
			type: 'get',
		    url: rURL,
		    dataType: "json",
		    beforeSend: function(){

		    },
		    success: function(results){
		    	window.location.reload();
		    }
		});		

	});
});

$(document).ready(function(){

	var d = 0;
	$('#back').click(function(){
		d=1;
		parent.history.back();
		return false;
	});
	
	$('#try_again').click(function(){
		location.reload(true);
		//return false;
	});

	$("#goForm").each(function() {
    $(this).find('#goSubmit').prop('disabled', true);
  });

});

function correctCaptcha() {
    $("#goForm").each(function() {
        $(this).find('#goSubmit').prop('disabled', false);
    });
}