importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

workbox.precaching.precacheAndRoute([
  {
    "url": "404.html",
    "revision": "a9c26a616fe1ed3c77bba4d53a040719"
  },
  {
    "url": "browserconfig.xml",
    "revision": "f6cb7eceb4b088672ff80964d878ccad"
  },
  {
    "url": "css.css",
    "revision": "c506d704fe830b403a580a06565fe072"
  },
  {
    "url": "evolocity.html",
    "revision": "3d7d67e716221e3d1204c6aa606e18c7"
  },
  {
    "url": "fonts/product_sans_bold_italic-webfont.woff",
    "revision": "ae615f18b277c846601f557a0efc76b9"
  },
  {
    "url": "fonts/product_sans_bold_italic-webfont.woff2",
    "revision": "c54cc5e20e1ce396a647d0e99d3bf8a8"
  },
  {
    "url": "fonts/product_sans_bold-webfont.woff",
    "revision": "37e081a04caf65abb3545f4b0de07635"
  },
  {
    "url": "fonts/product_sans_bold-webfont.woff2",
    "revision": "3e5d7d353a832ab60db7e8cefe10f632"
  },
  {
    "url": "fonts/product_sans_italic-webfont.woff",
    "revision": "f5a8d03fb93c98c8c7dc47eff9b2ae2c"
  },
  {
    "url": "fonts/product_sans_italic-webfont.woff2",
    "revision": "e8b79620bc06967abb8d147bdd6a3eb2"
  },
  {
    "url": "fonts/product_sans_regular-webfont.woff",
    "revision": "ddb25bfd31a09d42a84ae8ef90ec45aa"
  },
  {
    "url": "fonts/product_sans_regular-webfont.woff2",
    "revision": "ee19512fffcb2f098a06be5d47ecf41d"
  },
  {
    "url": "fonts/specimen_files/grid_12-825-55-15.css",
    "revision": "45e9422c89bf16e8067b6ca13c6a7405"
  },
  {
    "url": "fonts/specimen_files/specimen_stylesheet.css",
    "revision": "e2cb9ea14b546a77ddd7e9dfc8c0d32f"
  },
  {
    "url": "fonts/stylesheet.css",
    "revision": "adfd32d71bcf0c8f9ceddf3650119bee"
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
    "url": "img/ph.png",
    "revision": "1d9a793c6dc1692e45ec527f92fdb646"
  },
  {
    "url": "index.html",
    "revision": "3f783b72a6d3857e1afee5cffcc1730e"
  },
  {
    "url": "js/bg.js",
    "revision": "398022754408ef17afd004559c9a9aa7"
  },
  {
    "url": "js/script.js",
    "revision": "69aa50d323b2ea54bdd22e44304b0401"
  },
  {
    "url": "README.md",
    "revision": "755c973a45c4542764e6910851265f8b"
  },
  {
    "url": "robotics.html",
    "revision": "42695dd6990de522fe25f927207d35bc"
  },
  {
    "url": "settings.html",
    "revision": "0c95153caa0c0eb4ce5c2f255a513acf"
  },
  {
    "url": "signup.html",
    "revision": "23b7ccd7ad80203bc152f88f9be0e9bf"
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
