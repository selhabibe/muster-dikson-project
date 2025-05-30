// Service Worker for Muster & Dikson Website
// Provides caching and offline functionality

const CACHE_NAME = 'muster-dikson-v1.0.0';
const STATIC_CACHE_NAME = 'muster-dikson-static-v1.0.0';

// Assets to cache immediately
const STATIC_ASSETS = [
    '/',
    '/css/demo34.min.css',
    '/css/combined.min.css',
    '/js/combined.min.js',
    '/vendor/template/jquery/jquery.min.js',
    '/vendor/template/fontawesome-free/css/all.min.css',
    '/images/logo/M_D_Logo_white_font.png',
    '/images/front/social-share-default.jpg'
];

// Assets to cache on first request
const DYNAMIC_CACHE_PATTERNS = [
    /\/images\//,
    /\/css\//,
    /\/js\//,
    /\/vendor\//,
    /\/fonts\//
];

// Install event - cache static assets
self.addEventListener('install', event => {
    console.log('Service Worker installing...');
    
    event.waitUntil(
        caches.open(STATIC_CACHE_NAME)
            .then(cache => {
                console.log('Caching static assets...');
                return cache.addAll(STATIC_ASSETS);
            })
            .then(() => {
                console.log('Static assets cached successfully');
                return self.skipWaiting();
            })
            .catch(error => {
                console.error('Failed to cache static assets:', error);
            })
    );
});

// Activate event - clean up old caches
self.addEventListener('activate', event => {
    console.log('Service Worker activating...');
    
    event.waitUntil(
        caches.keys()
            .then(cacheNames => {
                return Promise.all(
                    cacheNames.map(cacheName => {
                        if (cacheName !== CACHE_NAME && cacheName !== STATIC_CACHE_NAME) {
                            console.log('Deleting old cache:', cacheName);
                            return caches.delete(cacheName);
                        }
                    })
                );
            })
            .then(() => {
                console.log('Service Worker activated');
                return self.clients.claim();
            })
    );
});

// Fetch event - serve from cache or network
self.addEventListener('fetch', event => {
    const { request } = event;
    const url = new URL(request.url);
    
    // Skip non-GET requests
    if (request.method !== 'GET') {
        return;
    }
    
    // Skip external requests
    if (url.origin !== location.origin) {
        return;
    }
    
    // Handle different types of requests
    if (isStaticAsset(request.url)) {
        event.respondWith(cacheFirstStrategy(request));
    } else if (isAPIRequest(request.url)) {
        event.respondWith(networkFirstStrategy(request));
    } else {
        event.respondWith(staleWhileRevalidateStrategy(request));
    }
});

// Cache strategies
function cacheFirstStrategy(request) {
    return caches.match(request)
        .then(cachedResponse => {
            if (cachedResponse) {
                return cachedResponse;
            }
            
            return fetch(request)
                .then(response => {
                    if (response.status === 200) {
                        const responseClone = response.clone();
                        caches.open(STATIC_CACHE_NAME)
                            .then(cache => {
                                cache.put(request, responseClone);
                            });
                    }
                    return response;
                })
                .catch(() => {
                    // Return offline fallback if available
                    return caches.match('/offline.html');
                });
        });
}

function networkFirstStrategy(request) {
    return fetch(request)
        .then(response => {
            if (response.status === 200) {
                const responseClone = response.clone();
                caches.open(CACHE_NAME)
                    .then(cache => {
                        cache.put(request, responseClone);
                    });
            }
            return response;
        })
        .catch(() => {
            return caches.match(request);
        });
}

function staleWhileRevalidateStrategy(request) {
    return caches.match(request)
        .then(cachedResponse => {
            const fetchPromise = fetch(request)
                .then(response => {
                    if (response.status === 200) {
                        const responseClone = response.clone();
                        caches.open(CACHE_NAME)
                            .then(cache => {
                                cache.put(request, responseClone);
                            });
                    }
                    return response;
                });
            
            return cachedResponse || fetchPromise;
        });
}

// Helper functions
function isStaticAsset(url) {
    return DYNAMIC_CACHE_PATTERNS.some(pattern => pattern.test(url));
}

function isAPIRequest(url) {
    return url.includes('/api/') || url.includes('/cart/') || url.includes('/newsletter/');
}

// Background sync for offline actions
self.addEventListener('sync', event => {
    if (event.tag === 'background-sync') {
        event.waitUntil(doBackgroundSync());
    }
});

function doBackgroundSync() {
    // Handle offline actions when connection is restored
    return new Promise((resolve) => {
        console.log('Background sync triggered');
        resolve();
    });
}

// Push notifications (if needed in the future)
self.addEventListener('push', event => {
    if (event.data) {
        const data = event.data.json();
        const options = {
            body: data.body,
            icon: '/images/logo/M_D_Logo_white_font.png',
            badge: '/images/logo/M_D_Logo_white_font.png',
            vibrate: [100, 50, 100],
            data: {
                dateOfArrival: Date.now(),
                primaryKey: data.primaryKey
            }
        };
        
        event.waitUntil(
            self.registration.showNotification(data.title, options)
        );
    }
});

// Notification click handler
self.addEventListener('notificationclick', event => {
    event.notification.close();
    
    event.waitUntil(
        clients.openWindow('/')
    );
});

console.log('Service Worker loaded successfully');
