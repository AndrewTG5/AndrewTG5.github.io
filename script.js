function openNav() {
  var soundPref = localStorage.getItem("soundPref");
  var hamburger = document.querySelector(".hamburger");
  hamburger.classList.add("is-active"); //triggers hamburger menu animation
  document.getElementById("mySidenav").style.width = "22%"; //size of the menu when open
  document.getElementById("mouse").style.left = "22%"; //moves the menu bar over with the menu
  document.getElementById("mouseBlur").style.left = "22%"; //moves the menu bar over with the menu
  document.getElementById("mouse").style.boxShadow = "4px 1px 15px -5px rgba(0,0,0,0.5)";
  if (soundPref == "on") {
    open.play();
    console.log("open.play");
  }
}

function closeNav() {
  var soundPref = localStorage.getItem("soundPref");
  var hamburger = document.querySelector(".hamburger");
  hamburger.classList.remove("is-active"); //triggers hamburger menu animation
  document.getElementById("mySidenav").style.width = "0%"; //size of the menu when closed
  document.getElementById("mouse").style.left = "0"; //moves the menu bar over with the menu
  document.getElementById("mouseBlur").style.left = "0"; //moves the menu bar over with the menu
  document.getElementById("mouse").style.boxShadow = "-4px 1px 15px -3px rgba(0,0,0,0.5)";
  if (soundPref == "on") {
    close.play();
    console.log("close.play");
  }
}

function playHover() {
  var soundPref = localStorage.getItem("soundPref");
  if (soundPref == "on") {
    hover.play();
    console.log("hover.play");
  }
}

function dark() {
  var bodytext = document.querySelectorAll(".bodyText");
  var bodyimg = document.querySelectorAll(".bodyImg");
  var p = document.querySelectorAll("p");
  var i;

  document.getElementById("mouse").style.backgroundColor = "rgba(0, 0, 0, 0.4)";
  document.getElementById("mySidenav").style.backgroundColor = "rgba(0, 0, 0, 0.1)";
  document.querySelector("html").style.background = "linear-gradient(-45deg, #D55E39, #CE2365, #0A8DBC, #0ABC92)";
  document.querySelector("html").style.backgroundSize = "400% 400%";

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
  var bodyimg = document.querySelectorAll(".bodyImg");
  var p = document.querySelectorAll("p");
  var i;

  document.getElementById("mouse").style.backgroundColor = "rgba(255, 255, 255, 0.3)";
  document.getElementById("mySidenav").style.backgroundColor = "rgba(255, 255, 255, 0.1)";
  document.querySelector("html").style.background = "linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB)";
  document.querySelector("html").style.backgroundSize = "400% 400%";

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

function start() {
  closeNav();
  if (userPref == "dark") {
    dark();
  } else {
    light();
  }
}

function toggleSound() {
  var soundPref = localStorage.getItem("soundPref");
  if (soundPref == "on") {
    localStorage.setItem("soundPref", "off");
    console.log("togglesound(); soundpref =  on; now off");
  } else {
    localStorage.setItem("soundPref", "on");
    console.log("togglesound(); soundpref =  off; now on");
  }
}

var userPref = localStorage.getItem("userPref");
var soundPref = localStorage.getItem("soundPref");

var close = new Audio('sounds/close.mp3');
var hover = new Audio('sounds/hover.mp3');
var open = new Audio('sounds/open.mp3');
