$(document).ready(function () {
    $('.logoobject').hide();
    $('.scratch-panel').hide();
    $('.robotics-panel').hide();

    setTimeout(function () {
        $('.logoobject').addClass('animated');
        $('.logoobject').addClass('bounceInDown');
        $('.logoobject').show();
    }, 250);

    setTimeout(function () {
        $('.scratch-panel').addClass('animated');
        $('.scratch-panel').addClass('rotateInDownLeft');
        $('.scratch-panel').show();
    }, 750);

    setTimeout(function () {
        $('.robotics-panel').addClass('animated');
        $('.robotics-panel').addClass('rotateInDownRight');
        $('.robotics-panel').show();
    }, 1250);

    $('.menu-login').click(function () {
        alert('Hello');
    });
});

$("[name='gender']").bootstrapSwitch();