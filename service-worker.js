importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

workbox.precaching.precacheAndRoute([
  {
    "url": "404.html",
    "revision": "fc14961ce7e93f3936878d9ee68a733d"
  },
  {
    "url": "browserconfig.xml",
    "revision": "50a9ff381a1e81db6661287e7c50e78d"
  },
  {
    "url": "css.css",
    "revision": "27fcb3e54d1b712a3ee46ccee3857264"
  },
  {
    "url": "evolocity.html",
    "revision": "4d26cab416dbc6b92319009724449370"
  },
  {
    "url": "img/android-chrome-192x192.png",
    "revision": "588ffbcf644e29c1a1ea38a20a89f519"
  },
  {
    "url": "img/android-chrome-512x512.png",
    "revision": "d44cc477c19fe99280010735eda66b6a"
  },
  {
    "url": "img/apple-touch-icon.png",
    "revision": "ffb54c178723fe071726e5a884b3bcef"
  },
  {
    "url": "img/favicon-16x16.png",
    "revision": "8e7f45a80eeb52e847fd71205e92e360"
  },
  {
    "url": "img/favicon.ico",
    "revision": "6f4c928202529be2d9fd341358f0b6bb"
  },
  {
    "url": "img/favicon.png",
    "revision": "0cff3693d19344342062a4162c276467"
  },
  {
    "url": "img/logo.png",
    "revision": "9b611ddf812a2d610c2085fa084d552a"
  },
  {
    "url": "img/mstile-150x150.png",
    "revision": "85562b286fb13d2b618160925032bdbe"
  },
  {
    "url": "img/vid.png",
    "revision": "7fd1810d471caa55b5e27810f6837866"
  },
  {
    "url": "index.html",
    "revision": "e9cd3b1ad3a2b6ab26f91d2800f6671c"
  },
  {
    "url": "js/script.js",
    "revision": "138c0b46c69abc781c6cc99af76c97cd"
  },
  {
    "url": "README.md",
    "revision": "a8d438f48cc4ed769c785978690f5056"
  },
  {
    "url": "robotics.html",
    "revision": "fc6d5f5326397ec5c41e582853009982"
  },
  {
    "url": "settings.html",
    "revision": "973a623e1e7cdea401394c899fede3fc"
  },
  {
    "url": "signup.html",
    "revision": "f32c12c9272f0e11ba56d6e06e9ca61d"
  },
  {
    "url": "site.webmanifest",
    "revision": "49ded6e6d329dd25eea73db6a9204ba2"
  },
  {
    "url": "sounds/close.mp3",
    "revision": "33616695a0de16662e4fb6194cc985e2"
  },
  {
    "url": "sounds/hover.mp3",
    "revision": "a7e508fdf6acc76cfbcc345039ede9b5"
  },
  {
    "url": "sounds/open.mp3",
    "revision": "b1e7c97d7bc89ba3f0619891feb563c0"
  }
]);

addEventListener('message', (event) => {
  if (event.data && event.data.type === 'SKIP_WAITING') {
    skipWaiting();
  }
});
