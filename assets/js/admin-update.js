$(document).on('click', '#btnedit', function(){
    $('html, body').animate({
        scrollTop: $('.formcustome').offset().top
    },1000);
        $('#message').html('');
        $('#order_id').val('Loading.....');
        $('#nama').val('Loading.....');
        $('#nik').val('Loading.....');
        $('#servis').val('Loading.....');
        $('#harga').val('Loading.....');
        $('#tgl').val('Loading.....');
        $('#note').html('Loading.....');
        var id = $(this).attr('data-id');
        $.ajax({
            url: "http://localhost/AdminCarwash/app/getOrder/getOrder.php?getOrder",
            method: "POST",
            dataType: "JSON",
            data: {orderid: id}, 
            success:function(data){
                setTimeout(function(){
                    $('#order_id').val('');
                    $('#nama').val('');
                    $('#nik').val('');
                    $('#servis').val('');
                    $('#harga').val('');
                    $('#tgl').val('');
                    $('#note').html('');
                    
                    $('#order_id').val(data.orderid);
                    $('#nama').val(data.nama);
                    $('#nik').val(data.nik);
                    $('#servis').val(data.servis);
                    $('#harga').val(data.harga);
                    $('#tgl').val(data.tgl);
                    $('#note').html(data.note);
                }, 5000);
                }
            })
        })
    
    $(document).on('click', '#btnupdate', function(){
        var string = '';
        $(this).html('<div class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>');
        if ($('#status option:selected').val() != '') {
            var order_id = $('#order_id').val();
            var status = $('#status option:selected').val();
            $.ajax({
                url: "http://localhost/AdminCarwash/app/getOrder/getOrder.php?updateOrder",
                method: "POST",
                data:{orderid:order_id, status:status},
                success:function(data){
                    if (data == '1') {
                        setTimeout(function(){
                            $('#btnupdate').html('');
                            $('#btnupdate').html('Save');
                            window.location.reload();
                        }, 5000); 
                    }
                    if (data == '0') {
                        setTimeout(function(){
                            $('#btnupdate').html('');
                            $('#btnupdate').html('Save');
                            window.location.reload();
                        }, 5000);  
                    }
                }
            })
        }else{
            string += '<div class="alert alert-danger" role="alert">';
            string += 'Data di form masih kosong';
            string += '</div>'; 
            $('#message').html(string);
        }
    })