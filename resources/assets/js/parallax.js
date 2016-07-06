var landscapeX = 0;
var cloudsX = 0;
var mouseX = 0;
var speed = 0.5;
var parafactor = 2;

$('.bg-landscape').css('background-position', landscapeX + 'px bottom');
$('.bg-clouds').css('background-position', cloudsX + 'px bottom');

update();

$(document).mousemove(function(event) {
      if(mouseX != 0) {
        if(event.pageX > mouseX) {
          landscapeX = landscapeX - (speed * parafactor);
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

function update() {
  setInterval(function() {
    landscapeX = landscapeX + speed * parafactor;
    cloudsX = cloudsX + speed;
    $('.bg-landscape').css('background-position', landscapeX + 'px bottom');
    $('.bg-clouds').css('background-position', cloudsX + 'px bottom');
  }, 50);
}
