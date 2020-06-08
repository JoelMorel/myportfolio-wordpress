var menuButton = document.getElementsByClassName("menu-btn");
var mobileMenu = document.getElementsByClassName("mobile-menu");

var clickedButton = function() {
  mobileMenu[0].classList.toggle("active");
};

menuButton[0].addEventListener("click", clickedButton);
