function openNav() {
  var hamburger = document.querySelector(".hamburger");
  hamburger.classList.add("is-active");
  document.getElementById("mySidenav").style.width = "22%"; //size of the menu when open
  document.getElementById("mouse").style.left = "22%"; //moves the menu bar over with the menu
}

function closeNav() {
  var hamburger = document.querySelector(".hamburger");
  hamburger.classList.remove("is-active");
  document.getElementById("mySidenav").style.width = "0%"; //size of the menu when closed
  document.getElementById("mouse").style.left = "0%"; //moves the menu bar over with the menu
}
