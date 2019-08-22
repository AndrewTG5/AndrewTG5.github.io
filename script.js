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
var bodytext = document.querySelectorAll(".bodyText");
var bodyimg  = document.querySelectorAll(".bodyImg");
var p = document.querySelectorAll("p");
var i;
themePref = 1;

document.getElementById("mouse").style.backgroundColor = "rgba(0, 0, 0, 0.4)";
document.getElementById("mySidenav").style.backgroundColor = "rgba(0, 0, 0, 0.1)";

  for (i = 0; i < bodytext.length; i++) {
    bodytext[i].style.background = "rgba(0, 0, 0, 0.6)";
  }
  for (i = 0; i < bodyimg.length; i++) {
    bodyimg[i].style.background = "rgba(0, 0, 0, 0.6)";
  }
  for (i = 0; i < p.length; i++) {
    p[i].style.color = "rgba(235, 235, 235, 0.8)";
  }

}

function light() {
var bodytext = document.querySelectorAll(".bodyText");
var bodyimg  = document.querySelectorAll(".bodyImg");
var p = document.querySelectorAll("p");
var i;
themePref = 0;

document.getElementById("mouse").style.backgroundColor = "rgba(255, 255, 255, 0.3)";
document.getElementById("mySidenav").style.backgroundColor = "rgba(255, 255, 255, 0.1)";


  for (i = 0; i < bodytext.length; i++) {
    bodytext[i].style.background = "rgba(255,255,255,0.4)";
  }
  for (i = 0; i < bodyimg.length; i++) {
    bodyimg[i].style.background = "rgba(255,255,255,0.4)";
  }
  for (i = 0; i < p.length; i++) {
    p[i].style.color = "rgb(0, 0, 0)";
  }
}

function checkMedia() {
  if (pref.matches) {
    themePref = 1
  }
    else {
      themePref = 0
    }
  }

function theme() {
  if (themePref == 1) {
    light()
  }
    else {
      dark()
  }
}

var themePref = 0
var pref = window.matchMedia("(prefers-color-scheme: dark)")
checkMedia(pref)
pref.addListener(checkMedia)
