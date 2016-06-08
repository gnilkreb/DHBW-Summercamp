var landscapeX = 0;
var cloudsX = 0;
var mouseX = 0;
var speed = 1;
var parafactor = 2;

$('.bg-landscape').css('background-position', landscapeX + 'px bottom');
$('.bg-clouds').css('background-position', cloudsX + 'px bottom');

$(document).mousemove(function(event) {
      if(mouseX != 0) {
        if(event.pageX > mouseX) {
          landscapeX = landscapeX - speed * parafactor;
          cloudsX = cloudsX - speed;
        }
        if(event.pageX < mouseX) {
          landscapeX = landscapeX + speed * parafactor;
          cloudsX = cloudsX + speed;
        }
      }

      $('.bg-landscape').css('background-position', landscapeX + 'px bottom');
      $('.bg-clouds').css('background-position', cloudsX + 'px bottom');

      mouseX = event.pageX;
});
