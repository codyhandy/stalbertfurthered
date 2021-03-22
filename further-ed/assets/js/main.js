
window.onload=function(){
    const clickButton = document.querySelector('.mobile-btn');
    // const childButton = document.querySelector('.menu-item-276');


  clickButton.addEventListener('click', ()=>{
    document.querySelector('.main-menu').classList.toggle('show-nav');
    clickButton.classList.toggle('open');
    
  });

  // childButton.addEventListener('click', ()=>{
  //   document.querySelector('.menu-item-has-children').classList.toggle('active');
  //   document.querySelector('.menu-item-276').siblings.removeClass('active');
    
  // });
 
     

 

// let scrollBtn = document.querySelector('.scroll-btn');

// window.onscroll = function() {scrollFunction()};

// function scrollFunction () {
//     if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
//         scrollBtn.style.display = 'block';
//     } else {
//         scrollBtn.style.display = 'none';
//     }
// }

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
