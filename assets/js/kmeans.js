$(document).on('click', '#kanomodel', function() {
    $('html, body').animate({
        scrollTop: $('#literasi').offset().top
    },2000);
    setTimeout(function(){
        $('#spinnerliter1').show();
        $('#spinnerliter2').show();
        $('#spinnerliter3').show();
        $('#spinnerliter4').show();
        $('#spinnerliter5').show();
    }, 1000);
    setTimeout(function(){
        $('#spinnerliter1').hide();
        $('#iter1').show();

        $('#spinnerliter2').hide();
        $('#iter2').show();

        $('#spinnerliter3').hide();
        $('#iter3').show();

        $('#spinnerliter4').hide();
        $('#iter4').show();

        $('#spinnerliter5').hide();
        $('#iter5').show();
    }, 5000); 
})

function hideKmeans() {
    $(document).ready(function() {
        $('html, body').animate({
            scrollTop: $('#dtq').offset().top
        },1000);
        $('#iter1').hide();
        $('#iter2').hide();
        $('#iter3').hide();
        $('#iter4').hide();
        $('#iter5').hide();


        $('#spinnercentroid').hide();
        $('#spinnerliter1').hide();
        $('#spinnerliter2').hide();
        $('#spinnerliter3').hide();
        $('#spinnerliter4').hide();
        $('#spinnerliter5').hide();
    })
}