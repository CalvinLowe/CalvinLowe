// reveal.js
var last_known_scroll_position = 0;
var ticking = false;

function doSomething(scroll_pos) {
  // do something with the scroll position
  //console.log(scroll_pos);
}

window.addEventListener('scroll', function(e) {

  last_known_scroll_position = window.scrollY;

  if (!ticking) {

    window.requestAnimationFrame(function() {
      doSomething(last_known_scroll_position);
      ticking = false;
    });
     
    ticking = true;

  }
  
});


var footer = document.querySelector('.page__footer');

var main = document.querySelector('.main');

main.addEventListener('scroll', reveal());

function reveal(e){
    if (main.scrollTop) {
        console.log("Revealed");
    }
    
}