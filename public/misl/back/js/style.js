var totalAmount = localStorage.getItem('countDown') || 0,
    timeloop;

if (totalAmount) {
    timeSet()
}

function timeSet () {
    totalAmount--;
    
     if (totalAmount < 0 ) {
         localStorage.removeItem('countDown');
         totalAmount = 0;
         clearTimeout(timeloop);
         $('.enterTime').removeAttr("style");
         $('.enterTime').text('Try again');
         return;
     }

    // var minutes = parseInt(totalAmount/60);
    // var seconds = parseInt(totalAmount%60);
    var seconds = parseInt(totalAmount);

    if(seconds < 10)
        seconds = "0"+seconds;

    $('#tminus').val(seconds+'s');

    timeloop = setTimeout(timeSet, 1000);
}
$(document).ready(function(){
    $('.enterTime').click(function () { 
        $('.enterTime').hide();
        var reqVal = 1;//$('#request').val();
        var parAmt = parseInt(reqVal);

        if (timeloop) {
            clearTimeout(timeloop)
        }

        totalAmount = parAmt * 60; //120second or 2minute
        console.log("click is working");
        timeSet();
    })
});
// Clear timeout and remove localStorage value when resetting form
$('#countdown').on('reset', function () {
    totalAmount = 0;
    clearTimeout(timeloop);
    localStorage.removeItem('countDown');
    
})