//code for remove alert
window.removeAlert = function () {
    $(".alert").delay(3000).slideUp(200, function () {
        $(this).alert().hide();
    });
}
removeAlert(); //function called

var alert_parent = $(document).find('#custom_alert_parent');
//alert success
window.alertSuccess = function (message) {
    alert_parent.empty();
    alert_parent.append(
        '<div class="alert alert-success">' +
        message +
        '</div>'
    );
}

//alert error
window.alertError = function (message) {
    alert_parent.empty();
    alert_parent.append(
        '<div class="alert alert-danger">' +
        message +
        '</div>'
    );
}

require('./front/product_info');
require('./front/cart');
require('./front/profile');
