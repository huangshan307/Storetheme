$(document).ready(function () {
    // navbar sticky
    // showStickyNav();
    
    // Toggle button
    $('.collapse').collapse({
        toggle: false,
    })
    
    //toolip
    $('[data-toggle="tooltip"]').tooltip();

    $('.carousel').carousel();

    // Touch Spin
    touchSpinAction();
});



function touchSpinAction() {
    $('#touchspin-down').click(function () {
        touchspin('minus');
    });
    $('#touchspin-up').click(function () {
        touchspin('plus');
    });
}

function showStickyNav() {
    var aboveHeight = $('header').outerHeight();
    $(window).scroll(function () {
        if ($(window).scrollTop() > aboveHeight) {
            $('.sticky-nav').addClass('fixed-top bg-light');
        }
        else {
            $('.sticky-nav').removeClass('fixed-top bg-light');
        }
    });
}

function touchspin(action) {
    var quantityInput = $('#touchspin .input');
    var numstr = quantityInput.val();
    var number = parseInt(numstr);

    if (numstr == "") {
        number = 1;
        quantityInput.val(number);
    }
    if (action == 'minus') {
        if (number <= 1) {
            quantityInput.val(1);
        } else {
            number = parseInt(number) - 1;
            quantityInput.val(number);
        }

    } else if (action == 'plus') {
        number = parseInt(number) + 1;
        quantityInput.val(number);
    }

}