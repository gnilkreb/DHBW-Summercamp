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

    $('[data-toggle="tooltip"]').tooltip();

    $('[data-clipboard-text]').each((index, element) => {
        const clipboard = new Clipboard(element);

        clipboard.on('success', event => {
            const $trigger = $(event.trigger);

            $trigger.tooltip('show');

            setTimeout(() => $trigger.tooltip('hide'), 500);
        });
    });
});