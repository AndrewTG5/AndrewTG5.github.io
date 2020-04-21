var themePref = localStorage.getItem("themePref");

function dark() {
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

function createUIPrompt(bannerText, buttonText) {
  var div = document.createElement("DIV");
  div.innerHTML = bannerText;
  div.setAttribute("id", "banner");
  div.className = ("banner");
  document.body.appendChild(div);

  var btn = document.createElement("SPAN");
  btn.innerHTML = buttonText;
  btn.className = ("closebtn");
  document.getElementById("banner").appendChild(btn);
  btn.onclick = dismissUIPrompt;

  var banner = document.getElementById("banner");

  setTimeout(function () {
    banner.style.padding = "20px 20px 20px 7.5vw";
    banner.style.height = "auto";
  }, 260);
}

function dismissUIPrompt() {
  var banner = document.getElementById("banner");
  banner.style.padding = "0 20px 0 7.5vw";
  banner.style.height = "0"
  setTimeout(function () {
    banner.remove();
  }, 260);
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
  if (themePref == "dark") {
    dark();
  } else {
    light();
  }
}

function siteArrayLoader() {
  //loads pages from an array and appends them to the menu
  var pages = ["index.html", "clubs.html", "signup.html", "settings.html"]; //page address
  var pageTitle = ["Home", "Clubs", "Signup", "Settings"]; //page name in menu
  var i;

  var path = window.location.pathname;
  var page = path.split("/").pop();

  for (i = 0; i < pages.length; i++) {
    var a = document.createElement('a');
    var link = document.createTextNode(pageTitle[i]);
    a.appendChild(link);
    a.title = pageTitle[i];
    a.href = pages[i];
    if (page == pages[i]) {
      a.className = ("active");
    }
    document.getElementById("mySidenav").appendChild(a);
  }
}

setTimeout(function () {
  window.onscroll = function () { stickNav() };
  var navbar = document.getElementById("mySidenav");
  var sticky = navbar.offsetTop;

  function stickNav() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }
}, 50);