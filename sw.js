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
  event.respondWith(
    fetch(event.request).catch(function() {
      return caches.match(event.request);
    })
  );
});
