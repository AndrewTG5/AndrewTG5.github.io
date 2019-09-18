function openNav() {
  //function to open the navbar
  var navOpen = localStorage.getItem("navOpen");
  var soundPref = localStorage.getItem("soundPref");
  var hamburger = document.querySelector(".hamburger");
  hamburger.classList.add("is-active"); //triggers hamburger menu animation
  document.getElementById("mySidenav").style.width = "22%"; //size of the menu when open
  document.getElementById("mouse").style.left = "22%"; //moves the menu bar over with the menu
  document.getElementById("mouseBlur").style.left = "22%"; //moves the menu bar over with the menu
  document.getElementById("mouse").style.boxShadow = "4px 1px 15px -5px rgba(0,0,0,0.5), 50vw 0px 0px 50vw rgba(0,0,0,0.3)";
  if (navOpen == "0") {
    localStorage.setItem("navOpen", "1");
    if (soundPref == "on") {
      open.play();
      console.log("open.play");
    }
  }
}

function closeNav() {
  //function to close the navbar
  var navOpen = localStorage.getItem("navOpen");
  var soundPref = localStorage.getItem("soundPref");
  var hamburger = document.querySelector(".hamburger");
  hamburger.classList.remove("is-active"); //triggers hamburger menu animation
  document.getElementById("mySidenav").style.width = "0%"; //size of the menu when closed
  document.getElementById("mouse").style.left = "0"; //moves the menu bar over with the menu
  document.getElementById("mouseBlur").style.left = "0"; //moves the menu bar over with the menu
  document.getElementById("mouse").style.boxShadow = "-4px 1px 15px -3px rgba(0,0,0,0.5), 50vw 0px 0px 50vw rgba(0,0,0,0)";
  if (navOpen == "1") {
    localStorage.setItem("navOpen", "0");
    if (soundPref == "on") {
      close.play();
      console.log("close.play");
    }
  }
}

function playHover() {
  //function to play a sound when menu item hovered
  var soundPref = localStorage.getItem("soundPref");
  if (soundPref == "on") {
    hover.play();
    console.log("hover.play");
  }
}

function dark() {
  //function to set dark theme
  var root = document.documentElement;

  document.getElementById("mouse").style.backgroundColor = "rgba(0, 0, 0, 0.4)";
  document.getElementById("mySidenav").style.backgroundColor = "rgba(0, 0, 0, 0.1)";
  document.querySelector("html").style.background = "linear-gradient(-45deg, rgb(213, 94, 57), rgb(207, 35, 101), rgb(10, 141, 187), rgb(10, 187, 146))";
  document.querySelector("html").style.backgroundSize = "400% 400%";

  root.style.setProperty('--mainText', "rgb(255, 255, 255)");
  root.style.setProperty('--mainIMG', "rgba(0, 0, 0, 0.6)");
  root.style.setProperty('--textInvert', "rgb(0, 0, 0)");
}

function light() {
  //function to set light theme
  var root = document.documentElement;

  document.getElementById("mouse").style.backgroundColor = "rgba(255, 255, 255, 0.3)";
  document.getElementById("mySidenav").style.backgroundColor = "rgba(255, 255, 255, 0.1)";
  document.querySelector("html").style.background = "linear-gradient(-45deg, rgb(238, 119, 82), rgb(231, 60, 126), rgb(35, 166, 213), rgb(35, 213, 171))";
  document.querySelector("html").style.backgroundSize = "400% 400%";

  root.style.setProperty('--mainText', "rgb(0, 0, 0)");
  root.style.setProperty('--mainIMG', "rgba(255, 255, 255, 0.4)");
  root.style.setProperty('--textInvert', "rgb(255, 255, 255)");

}

function start() {
  //closes nav and sets theme
  closeNav();
  if (themePref == "dark") {
    dark();
  } else {
    light();
  }
}

function bannerOffline() {
  bannerText = "🔥 You are offline, site may be outdated";
  createUIPrompt();
}

function createUIPrompt() {
  var div = document.createElement("DIV");
  div.innerHTML = bannerText;
  div.setAttribute("id", "banner");
  div.className = ("banner");
  document.body.appendChild(div);

  var btn = document.createElement("SPAN");
  btn.innerHTML = "Dismiss";
  btn.className = ("closebtn");
  document.getElementById("banner").appendChild(btn);
  btn.onclick = dismissUIPrompt;

  var banner = document.getElementById("banner");

  setTimeout(function() {
    banner.style.padding = "20px 20px 20px 7.5vw";
    banner.style.height = "auto";
  }, 300);
}

function dismissUIPrompt() {
  var banner = document.getElementById("banner");
  banner.style.padding = "0 20px 0 7.5vw";
  banner.style.height = "0"
  setTimeout(function() {
    banner.remove();
    bannerText = "This can say anything";
  }, 300);
}

function openDrawer() {
  var drawer = document.getElementById("Drawer");
  drawer.style.maxHeight = "500px";
}

function closeDrawer() {
  var drawer = document.getElementById("Drawer");
  drawer.style.maxHeight = "0px";
}

var themePref = localStorage.getItem("themePref");
var soundPref = localStorage.getItem("soundPref");
var navOpen = localStorage.setItem("navOpen", "1");

var bannerText = "This can say anything";

var close = new Audio('sounds/close.mp3');
var hover = new Audio('sounds/hover.mp3');
var open = new Audio('sounds/open.mp3');

window.addEventListener('offline', bannerOffline);
