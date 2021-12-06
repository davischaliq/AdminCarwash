$(document).on('click', '#kanomodel', function() {
    $('html, body').animate({
        scrollTop: $('#cust').offset().top
    },2000);
    setTimeout(function(){
        $('#spinner').show();
    }, 1000);
    setTimeout(function(){
        $('#spinner').hide();
        $('#chartKano').show();
        $('#tablecust').show();
    }, 5000); 
})

function hideKano() {
    $(document).ready(function() {
        $('html, body').animate({
            scrollTop: $('#dtq').offset().top
        },1000);
        $('#tablecust').hide();
        $('#spinner').hide();
        $('#spinnerSas').hide();
        $('#spinnerDis').hide();
        $('#chartKano').hide();
    })
}