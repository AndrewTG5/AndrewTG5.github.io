const themePref = localStorage.getItem('themePref');
const bgPref = localStorage.getItem('bgPref');

function dark() {
  //  function to set dark theme
  const root = document.documentElement;

  document.getElementById('myNavbar').style.backgroundColor = 'rgba(0, 0, 0, 0.2)';

  root.style.setProperty('--mainText', 'rgb(255, 255, 255)');
  root.style.setProperty('--mainIMG', 'rgba(0, 0, 0, 0.6)');
  root.style.setProperty('--textInvert', 'rgb(0, 0, 0)');
}

function light() {
  //  function to set light theme
  const root = document.documentElement;

  document.getElementById('myNavbar').style.backgroundColor = 'rgba(255, 255, 255, 0.1)';

  root.style.setProperty('--mainText', 'rgb(0, 0, 0)');
  root.style.setProperty('--mainIMG', 'rgba(255, 255, 255, 0.4)');
  root.style.setProperty('--textInvert', 'rgb(255, 255, 255)');
}

function bgSelector(background) {
  //  function to set background theme
  document.querySelector('html').removeAttribute('class');
  document.querySelector('html').classList.add(background);
  localStorage.setItem('bgPref', background);
}

function createUIPrompt(message) {
  const notif = document.createElement('div');
  notif.setAttribute("id", "notif");
  notif.style.display = 'none';

  const svgx = document.createElementNS("http://www.w3.org/2000/svg", "svg");
  svgx.setAttribute('xmlns','http://www.w3.org/2000/svg');
  svgx.setAttribute('class','icon icon-tabler icon-tabler-x');
  svgx.setAttribute('width','40');
  svgx.setAttribute('height','40');
  svgx.setAttribute('viewbox','0 0 24 24');
  svgx.setAttribute('stroke-width','1');
  svgx.setAttribute('stroke','currentColor');
  svgx.setAttribute('fill','none');
  svgx.setAttribute('stroke-linecap','round');
  svgx.setAttribute('stroke-linejoin','round');
  svgx.setAttribute('onclick','dismissUIPrompt()');
  svgx.innerHTML = '<path stroke="none" d="M0 0h24v24H0z" /><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" />';

  const svgc = document.createElementNS("http://www.w3.org/2000/svg", "svg");
  svgc.setAttribute('xmlns','http://www.w3.org/2000/svg');
  svgc.setAttribute('class','icon icon-tabler icon-tabler-alert-circle');
  svgc.setAttribute('width','24');
  svgc.setAttribute('height','24');
  svgc.setAttribute('viewbox','0 0 24 24');
  svgc.setAttribute('stroke-width','1.5');
  svgc.setAttribute('stroke','currentColor');
  svgc.setAttribute('fill','none');
  svgc.setAttribute('stroke-linecap','round');
  svgc.setAttribute('stroke-linejoin','round');
  svgc.innerHTML = '<path stroke="none" d="M0 0h24v24H0z" /><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12" y2="12" /><line x1="12" y1="16" x2="12.01" y2="16" />';

  notif.appendChild(svgx);
  notif.appendChild(svgc);

  document.body.appendChild(notif);

  notif.innerHTML += message;
  notif.style.display = 'initial';
  setTimeout(function() {
    notif.style.bottom = '4vw';
    notif.style.opacity = '1';
  }, 100);
  setTimeout(function() {
    dismissUIPrompt();
  }, 5000);
}

function dismissUIPrompt() {
  const notif = document.getElementById('notif');
  notif.style.bottom = '-8vw';
  notif.style.opacity = '0';
  setTimeout(function() {
    notif.style.display = 'none';
    notif.remove();
  }, 500);
}

document.addEventListener('DOMContentLoaded', (_event) => {
  start();
  window.onscroll = function() {
    stickNav();
  };
  //  sticky navbar stuff
  const navbar = document.getElementById('myNavbar');
  const sticky = navbar.offsetTop;

  function stickNav() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add('sticky');
    } else {
      navbar.classList.remove('sticky');
    }
  }
});

function start() {
  navLoader();
  if (bgPref || bgPref === '') {
    bgSelector(bgPref);
  } else {
    bgSelector('default');// default background
  }

  if (themePref == null && window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches || themePref == 'dark') {
    dark();
    localStorage.setItem("themePref", "dark");
  }
}

function navLoader() {
  //  loads pages from an array and appends them to the menu
  const pages = ['index.html', 'clubs.html', 'signup.html', 'settings.html']; //  page address
  const pageTitle = ['Home', 'Clubs', 'Signup', 'Settings']; // page name in menu
  let i;

  const path = window.location.pathname;
  const page = path.split('/').pop();

  for (i = 0; i < pages.length; i++) {
    const a = document.createElement('a');
    const link = document.createTextNode(pageTitle[i]);
    a.appendChild(link);
    a.title = pageTitle[i];
    a.href = pages[i];
    if (page == pages[i]) {
      a.className = ('active');
    }
    document.getElementById('myNavbar').appendChild(a);
  }
}