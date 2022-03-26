$(document).ready(function () {

    var baseUrl = window.location.origin;

    //update cart count
    function cart_count_update() {
        var count = $(document).find('._cart_item_count').html();
        count++;

        $(document).find('._cart_item_count').html(count);
    }

    //add to cart
    $(document).on('click', '._add_to_cart', function () {
        var product_id = $(this).attr('data-id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: baseUrl + '/add-to-cart',
            type: 'POST',
            data: {
                product_id: product_id
            },
            success: function (response) {
                alertSuccess("Item added successfully"); //function called
                cart_count_update(); //function called
                removeAlert(); //function called
            },
            error: function () {
                console.log('ERROR');
            }
        });
    });

    //use address
    $(document).on('click', '#use_above_address', function () {
        var address = $(document).find('#user_address_div').html();
        $(document).find('#user_address').val(address.trim());
    });

    //use phone
    $(document).on('click', '#use_above_mobile', function () {
        var address = $(document).find('#user_phone_div').html();
        $(document).find('#user_phone').val(address.trim());
    });

    $cf = $('#user_phone');
    $cf.blur(function (e) {
        phone = $(this).val();
        phone = phone.replace(/[^0-9]/g, '');
        if (phone.length != 10) {
            alert('Phone number must be 10 digits.');
            $('#user_phone').val('');
            $('#user_phone').focus();
        }
    });

});
