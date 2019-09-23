importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

workbox.precaching.precacheAndRoute([
  {
    "url": "404.html",
    "revision": "a8192d935848ebc213a8f3268a86f524"
  },
  {
    "url": "browserconfig.xml",
    "revision": "50a9ff381a1e81db6661287e7c50e78d"
  },
  {
    "url": "css.css",
    "revision": "c9208a74d0992f3b3498752da1735bc2"
  },
  {
    "url": "evolocity.html",
    "revision": "d4bfcc941cd661c5eb551361b207aa48"
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
    "revision": "919b63cea3519927622e6b5c3e5dca3d"
  },
  {
    "url": "robotics.html",
    "revision": "63adb7ea293933f69ddb5c02eeb931d2"
  },
  {
    "url": "script.js",
    "revision": "b7676b8854618ba31db9f98d16d202d0"
  },
  {
    "url": "service-worker.js",
    "revision": "b5de4e7985c9eda6066a673f67a44730"
  },
  {
    "url": "settings.html",
    "revision": "cc68ec8ec7ae81d4e9e4fed6191dcda9"
  },
  {
    "url": "signup.html",
    "revision": "4684a42498c887e4d1632c9b004c294f"
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
])

workbox.routing.registerRoute(
  // Cache files.
  /\.(?:js|css|png|webp|html)$/,
  // Use cache but update in the background.
  new workbox.strategies.StaleWhileRevalidate({
    // Use a custom cache name.
    cacheName: 'main-cache',
  })
);

addEventListener('message', (event) => {
  if (event.data && event.data.type === 'SKIP_WAITING') {
    skipWaiting();
  }
});
