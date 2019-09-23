importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

workbox.precaching.precacheAndRoute([{
    "url": "404.html",
    "revision": "ea142011b64d76a648d95eba63189fac"
  },
  {
    "url": "css.css",
    "revision": "aa8717a4b67190b1ab874ce87d30e0ce"
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
    "revision": "5fe87e4386dba780afb184c22d91ee9b"
  },
  {
    "url": "settings.html",
    "revision": "62907b0ce6695e5804e7a5dcf52593ca"
  },
  {
    "url": "signup.html",
    "revision": "4684a42498c887e4d1632c9b004c294f"
  },
  {
    "url": "site.webmanifest",
    "revision": "49ded6e6d329dd25eea73db6a9204ba2"
  }
]);

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
    console.log("skipWaiting")
  }
});
