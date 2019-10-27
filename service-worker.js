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
    "revision": "6c6500b99af22a1ffcf7595e75dadcbf"
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
    "url": "img/evolocity.png",
    "revision": "1e18af1f408805497ef45533689f25d6"
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
    "url": "img/mstile-150x150.png",
    "revision": "85562b286fb13d2b618160925032bdbe"
  },
  {
    "url": "img/robot.webp",
    "revision": "690813fe3639ce1a009298748e9c6f7b"
  },
  {
    "url": "index.html",
    "revision": "4e9cdcd7b2ae25a80d143cf787de48d1"
  },
  {
    "url": "README.md",
    "revision": "755c973a45c4542764e6910851265f8b"
  },
  {
    "url": "robotics.html",
    "revision": "bdca09b8ceeedd157ce124ccb30d4a9f"
  },
  {
    "url": "script.js",
    "revision": "43ed7b060c9134ec8c122173adb87af9"
  },
  {
    "url": "settings.html",
    "revision": "019f9c767e71eb8d1df993d92480dac0"
  },
  {
    "url": "signup.html",
    "revision": "0318cb15102ae9946539c4f2e6014ea7"
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
