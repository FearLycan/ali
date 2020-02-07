var CACHE_NAME = 'AliGoneWild-cache';
var urlsToCache = [
    '/',
    '/css/style.css',
    '/lib/easy-autocomplete/easy-autocomplete.min.css',
    '/css/font-awesome.min.css',
    '/css/site.css',
    '/lib/jquery.lazy/jquery.lazy.min.js',
    '/js/masonry-docs.min.js',
    '/js/infinite-scroll.pkgd.min.js',
    '/lib/easy-autocomplete/jquery.easy-autocomplete.min.js',
    '/js/main.js',
    '/js/grid.js',
    '/lib/isotope/dist/isotope.pkgd.js',
    'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700',
    'https://fonts.googleapis.com/css?family=Volkhov:400i',
    'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'
];

self.addEventListener('install', function (event) {
    // Perform install steps
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(function (cache) {
                var x = cache.addAll(urlsToCache);
                return x;
            })
    );
});

self.addEventListener('fetch', function (event) {
    event.respondWith(
        caches.match(event.request)
            .then(function (response) {
                    // Cache hit - return response
                    if (response) {
                        return response;
                    }
                    return fetch(event.request);
                }
            )
    );
});
