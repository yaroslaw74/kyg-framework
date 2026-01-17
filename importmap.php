<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    'ltr' => [
        'path' => './assets/ltr.js',
        'entrypoint' => true,
    ],
    'rtl' => [
        'path' => './assets/rtl.js',
        'entrypoint' => true,
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@symfony/ux-live-component' => [
        'path' => './vendor/symfony/ux-live-component/assets/dist/live_controller.js',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@hotwired/turbo' => [
        'version' => '8.0.20',
    ],
    'es-module-shims' => [
        'version' => '2.7.0',
    ],
    'bootstrap' => [
        'version' => '5.3.8',
    ],
    '@popperjs/core' => [
        'version' => '2.11.8',
    ],
    'bootstrap/dist/css/bootstrap.min.css' => [
        'version' => '5.3.8',
        'type' => 'css',
    ],
    'bootstrap/dist/css/bootstrap.rtl.min.css' => [
        'version' => '5.3.8',
        'type' => 'css',
    ],
    'bootstrap-icons/font/bootstrap-icons.min.css' => [
        'version' => '1.13.1',
        'type' => 'css',
    ],
    'boxicons/css/boxicons.min.css' => [
        'version' => '2.1.4',
        'type' => 'css',
    ],
    '@fortawesome/fontawesome-free/css/all.min.css' => [
        'version' => '7.1.0',
        'type' => 'css',
    ],
    'ionicons/dist/css/ionicons.min.css' => [
        'version' => '4.6.4-1',
        'type' => 'css',
    ],
    'line-awesome/dist/line-awesome/css/line-awesome.min.css' => [
        'version' => '1.3.0',
        'type' => 'css',
    ],
    '@mdi/font/css/materialdesignicons.min.css' => [
        'version' => '7.4.47',
        'type' => 'css',
    ],
    'pixeden-stroke-7-icon/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css' => [
        'version' => '1.2.3',
        'type' => 'css',
    ],
    'remixicon/fonts/remixicon.css' => [
        'version' => '4.8.0',
        'type' => 'css',
    ],
    'simple-line-icons/css/simple-line-icons.css' => [
        'version' => '2.5.5',
        'type' => 'css',
    ],
    '@tabler/icons-webfont/dist/tabler-icons.min.css' => [
        'version' => '3.36.0',
        'type' => 'css',
    ],
    '@icon/themify-icons/themify-icons.css' => [
        'version' => '1.0.1-alpha.3',
        'type' => 'css',
    ],
    'typicons.font/src/font/typicons.css' => [
        'version' => '2.1.2',
        'type' => 'css',
    ],
    'weather-icons/css/weather-icons.min.css' => [
        'version' => '1.3.2',
        'type' => 'css',
    ],
    '@symfony/ux-swup' => [
        'version' => '2.31.0',
    ],
    '@swup/debug-plugin' => [
        'version' => '4.1.0',
    ],
    '@swup/fade-theme' => [
        'version' => '2.0.2',
    ],
    '@swup/forms-plugin' => [
        'version' => '3.6.0',
    ],
    '@swup/slide-theme' => [
        'version' => '2.0.2',
    ],
    'swup' => [
        'version' => '4.8.2',
    ],
    '@swup/plugin' => [
        'version' => '4.0.0',
    ],
    'delegate-it' => [
        'version' => '6.3.0',
    ],
    '@swup/theme' => [
        'version' => '2.1.0',
    ],
    'path-to-regexp' => [
        'version' => '8.3.0',
    ],
    'node-waves' => [
        'version' => '0.7.6',
    ],
    'node-waves/dist/waves.min.css' => [
        'version' => '0.7.6',
        'type' => 'css',
    ],
    'simplebar' => [
        'version' => '6.3.3',
    ],
    'simplebar-core' => [
        'version' => '1.3.2',
    ],
    'simplebar/dist/simplebar.min.css' => [
        'version' => '6.3.3',
        'type' => 'css',
    ],
    'lodash-es/debounce.js' => [
        'version' => '4.17.21',
    ],
    'lodash-es/throttle.js' => [
        'version' => '4.17.21',
    ],
    'resize-observer-polyfill' => [
        'version' => '1.5.1',
    ],
    '@simonwep/pickr/dist/pickr.es5.min.js' => [
        'version' => '1.9.1',
    ],
    '@simonwep/pickr/dist/themes/nano.min.css' => [
        'version' => '1.9.1',
        'type' => 'css',
    ],
    'stimulus-flatpickr' => [
        'version' => '1.4.0',
    ],
    'stimulus' => [
        'version' => '1.1.1',
    ],
    'flatpickr' => [
        'version' => '4.6.6',
    ],
    '@stimulus/core' => [
        'version' => '1.1.1',
    ],
    'flatpickr/dist/flatpickr.min.css' => [
        'version' => '4.6.6',
        'type' => 'css',
    ],
    '@stimulus/mutation-observers' => [
        'version' => '1.1.1',
    ],
    '@stimulus/multimap' => [
        'version' => '2.0.0',
    ],
    'choices.js' => [
        'version' => '11.1.0',
    ],
    'choices.js/public/assets/styles/choices.min.css' => [
        'version' => '11.1.0',
        'type' => 'css',
    ],
    'apexcharts' => [
        'version' => '5.3.6',
    ],
    'apexcharts/dist/apexcharts.css' => [
        'version' => '5.3.6',
        'type' => 'css',
    ],
];
