var check = function () {
    if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Contraseñas coinciden';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Contraseñas no coinciden';
    }
}

// select all desired input fields and attach tooltips to them
$("#myform :input").tooltip({

    // place tooltip on the right edge
    position: "center right",

    // a little tweaking of the position
    offset: [-2, 10],

    // use the built-in fadeIn/fadeOut effect
    effect: "fade",

    // custom opacity setting
    opacity: 0.7

});