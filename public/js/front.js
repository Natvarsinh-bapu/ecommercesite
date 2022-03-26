/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/front.js":
/*!*******************************!*\
  !*** ./resources/js/front.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

//code for remove alert
window.removeAlert = function () {
  $(".alert").delay(3000).slideUp(200, function () {
    $(this).alert().hide();
  });
};

removeAlert(); //function called

var alert_parent = $(document).find('#custom_alert_parent'); //alert success

window.alertSuccess = function (message) {
  alert_parent.empty();
  alert_parent.append('<div class="alert alert-success">' + message + '</div>');
}; //alert error


window.alertError = function (message) {
  alert_parent.empty();
  alert_parent.append('<div class="alert alert-danger">' + message + '</div>');
};

__webpack_require__(/*! ./front/product_info */ "./resources/js/front/product_info.js");

__webpack_require__(/*! ./front/cart */ "./resources/js/front/cart.js");

__webpack_require__(/*! ./front/profile */ "./resources/js/front/profile.js");

/***/ }),

/***/ "./resources/js/front/cart.js":
/*!************************************!*\
  !*** ./resources/js/front/cart.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var baseUrl = window.location.origin; //update cart count

  function cart_count_update() {
    var count = $(document).find('._cart_item_count').html();
    count++;
    $(document).find('._cart_item_count').html(count);
  } //add to cart


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
      success: function success(response) {
        alertSuccess("Item added successfully"); //function called

        cart_count_update(); //function called

        removeAlert(); //function called
      },
      error: function error() {
        console.log('ERROR');
      }
    });
  }); //use address

  $(document).on('click', '#use_above_address', function () {
    var address = $(document).find('#user_address_div').html();
    $(document).find('#user_address').val(address.trim());
  }); //use phone

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

/***/ }),

/***/ "./resources/js/front/product_info.js":
/*!********************************************!*\
  !*** ./resources/js/front/product_info.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.product-info-carousel').owlCarousel({
    loop: true,
    margin: 10,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 3
      }
    }
  });
});

/***/ }),

/***/ "./resources/js/front/profile.js":
/*!***************************************!*\
  !*** ./resources/js/front/profile.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $(document).on('change', '#profile', function () {
    $(document).find('#profile_pic_form').submit();
  }); //edit profile

  $(document).on('click', '#edit_profile_btn', function () {
    $(document).find('._edit_profile_control').show();
    $(this).hide();
  });
  $(document).on('click', '#cancel_profile_btn', function () {
    $(document).find('._edit_profile_control').hide();
    $(document).find('#edit_profile_btn').show();
  });
});

/***/ }),

/***/ 2:
/*!*************************************!*\
  !*** multi ./resources/js/front.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\ecommerce\resources\js\front.js */"./resources/js/front.js");


/***/ })

/******/ });