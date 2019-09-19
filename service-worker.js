importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

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

self.addEventListener('install', (event) => {
  console.log("warm");
  const urls = [index.html, evolocity.html, robotics.html, settings.html, script.js, css.css];
  const cacheName = main-cache;
  event.waitUntil(caches.open(cacheName).then((cache) => cache.addAll(urls)));
});
