/*
*
* Base Url
*
*/
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
        return baseurl+'/admin/';
    } 
    if (url!='') {
        return baseurl+'/admin/'+url;
    }
}

$(function(){
    /*Multiple Select */
    $(".perimission_select").select2({
        theme: 'bootstrap4',
    });

    $(".single_select2").select2({
        theme: 'bootstrap4',
    });
    $(".multi_select2").select2({
        theme: 'bootstrap4',
    });
     $(".tour_select2").select2({
        theme: 'bootstrap4',
    });
    

    /*
    *
    * Add New Row  & Remove Row
    *
    *
    */
    /*Remove row for all*/
    $('body').on('click', '[misl-add-removes]', function(e){
        var trlength = $(e.target).closest('tbody').find('tr').length;
        $(e.target).closest('tr').remove();
        if(trlength <= 2){
            $(e.target).closest('tbody').find('#no_data0s').removeAttr('style');
        }
    });

    /* Services */
    $('body').on('click', '[misl-add-rows]', function(e){
        var targId = $(this).attr('misl-add-rows');
        trtag  ='<tr>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="service[]" placeholder="Service ..." value="" type="text">'
        trtag +='    </td>'
       /* trtag +='    <td>'
        trtag +='       <input class="form-control" name="kpivalue[]" placeholder="Service name" value="" type="text">'
        trtag +='    </td>'*/
        trtag +='    <td>'
        trtag +='       <span class="btn btn-cherryhan fa fa-trash-o text-danger"  misl-add-removes></span>'
        trtag +='    </td>'
        trtag +='</tr>'
        $(targId).append(trtag);
        // $('.selectpicker').selectpicker();
    });
    
        /* Language */
    $('body').on('click', '[misl-add-language]', function(e){
        var targId = $(this).attr('misl-add-language');
        trtag  ='<tr>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="language[]" placeholder="Language ..." value="" type="text">'
        trtag +='    </td>'
       /* trtag +='    <td>'
        trtag +='       <input class="form-control" name="kpivalue[]" placeholder="Service name" value="" type="text">'
        trtag +='    </td>'*/
        trtag +='    <td>'
        trtag +='       <span class="btn btn-cherryhan fa fa-trash-o text-danger"  misl-add-removes></span>'
        trtag +='    </td>'
        trtag +='</tr>'
        $(targId).append(trtag);
        // $('.selectpicker').selectpicker();
    });
    
    /* Hotel Pricing Plan */
    $('body').on('click', '[add-room-price]', function(e){
        var targId = $(this).attr('add-room-price');
        trtag  ='<tr>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="room_name[]" placeholder="Room Name (eg. Delux Single)" value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="price[]" placeholder="Price (eg. 500)" value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='       <span class="btn btn-cherryhan fa fa-trash-o text-danger"  misl-add-removes></span>'
        trtag +='    </td>'
        trtag +='</tr>'
        $(targId).append(trtag);
        // $('.selectpicker').selectpicker();
    });
    
    $('body').on('click', '[add-agent-row1]', function(e){
        var targId = $(this).attr('add-agent-row1');
        trtag  ='<tr>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="label_name[]" placeholder="Lable Name" value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="label_value[]" placeholder="Value" value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='        <span class="btn-sm btn-cherryhan pvb_ddn-text" misl-add-removes><i class="fa fa-times-circle">X</i></span>'
        trtag +='    </td>'
        trtag +='</tr>'
        $(targId).append(trtag);
        // $('.selectpicker').selectpicker();
    });
    
     $('body').on('click', '[add-agent-row]', function(e){
        var targId = $(this).attr('add-agent-row');
        trtag  ='<tr>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="label_name[]" placeholder="Lable Name" value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="label_value[]" placeholder="Value" value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='       <span class="btn btn-cherryhan fa fa-trash-o text-danger"  misl-add-removes></span>'
        trtag +='    </td>'
        trtag +='</tr>'
        $(targId).append(trtag);
        // $('.selectpicker').selectpicker();
    });

     /* container destination */
    $('body').on('click', '[misl-add-cartype]', function(e){
        var targId = $(this).attr('misl-add-cartype');
        trtag  ='<tr>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="car_type_id[]" placeholder=" car type " value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="from[]" placeholder="from" value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="to[]" placeholder="to" value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="price[]" placeholder="Price " value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='       <span class="btn btn-cherryhan fa fa-trash-o text-danger"  misl-add-removes></span>'
        trtag +='    </td>'
        trtag +='</tr>'
        $(targId).append(trtag);
        // $('.selectpicker').selectpicker();
    });



    /* Tour Itinary */
    $('body').on('click', '[itinary-add-rows]', function(e){
        var targId = $(this).attr('itinary-add-rows');
        trtag  ='<tr>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="itinary_title[]" placeholder="..." value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='       <input class="form-control" name="itinary_description[]" placeholder="..." value="" type="text">'
        trtag +='    </td>'
        trtag +='    <td>'
        trtag +='       <span class="btn btn-cherryhan fa fa-trash-o text-danger"  misl-add-removes></span>'
        trtag +='    </td>'
        trtag +='</tr>'
        $(targId).append(trtag);
        // $('.selectpicker').selectpicker();
    });
    

    // Note Tool bar false
    $('.snote').each(function(){
        var h = $(this).data('height');
        $(this).summernote({
            height:h, 
            // toolbar: false, 
            toolbar: [
                ['fontname', ['fontname']],
                ['para', ['ul', 'ol',]],
            ],
            placeholder: 'Write Some Note',
        });
    });

    $('.stnote').each(function(){
        var h = $(this).data('height');
        $(this).summernote({height:h, placeholder: 'Write Some Note',});
    });

$('body').on('click', '[change-status]', function(e){ 
 
  var $this = $(this); 
  var pUrl = $this.attr('change-status'); 
  var oUrl = pUrl.replace('page-', ''); 
  var regexp = new RegExp('-', 'g'); 
  var lUrl = oUrl.replace(regexp, '/'); 
  var rURL = 'changestatus/'+lUrl; 
  var c = confirm("ပြုလုပ်မှာသေချာလား?"); 
     if (c) { 
      $.ajax({ 
       type: 'GET', 
       url: rURL, 
       dataType: "html", 
       beforeSend: function(){ 
        $("#loading").show();
       }, 
       success: function(results){ 
        //window.location.reload(); 
        $("#loading").hide();
           
       } 
   }); 
     } else{
        e.preventDefault();
     }
   
 });
 
 //change point status
$('body').on('click', '[change-point-status]', function(e){ 
 
  var $this = $(this); 
  var pUrl = $this.attr('change-point-status'); 
 //var oUrl = pUrl.replace('page-', ''); 
  var regexp = new RegExp('-', 'g'); 
  var lUrl = pUrl.replace(regexp, '/'); 
  var rURL = 'changepointstatus/'+lUrl; 

  var c = confirm("ပြုလုပ်မှာသေချာလား?"); 
     if (c) { 
      $.ajax({ 
       type: 'GET', 
       url: rURL, 
       dataType: "html", 
       beforeSend: function(){ 
        $("#loading").show();
       }, 
       success: function(results){ 
        //window.location.reload(); 
        $("#loading").hide();
           
       } 
   }); 
     } else{
        e.preventDefault();
     }
   
 });

    
 $('#addcontainerdes').click(function(){
    
            var clone=$('.clonethis:last').clone();       
            //var no=$('td.no').length; 
            //clone.find("td[class='no']").html(no+1);
            //clone.find("select[name='service[]']").val("");
            clone.appendTo('#sourcecontainer');


        });

});
