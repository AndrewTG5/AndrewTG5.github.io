var themePref = localStorage.getItem("themePref");
var bgPref = localStorage.getItem("bgPref");

function dark() {
  //function to set dark theme
  var root = document.documentElement;

  document.getElementById("mySidenav").style.backgroundColor = "rgba(0, 0, 0, 0.2)";

  root.style.setProperty('--mainText', "rgb(255, 255, 255)");
  root.style.setProperty('--mainIMG', "rgba(0, 0, 0, 0.6)");
  root.style.setProperty('--textInvert', "rgb(0, 0, 0)");
}

function light() {
  //function to set light theme
  var root = document.documentElement;

  document.getElementById("mySidenav").style.backgroundColor = "rgba(255, 255, 255, 0.1)";

  root.style.setProperty('--mainText', "rgb(0, 0, 0)");
  root.style.setProperty('--mainIMG', "rgba(255, 255, 255, 0.4)");
  root.style.setProperty('--textInvert', "rgb(255, 255, 255)");

}

function bgSelector(background) {
  document.querySelector("html").removeAttribute("class");
  document.querySelector("html").classList.add(background);
  localStorage.setItem("bgPref", background);
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

function start() {
  //closes nav and sets theme
  navLoader();
  if (bgPref || bgPref === "") {
    bgSelector(bgPref);
  }
  else {
    bgSelector("mint");
  }
  
  if (themePref == "dark") {
    dark();
  } else {
    light();
  }
}

function navLoader() {
  //loads pages from an array and appends them to the menu
  var pages = ["index.php", "clubs.php", "signup.php", "settings.php"]; //page address
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