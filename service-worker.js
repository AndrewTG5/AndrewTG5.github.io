if (!self.define) {
  const e = async e => {
    if ("require" !== e && (e += ".js"), !r[e] && (await new Promise(async i => {
        if ("document" in self) {
          const r = document.createElement("script");
          r.src = e, document.head.appendChild(r), r.onload = i
        } else importScripts(e), i()
      }), !r[e])) throw new Error(`Module ${e} didn’t register its module`);
    return r[e]
  }, i = async (i, r) => {
    const c = await Promise.all(i.map(e));
    r(1 === c.length ? c[0] : c)
  };
  i.toUrl = e => `./${e}`;
  const r = {
    require: Promise.resolve(i)
  };
  self.define = (i, c, s) => {
    r[i] || (r[i] = new Promise(async r => {
      let o = {};
      const n = {
          uri: location.origin + i.slice(1)
        },
        d = await Promise.all(c.map(i => "exports" === i ? o : "module" === i ? n : e(i))),
        a = s(...d);
      o.default || (o.default = a), r(o)
    }))
  }
}
define("./service-worker.js", ["./workbox-2aa9f459"], (function(e) {
  "use strict";
  self.addEventListener("message", e => {
    e.data && "SKIP_WAITING" === e.data.type && self.skipWaiting()
  }), e.precacheAndRoute([{
    url: "404.html",
    revision: "3ec9027c4ac61fbae49cc2a3ba394f0c"
  }, {
    url: "browserconfig.xml",
    revision: "50a9ff381a1e81db6661287e7c50e78d"
  }, {
    url: "css.css",
    revision: "a4db844b57452deea00b29afc49fb712"
  }, {
    url: "evolocity.html",
    revision: "cdad38a5eed9b280c025592b2e0828c0"
  }, {
    url: "img/android-chrome-192x192.png",
    revision: "588ffbcf644e29c1a1ea38a20a89f519"
  }, {
    url: "img/android-chrome-512x512.png",
    revision: "d44cc477c19fe99280010735eda66b6a"
  }, {
    url: "img/apple-touch-icon.png",
    revision: "ffb54c178723fe071726e5a884b3bcef"
  }, {
    url: "img/favicon-16x16.png",
    revision: "8e7f45a80eeb52e847fd71205e92e360"
  }, {
    url: "img/favicon.ico",
    revision: "6f4c928202529be2d9fd341358f0b6bb"
  }, {
    url: "img/favicon.png",
    revision: "0cff3693d19344342062a4162c276467"
  }, {
    url: "img/logo.png",
    revision: "9b611ddf812a2d610c2085fa084d552a"
  }, {
    url: "img/mstile-150x150.png",
    revision: "85562b286fb13d2b618160925032bdbe"
  }, {
    url: "img/vid.png",
    revision: "7fd1810d471caa55b5e27810f6837866"
  }, {
    url: "index.html",
    revision: "c4a90bdb256fd9c2c348f61f4713d000"
  }, {
    url: "js/script.js",
    revision: "fb9895472833bd45931023a8375c0d48"
  }, {
    url: "README.md",
    revision: "a8d438f48cc4ed769c785978690f5056"
  }, {
    url: "robotics.html",
    revision: "d72e4e217c78777aa48937440db497fb"
  }, {
    url: "settings.html",
    revision: "3750cb97e08d99c0b8ace7c2bad3add3"
  }, {
    url: "signup.html",
    revision: "3dbda36a2d8f02c1ea48ca68ab1de222"
  }, {
    url: "site.webmanifest",
    revision: "49ded6e6d329dd25eea73db6a9204ba2"
  }, {
    url: "sounds/close.mp3",
    revision: "33616695a0de16662e4fb6194cc985e2"
  }, {
    url: "sounds/hover.mp3",
    revision: "a7e508fdf6acc76cfbcc345039ede9b5"
  }, {
    url: "sounds/open.mp3",
    revision: "b1e7c97d7bc89ba3f0619891feb563c0"
  }], {})
}));
//# sourceMappingURL=service-worker.js.map
