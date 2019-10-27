importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

workbox.precaching.precacheAndRoute([
  {
    "url": "404.html",
    "revision": "71da6effd54e4ca78fb57c29dde2944d"
  },
  {
    "url": "browserconfig.xml",
    "revision": "f6cb7eceb4b088672ff80964d878ccad"
  },
  {
    "url": "css.css",
    "revision": "645aa603148a9cee4f12c8281d42517d"
  },
  {
    "url": "evolocity.html",
    "revision": "73779ee1540523f60623493b9623deed"
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
    "revision": "ffdcd83bd2e6e89b2c26b50a9cd1806c"
  },
  {
    "url": "README.md",
    "revision": "755c973a45c4542764e6910851265f8b"
  },
  {
    "url": "robotics.html",
    "revision": "b97278ea16ebdb3a4f1b649356b851be"
  },
  {
    "url": "script.js",
    "revision": "43ed7b060c9134ec8c122173adb87af9"
  },
  {
    "url": "settings.html",
    "revision": "b37e91f26deedfada65363dc94367f21"
  },
  {
    "url": "signup.html",
    "revision": "2fb5fe768cd9e5c98f50e6e9860f5120"
  },
  {
    "url": "site.webmanifest",
    "revision": "c0a9a26f804a9e442d8f28b3858565d0"
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
