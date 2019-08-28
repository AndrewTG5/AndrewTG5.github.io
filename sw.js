self.addEventListener('install', function(e) {
  e.waitUntil(
    caches.open('KKCclubs').then(function(cache) {
      return cache.addAll([
        './',
        'index.html',
        'Evolocity.html',
        'Robotics.html',
        'css.css',
        'script.js',
        'settings.html',
        'browserconfig.xml',
        'site.webmanifest'
      ]);
    })
  );
});

self.addEventListener('fetch', function(event) {
  console.log(event.request.url);
  event.respondWith(
    caches.match(event.request).then(function(response) {
      return response || fetch(event.request);
    })
  );
});
