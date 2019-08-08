function openNav() {
  var hamburger = document.querySelector(".hamburger");
  hamburger.classList.add("is-active"); //triggers hamburger menu animation
  document.getElementById("mySidenav").style.width = "22%"; //size of the menu when open
  document.getElementById("mouse").style.left = "22%"; //moves the menu bar over with the menu
  document.getElementById("mouseBlur").style.left = "22%"; //moves the menu bar over with the menu
  document.getElementById("mouse").style.boxShadow = "4px 1px 15px -5px rgba(0,0,0,0.5)";
}

function closeNav() {
  var hamburger = document.querySelector(".hamburger");
  hamburger.classList.remove("is-active"); //triggers hamburger menu animation
  document.getElementById("mySidenav").style.width = "0%"; //size of the menu when closed
  document.getElementById("mouse").style.left = "0%"; //moves the menu bar over with the menu
  document.getElementById("mouseBlur").style.left = "0%"; //moves the menu bar over with the menu
  document.getElementById("mouse").style.boxShadow = "-4px 1px 15px -3px rgba(0,0,0,0.5)";
}
