# Laravel (PWA) Progressive Web Application

[![Laravel 5.x](https://img.shields.io/badge/Laravel-5.x-orange.svg)](https://laravel.com/docs/5.8)
[![Laravel 6.x](https://img.shields.io/badge/Laravel-6.x-blue.svg)](https://laravel.com/docs/6.x)
[![Laravel 7.x](https://img.shields.io/badge/Laravel-7.x-red.svg)](https://laravel.com)
[![Latest Stable Version](https://poser.pugx.org/silviolleite/laravelpwa/v/stable)](https://packagist.org/packages/silviolleite/laravelpwa)
[![Total Downloads](https://poser.pugx.org/silviolleite/laravelpwa/downloads.png)](https://packagist.org/packages/silviolleite/laravelpwa)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages//silviolleite/laravelpwa)

This Laravel package turns your project into a [progressive web app](https://developers.google.com/web/progressive-web-apps/). Navigating to your site on an Android phone will prompt you to add the app to your home screen.

Launching the app from your home screen will display your app. As such, it's critical that your application provides all navigation within the HTML (no reliance on the browser back or forward button).

See too the [Laravel PWA Demo](https://github.com/silviolleite/laravel-pwa-demo)

# Requirements

Progressive Web Apps require HTTPS unless being served from localhost. If you're not already using HTTPS on your site, check out [Let's Encrypt](https://letsencrypt.org/) and [ZeroSSL](https://zerossl.com/).

## Installation

Add the following to your `composer.json` file :

```json
"require": {
    "osenco/laravelpwa": "~2.0.3",
},
```

or execute

```bash
composer require osenco/laravelpwa --prefer-dist
```

### Publish

```bash
php artisan vendor:publish --provider="LaravelPWA\Providers\LaravelPWAServiceProvider"
```

### Configuration

Configure your app name, description, icons and splashes in `config/laravelpwa.php`.

```php
'manifest' => [
        'name' => env('APP_NAME', 'My PWA App'),
        'short_name' => 'PWA',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation' => 'any',
        'status_bar' => 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/icon-72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/images/icons/icon-96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/images/icons/icon-128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icons/icon-144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/images/icons/icon-152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/icon-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/images/icons/icon-384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/icon-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/splash-640x1136.png',
            '750x1334' => '/images/icons/splash-750x1334.png',
            '828x1792' => '/images/icons/splash-828x1792.png',
            '1125x2436' => '/images/icons/splash-1125x2436.png',
            '1242x2208' => '/images/icons/splash-1242x2208.png',
            '1242x2688' => '/images/icons/splash-1242x2688.png',
            '1536x2048' => '/images/icons/splash-1536x2048.png',
            '1668x2224' => '/images/icons/splash-1668x2224.png',
            '1668x2388' => '/images/icons/splash-1668x2388.png',
            '2048x2732' => '/images/icons/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
```

You can specify the size of each icon as key of the array or specify it:

```
[
    'path' => '/images/icons/icon-512x512.png',
    'sizes' => '512x512',
    'purpose' => 'any'
],

```

Obs: In the `custom` tag you can insert personalized tags to `manifest.json` like this e.g:

```php
...
'custom' => [
    'tag_name' => 'tag_value',
    'tag_name2' => 'tag_value2',
    ...
]
...
```

Include within your `<head>` the blade directive `@laravelPWA`.

```html
<html>
	<head>
		<title>My Title</title>
		... @laravelPWA
	</head>
	<body>
		... My content ...
	</body>
</html>
```

This should include the appropriate meta tags, the link to `manifest.json` and the serviceworker script.

how this example:

```html
<!-- Web Application Manifest -->
<link rel="manifest" href="/manifest.json" />
<!-- Chrome for Android theme color -->
<meta name="theme-color" content="#000000" />

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="yes" />
<meta name="application-name" content="PWA" />
<link rel="icon" sizes="512x512" href="/images/icons/icon-512x512.png" />

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="apple-mobile-web-app-title" content="PWA" />
<link rel="apple-touch-icon" href="/images/icons/icon-512x512.png" />

<link
	href="/images/icons/splash-640x1136.png"
	media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"
	rel="apple-touch-startup-image"
/>
<link
	href="/images/icons/splash-750x1334.png"
	media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)"
	rel="apple-touch-startup-image"
/>
<link
	href="/images/icons/splash-1242x2208.png"
	media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)"
	rel="apple-touch-startup-image"
/>
<link
	href="/images/icons/splash-1125x2436.png"
	media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)"
	rel="apple-touch-startup-image"
/>
<link
	href="/images/icons/splash-828x1792.png"
	media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)"
	rel="apple-touch-startup-image"
/>
<link
	href="/images/icons/splash-1242x2688.png"
	media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)"
	rel="apple-touch-startup-image"
/>
<link
	href="/images/icons/splash-1536x2048.png"
	media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)"
	rel="apple-touch-startup-image"
/>
<link
	href="/images/icons/splash-1668x2224.png"
	media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)"
	rel="apple-touch-startup-image"
/>
<link
	href="/images/icons/splash-1668x2388.png"
	media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)"
	rel="apple-touch-startup-image"
/>
<link
	href="/images/icons/splash-2048x2732.png"
	media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)"
	rel="apple-touch-startup-image"
/>

<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="#ffffff" />
<meta name="msapplication-TileImage" content="/images/icons/icon-512x512.png" />

<script type="text/javascript">
	// Initialize the service worker
	if ("serviceWorker" in navigator) {
		navigator.serviceWorker
			.register("/serviceworker.js", {
				scope: ".",
			})
			.then(
				function (registration) {
					// Registration was successful
					console.log(
						"Laravel PWA: ServiceWorker registration successful with scope: ",
						registration.scope
					);
				},
				function (err) {
					// registration failed :(
					console.log(
						"Laravel PWA: ServiceWorker registration failed: ",
						err
					);
				}
			);
	}
</script>
```

# Troubleshooting

While running the Laravel test server:

1. Verify that `/manifest.json` is being served
1. Verify that `/serviceworker.js` is being served
1. Use the Application tab in the Chrome Developer Tools to verify the progressive web app is configured correctly.
1. Use the "Add to homescreen" link on the Application Tab to verify you can add the app successfully.

# The Service Worker

By default, the service worker implemented by this app is:

```js
var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
	"/offline",
	"/css/app.css",
	"/js/app.js",
	"/images/icons/icon-72x72.png",
	"/images/icons/icon-96x96.png",
	"/images/icons/icon-128x128.png",
	"/images/icons/icon-144x144.png",
	"/images/icons/icon-152x152.png",
	"/images/icons/icon-192x192.png",
	"/images/icons/icon-384x384.png",
	"/images/icons/icon-512x512.png",
	"/images/icons/splash-640x1136.png",
	"/images/icons/splash-750x1334.png",
	"/images/icons/splash-1242x2208.png",
	"/images/icons/splash-1125x2436.png",
	"/images/icons/splash-828x1792.png",
	"/images/icons/splash-1242x2688.png",
	"/images/icons/splash-1536x2048.png",
	"/images/icons/splash-1668x2224.png",
	"/images/icons/splash-1668x2388.png",
	"/images/icons/splash-2048x2732.png",
];

// Cache on install
self.addEventListener("install", event => {
	this.skipWaiting();
	event.waitUntil(
		caches.open(staticCacheName).then(cache => {
			return cache.addAll(filesToCache);
		})
	);
});

// Clear cache on activate
self.addEventListener("activate", event => {
	event.waitUntil(
		caches.keys().then(cacheNames => {
			return Promise.all(
				cacheNames
					.filter(cacheName => cacheName.startsWith("pwa-"))
					.filter(cacheName => cacheName !== staticCacheName)
					.map(cacheName => caches.delete(cacheName))
			);
		})
	);
});

// Serve from Cache
self.addEventListener("fetch", event => {
	event.respondWith(
		caches
			.match(event.request)
			.then(response => {
				return response || fetch(event.request);
			})
			.catch(() => {
				return caches.match("offline");
			})
	);
});
```

To customize service worker functionality, update the `public/serviceworker.js`.

# The offline view

By default, the offline view is implemented in `resources/views/vendor/laravelpwa/offline.blade.php`

```html
@extends('layouts.app') @section('content')

<h1>You are currently not connected to any networks.</h1>

@endsection
```

To customize update this file.

## Contributing

Contributing is easy! Just fork the repo, make your changes then send a pull request on GitHub. If your PR is languishing in the queue and nothing seems to be happening, then send Silvio an [email](mailto:silviolleite@gmail.com).

## Publish to Android Playstore

<div class="inner">
<p>
<a href="https://github.com/GoogleChromeLabs/bubblewrap" target="_blank">Bubblewrap</a> is a tool to make wrapping your Progressive Web App into an Android App Bundle as easy as running a a couple of CLI commands. It does this by generating an Android project that launches your PWA as a <a href="https://developer.chrome.com/docs/android/trusted-web-activity/" target="_blank">Trusted Web Activity</a>.</p>
<aside class="special">
<p>
<strong>Before You Start</strong> What kind of information might Bubblewrap need about your PWA to generate an Android project?</p>
</aside>
<p>To start, create a directory for your project to live in and move into it:</p>
<devsite-code data-copy-event-label="">
<div class="devsite-code-buttons-container" role="group" aria-label="Action buttons">
<button type="button" class="gc-analytics-event material-icons devsite-icon-code-dark devsite-toggle-dark" data-category="Site-Wide Custom Events" data-label="Dark Code Toggle" track-type="exampleCode" track-name="darkCodeToggle" aria-label="Dark code theme" data-title="Dark code theme">
</button>
<button type="button" class="gc-analytics-event material-icons devsite-icon-code-light devsite-toggle-light" data-category="Site-Wide Custom Events" data-label="Light Code Toggle" track-type="exampleCode" track-name="lightCodeToggle" aria-label="Light code theme" data-title="Light code theme">
</button>
<button type="button" class="gc-analytics-event material-icons devsite-icon-copy" data-category="Site-Wide Custom Events" data-label="Click To Copy" track-type="exampleCode" track-name="clickToCopy" aria-label="Copy code sample" data-title="Copy code sample">
</button>
</div>
<span>```bash
mkdir  my-pwa && cd my-pwa
```</span>
</pre>
</devsite-code>
<p>Then, run the Bubblewrap command line tool to generate the configuration and Android project for the Android App Bundle you'll upload to Play:</p>
<devsite-code data-copy-event-label="">
<div class="devsite-code-buttons-container" role="group" aria-label="Action buttons">
<button type="button" class="gc-analytics-event material-icons devsite-icon-code-dark devsite-toggle-dark" data-category="Site-Wide Custom Events" data-label="Dark Code Toggle" track-type="exampleCode" track-name="darkCodeToggle" aria-label="Dark code theme" data-title="Dark code theme">
</button>
<button type="button" class="gc-analytics-event material-icons devsite-icon-code-light devsite-toggle-light" data-category="Site-Wide Custom Events" data-label="Light Code Toggle" track-type="exampleCode" track-name="lightCodeToggle" aria-label="Light code theme" data-title="Light code theme">
</button>
<button type="button" class="gc-analytics-event material-icons devsite-icon-copy" data-category="Site-Wide Custom Events" data-label="Click To Copy" track-type="exampleCode" track-name="clickToCopy" aria-label="Copy code sample" data-title="Copy code sample">
</button>
</div>
<pre class="" translate="no" dir="ltr" is-upgraded="">
<code class="language-bash" translate="no" dir="ltr">
<span class="pln">
<span class="pln">$ bubblewrap init --manifest=https://my-pwa.com/manifest.json</span>
</span>
<span class="pln">
<span class="pln">
<br>
</span>
</span>
</code>
</pre>
</devsite-code>
<aside class="warning">
<p>
<strong>Important</strong>: When Bubblewrap is run for the first time, it  will ask for downloading extra dependencies. Those dependencies are the <strong>Java Development Kit</strong> and the <a href="https://developer.android.com/studio/command-line" target="_blank">Android command-line tools</a>. To ensure the correct versions are downloaded for each dependency, we strongly recommend allowing Bubblewrap to download the correct versions instead of using one already available on your computer.</p>
</aside>
<p>Here, Bubblewrap is initialized with the location of a PWA's <a href="https://web.dev/add-manifest/" target="_blank">Web App Manifest</a> file. This will generate a default configuration from the Web App Manifest, and start an in-console wizard that will allow you to change the default configuration. Follow the wizard to change any of the values generated by the tool.</p>
<p class="image-container">
<img alt="Bubblewrap CLI wizard showing an initialization from airhorner with the domain overridden with example,.com and the start URLs overridden." src="https://developers.google.com/static/codelabs/pwa-in-play/images/bubblewrap-wizard.png">
</p>
<h2 is-upgraded="" id="signing-key" data-text="Signing Key" tabindex="-1" role="presentation">
<span class="devsite-heading" role="heading" aria-level="2">Signing Key</span>
<button type="button" class="devsite-heading-link button-flat material-icons" aria-label="Copy link to this section: Signing Key" data-title="Copy link to this section: Signing Key" data-id="signing-key">
</button>
</h2>
<p>Google's Play Store requires application packages to be digitally signed with a certificate when uploaded, often referred to as signing key. This is a self-signed certificate and is <em>different from the one used to serve your application over HTTPS</em>.</p>
<p>Bubblewrap will ask for the path for the key when creating the application. If you are using an existing Play Store listing for your application, you will need to add the path to the same key used by that listing.</p>
<p class="image-container">
<img alt="Bubblewrap CLI wizard asking for the location of the user’s existing signing key location and name." src="https://developers.google.com/static/codelabs/pwa-in-play/images/bubblewrap-key-info.png">
</p>
<p>If you do not have existing signing key and are creating a new listing on the Play Store, you can use the default value provided by Bubblewrap to have it create a new key for you:</p>
<p class="image-container">
<img alt="Bubblewrap CLI wizard asking if the user would like to create new signing key." src="https://developers.google.com/static/codelabs/pwa-in-play/images/bubblewrap-key-creation.png">
</p>
<aside class="warning">
<p>
<strong>Important</strong>:  Ensure your key and passwords are stored in a safe place. You will need them to build the application the first time and also to update your app on the Play Store regularly.</p>
</aside>
<h2 is-upgraded="" id="bubblewrap-output" data-text="Bubblewrap Output" tabindex="-1" role="presentation">
<span class="devsite-heading" role="heading" aria-level="2">Bubblewrap Output</span>
<button type="button" class="devsite-heading-link button-flat material-icons" aria-label="Copy link to this section: Bubblewrap Output" data-title="Copy link to this section: Bubblewrap Output" data-id="bubblewrap-output">
</button>
</h2>
<p>After initializing your Bubblewrap project and completing the wizard, the following items will have been created:</p>
<ul>
<li>
<strong>twa-manifest.json</strong> - The project configuration, reflecting the values chosen in the Bubblewrap wizard. You will want to track this file with your version control system, as it can be used to regenerate the entire Bubblewrap project if need be.</li>
<li>
<strong>Android project files</strong> - The remaining files in the directory are the generated Android project. This project is the source used for the Bubblewrap build command. You can optionally track these files with your version control system, too.</li>
<li>
<strong>(Optionally) Signing Key</strong> - If you choose to have Bubblewrap create the signing key for you, the key will be output to the location described on the wizard. Ensure the key is kept in a safe place and limit the number of people who have access to it; it is what is used to prove apps on the Play Store come from you.</li>
</ul>
<p>With these files, we now have everything we need to build an Android Application Bundle.</p>
<h2 is-upgraded="" id="build-your-android-app-bundle" data-text="Build Your Android App Bundle" tabindex="-1" role="presentation">
<span class="devsite-heading" role="heading" aria-level="2">Build Your Android App Bundle</span>
<button type="button" class="devsite-heading-link button-flat material-icons" aria-label="Copy link to this section: Build Your Android App Bundle" data-title="Copy link to this section: Build Your Android App Bundle" data-id="build-your-android-app-bundle">
</button>
</h2>
<p>From within the same directory you ran Bubblewrap's initialization command, run the following (you'll need the passwords for your signing key):</p>
<devsite-code data-copy-event-label="">
<div class="devsite-code-buttons-container" role="group" aria-label="Action buttons">
<button type="button" class="gc-analytics-event material-icons devsite-icon-code-dark devsite-toggle-dark" data-category="Site-Wide Custom Events" data-label="Dark Code Toggle" track-type="exampleCode" track-name="darkCodeToggle" aria-label="Dark code theme" data-title="Dark code theme">
</button>
<button type="button" class="gc-analytics-event material-icons devsite-icon-code-light devsite-toggle-light" data-category="Site-Wide Custom Events" data-label="Light Code Toggle" track-type="exampleCode" track-name="lightCodeToggle" aria-label="Light code theme" data-title="Light code theme">
</button>
<button type="button" class="gc-analytics-event material-icons devsite-icon-copy" data-category="Site-Wide Custom Events" data-label="Click To Copy" track-type="exampleCode" track-name="clickToCopy" aria-label="Copy code sample" data-title="Copy code sample">
</button>
</div>
<pre class="" translate="no" dir="ltr" is-upgraded="">
<code class="language-bash" translate="no" dir="ltr">
<span class="pln">
<span class="pln">$ bubblewrap build<br>
</span>
</span>
</code>
</pre>
</devsite-code>
<p class="image-container">
<img alt="Bubblewrap CLI output for building a project, asking for passwords for the signing key and showing the generation of different versions of the Android app." src="https://developers.google.com/static/codelabs/pwa-in-play/images/bubblewrap-build-output.png">
</p>
<p>The build command will generate two important files:</p>
<ul>
<li>
<strong>app-release-bundle.aab</strong> - Your PWA's <a href="https://developer.android.com/platform/technology/app-bundle" target="_blank">Android App Bundle</a>. This is the file you will upload to the Google Play Store.</li>
<li>
<strong>app-release-signed.apk</strong> - An Android packaging format that can be used to install the application directly to a development device using the <code translate="no" dir="ltr">bubblewrap install</code> command.</li>
</ul>
</div>
