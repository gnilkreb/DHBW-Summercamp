var landscapeX = 0;
var cloudsX = 0;
var mouseX = 0;
var speed = 0.1;
var parafactor = 2;
var direction = 1;

$('.bg-landscape').css('background-position', landscapeX + 'px bottom');
$('.bg-clouds').css('background-position', cloudsX + 'px bottom');

update();

$(document).mousemove(function (event) {
    if (mouseX != 0) {
        if (event.pageX > mouseX) {
            direction = -1;
        }
        if (event.pageX < mouseX) {
            direction = 1;
        }
    }

    landscapeX = landscapeX + (direction * (speed * parafactor));
    cloudsX = cloudsX + (direction * speed);

    $('.bg-landscape').css('background-position', landscapeX + 'px bottom');
    $('.bg-clouds').css('background-position', cloudsX + 'px bottom');

    mouseX = event.pageX;
});

function update() {
    setInterval(function () {
        landscapeX = landscapeX + (direction * (speed * parafactor));
        cloudsX = cloudsX + (direction * speed);

        $('.bg-landscape').css('background-position', Math.round(landscapeX) + 'px bottom');
        $('.bg-clouds').css('background-position', Math.round(cloudsX) + 'px bottom');
    }, 1);
}
