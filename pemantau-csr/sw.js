const CACHE_NAME = 'csr-website-v1';
const urlsToCache = [
    '/',
    '/wp-content/themes/your-theme/style.css',
    '/wp-content/themes/your-theme/enhanced-effects.js',
    // Add other static assets
];

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => cache.addAll(urlsToCache))
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                if (response) {
                    return response;
                }
                return fetch(event.request);
            })
    );
});
