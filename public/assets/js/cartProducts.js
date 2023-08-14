$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.quantity-input').on('change',function(){
        var input = $(this);
        var url = input.data('url');
        var quantityProduct = input.val();

        $.ajax({
            method: 'POST',
            url: url,
            dataType: 'JSON',
            data: {quantity: quantityProduct},
            success: function(data){
                input.closest('.product-row').find('.total-price').html(data.total);
            },
            error: function(data){
                console.log(data);
            }
        });
        
    });

})