/*=============================================================================
#   Intersection Observer
=============================================================================*/
let options = {
	root: document.querySelector('body'),
	rootMargin: '0px',
	threshold: 0
}

console.log(options);

let callback = () => {
	target.classList.add(".is-inactive");
}
console.log(callback);

let observer = new IntersectionObserver(callback, options);
console.log(observer);

let target = document.querySelector(".bottom-margin");
console.log(target);

observer.observe(target);