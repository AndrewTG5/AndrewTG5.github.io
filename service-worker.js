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
