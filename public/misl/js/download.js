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

});


