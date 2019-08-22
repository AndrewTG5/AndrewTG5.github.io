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
  document.getElementById("mouse").style.left = "0"; //moves the menu bar over with the menu
  document.getElementById("mouseBlur").style.left = "0"; //moves the menu bar over with the menu
  document.getElementById("mouse").style.boxShadow = "-4px 1px 15px -3px rgba(0,0,0,0.5)";
}

function dark() {
  var oldlink = document.getElementById("css");
  var newlink = document.createElement("link");
  var mode = document.getElementById("mode");
  var light = "light()";
  var dark = "toggle.css";

  newlink.setAttribute("rel", "stylesheet");
  newlink.setAttribute("href", dark);
  newlink.setAttribute("id", "css");

  mode.setAttribute("onclick", light);

  document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
}

function light() {
  var oldlink = document.getElementById("css");
  var newlink = document.createElement("link");
  var mode = document.getElementById("mode");
  var dark = "dark()";
  var light = "css.css";

  newlink.setAttribute("rel", "stylesheet");
  newlink.setAttribute("href", light);
  newlink.setAttribute("id", "css");

  mode.setAttribute("onclick", dark);

  document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
}
