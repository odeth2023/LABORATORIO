//const v_total = document.getElementById('totalF').value;
//console.log(v_total);

$(function(){

    var t_v = $("#totalF").val();
    //console.log(t_v);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.quantity-input').on('change',function(){
        var input = $(this);
        var url = input.data('url');
        var quantityProduct = input.val();

        
        var sum=0;
        $('.total-price').each(function() {  
           sum += parseFloat( $(this).html()); 
        }); 

        //console.log(sum);
        
        

        $.ajax({
            method: 'POST',
            url: url,
            dataType: 'JSON',
            data: {quantity: quantityProduct
            },
            success: function(data){
                input.closest('.product-row').find('.total-price').html(data.total);
                $('#total-final').text(sum);
                /*console.log(data.t);*/
                
            },
            error: function(data){
                console.log(data);
            }
        });
        
    });

})