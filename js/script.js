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

// eslint-disable-next-line no-unused-vars
function createUIPrompt(message) {
  const notif = document.getElementById('notif');
  notif.innerHTML += message;
  notif.style.display = 'initial';
  setTimeout(function() {
    notif.style.bottom = '4vw';
    notif.style.opacity = '1';
  }, 100);
}

// eslint-disable-next-line no-unused-vars
function dismissUIPrompt() {
  const notif = document.getElementById('notif');
  notif.style.bottom = '-8vw';
  notif.style.opacity = '0';
  setTimeout(function() {
    notif.style.display = 'none';
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
    bgSelector('mint');// default background
  }

  if (themePref == 'dark') {
    dark();
  } else {
    light();
  }
}

function navLoader() {
  //  loads pages from an array and appends them to the menu
  const pages = ['index.php', 'clubs.php', 'signup.php', 'settings.php']; //  page address
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
