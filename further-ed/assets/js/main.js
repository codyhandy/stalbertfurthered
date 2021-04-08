window.onload = function () {
  const clickButton = document.querySelector(".mobile-btn");
  // const childButton = document.querySelector('.menu-item-276');

  clickButton.addEventListener("click", () => {
    document.querySelector(".main-menu").classList.toggle("show-nav");
    clickButton.classList.toggle("open");
  });

  var $j = jQuery.noConflict();
  $j(function () {
    $j("ul li").click(function () {
      $j(this).siblings().removeClass("active");
      $j(this).toggleClass("active");
    });
  });

  var scrollToTopBtn = document.getElementById("scrollToTopBtn");

  var scrollToTopBtn = document.getElementById("scrollToTopBtn");
  // stops button from appearing by default
  scrollToTopBtn.style.display = 'none';
  var rootElement = document.documentElement;

  function scrollToTop() {
    // Scroll to top logic
    rootElement.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  }
  scrollToTopBtn.addEventListener("click", scrollToTop);
  

  window.onscroll = function() {scrollFunction()};

  function scrollFunction () {
      if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
          scrollToTopBtn.style.display = 'block';
      } else {
          scrollToTopBtn.style.display = 'none';
      }
  }

  // // scrolls to the top when the button is pressed
  // function topFunction() {
  //     document.body.scrollTop = 0; // safari
  //     document.documentElement.scrollTop = 0; // chrome, firefox
  // }
};

// mobile toggle button
// let mobileBtn = document.querySelector('.mobile-btn');
// let nav = document.querySelector('.main-menu');

// mobileBtn.addEventListener('click', () => {
//     console.log('menu button has been clicked');

//     nav.classList.toggle('show-nav');
// });

// // the scroll to top button
