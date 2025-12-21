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
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@hotwired/turbo' => [
        'version' => '8.0.20',
    ],
    '@symfony/ux-swup' => [
        'version' => '2.31.0',
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
    '@swup/debug-plugin' => [
        'version' => '4.1.0',
    ],
    'path-to-regexp' => [
        'version' => '8.3.0',
    ],
    '@swup/theme' => [
        'version' => '2.1.0',
    ],
    '@symfony/ux-live-component' => [
        'path' => './vendor/symfony/ux-live-component/assets/dist/live_controller.js',
    ],
];
