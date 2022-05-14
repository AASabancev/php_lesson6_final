$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': getCsrf(),
    }
});
function getCsrf(){
    return $('meta[name="csrf-token"]').attr('content');
}

$(function(){
    console.log('hello');

    $(document).on('click', '.j-tocart',function(e){
        e.preventDefault();
        let $btn = $(this);
        $.ajax({
            url: '/api/v1/cart/add',
            data: {
                good_id: $(this).data('good_id')
            },
            method: 'post',
            dataType: 'json',
            success: function(data){
                if(data.status){
                    $('.j-cart-count').text(data.cart_count)
                    $btn.addClass('btn-green').text('В корзине');
                }
            }
        });
    });

 });
