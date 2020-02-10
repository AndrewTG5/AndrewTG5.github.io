function openNav() {
  var navOpen = sessionStorage.getItem("navOpen");
  var soundPref = localStorage.getItem("soundPref");
  document.querySelector(".hamburger").classList.add("is-active"); //triggers hamburger menu animation
  document.getElementById("mySidenav").style.width = "22vw"; //size of the menu when open
  document.getElementById("mouse").style.left = "22vw"; //moves the menu bar over with the menu
  document.getElementById("mouse").style.boxShadow = "0 6.4px 14.4px 0 rgba(0,0,0,.132), 0 1.2px 3.6px 0 rgba(0,0,0,.108), 50vw 0px 0px 50vw rgba(0,0,0,0.3)";
  if (navOpen == "0") {
    sessionStorage.setItem("navOpen", "1");
    if (soundPref == "on") {
      open.play();
    }
  }
}

function closeNav() {
  var navOpen = sessionStorage.getItem("navOpen");
  var soundPref = localStorage.getItem("soundPref");
  document.querySelector(".hamburger").classList.remove("is-active"); //triggers hamburger menu animation
  document.getElementById("mySidenav").style.width = "0"; //size of the menu when closed
  document.getElementById("mouse").style.left = "0"; //moves the menu bar over with the menu
  document.getElementById("mouse").style.boxShadow = "0 6.4px 14.4px 0 rgba(0,0,0,.132), 0 1.2px 3.6px 0 rgba(0,0,0,.108), 50vw 0px 0px 50vw rgba(0,0,0,0)";
  if (navOpen == "1") {
    sessionStorage.setItem("navOpen", "0");
    if (soundPref == "on") {
      close.play();
    }
  }
}

function playHover() {
  var soundPref = localStorage.getItem("soundPref");
  if (soundPref == "on") {
    hover.pause();
    hover.currentTime = 0;
    hover.play();
  }
}

function dark() { //need to improve these lots
  //function to set dark theme
  var root = document.documentElement;

  document.getElementById("mySidenav").style.backgroundColor = "rgba(0, 0, 0, 0.2)";
  document.querySelector("html").style.background = "linear-gradient(-45deg, rgb(213, 94, 57), rgb(207, 35, 101), rgb(10, 141, 187), rgb(10, 187, 146))";
  document.querySelector("html").style.backgroundSize = "400% 400%";

  root.style.setProperty('--mainText', "rgb(255, 255, 255)");
  root.style.setProperty('--mainIMG', "rgba(0, 0, 0, 0.6)");
  root.style.setProperty('--textInvert', "rgb(0, 0, 0)");
}

function light() {
  //function to set light theme
  var root = document.documentElement;

  document.getElementById("mySidenav").style.backgroundColor = "rgba(255, 255, 255, 0.1)";
  document.querySelector("html").style.background = "linear-gradient(-45deg, rgb(238, 119, 82), rgb(231, 60, 126), rgb(35, 166, 213), rgb(35, 213, 171))";
  document.querySelector("html").style.backgroundSize = "400% 400%";

  root.style.setProperty('--mainText', "rgb(0, 0, 0)");
  root.style.setProperty('--mainIMG', "rgba(255, 255, 255, 0.4)");
  root.style.setProperty('--textInvert', "rgb(255, 255, 255)");

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
  }, 260);
}

function dismissUIPrompt() {
  var banner = document.getElementById("banner");
  banner.style.padding = "0 20px 0 7.5vw";
  banner.style.height = "0"
  setTimeout(function() {
    banner.remove();
    bannerText = "This can say anything";
  }, 260);
}

function openDrawer() {
  var drawer = document.getElementById("Drawer");
  drawer.style.maxHeight = "500px";
}

function closeDrawer() {
  var drawer = document.getElementById("Drawer");
  drawer.style.maxHeight = "0px";
}

document.addEventListener('DOMContentLoaded', (_event) => {
  start();
});

if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/service-worker.js');
  });
}

function start() {
  //closes nav and sets theme
  siteArrayLoader();
  closeNav();
  if (themePref == "dark") {
    dark();
  } else {
    light();
  }
  window.scrollTo(0,1);
}

function siteArrayLoader() {
  //loads pages from an array and appends them to the menu
  var pages = ["index.html", "page1.html", "page2.html"]; //page address
  var pageTitle = ["Home", "page1", "page2"]; //page name in menu
  var i;

  var path = window.location.pathname;
  var page = path.split("/").pop();

  for (i = 0; i < pages.length; i++) {
    var a = document.createElement('a');
    var link = document.createTextNode(pageTitle[i]);
    a.appendChild(link);
    a.title = pageTitle[i];
    a.href = pages[i];
    a.setAttribute("onmouseover", "playHover()");
    if (page == pages[i]) {
      a.className = ("active");
    }
    document.getElementById("mySidenav").appendChild(a);
  }
}

var themePref = localStorage.getItem("themePref");
var soundPref = localStorage.getItem("soundPref");
var navOpen = sessionStorage.setItem("navOpen", "1");

var close = new Audio('sounds/close.mp3');
var hover = new Audio('sounds/hover.mp3');
var open = new Audio('sounds/open.mp3');

var bannerText = "This can say anything";
