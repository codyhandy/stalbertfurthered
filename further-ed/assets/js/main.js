// mobile toggle button
let mobileBtn = document.querySelector('.mobile-btn');
let nav = document.querySelector('.main-menu');

console.log('js has been loaded');

mobileBtn.addEventListener('click', () => {
    console.log('menu button has been clicked')
    nav.classList.toggle('show-nav');
});


// the scroll to top button
let scrollBtn = document.querySelector('.scroll-btn');

window.onscroll = function() {scrollFunction()};

function scrollFunction () {
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        scrollBtn.style.display = 'block';
    } else {
        scrollBtn.style.display = 'none';
    }
}

// scrolls to the top when the button is pressed
function topFunction() {
    document.body.scrollTop = 0; // safari
    document.documentElement.scrollTop = 0; // chrome, firefox
}