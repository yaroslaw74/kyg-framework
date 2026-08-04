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
    'icons' => [
        'path' => './assets/icons-fonts.js',
        'entrypoint' => true,
    ],
    'valex-plugins' => [
        'path' => './assets/valex-plugins.js',
        'entrypoint' => true,
    ],
    'valex' => [
        'path' => './assets/valex.js',
        'entrypoint' => true,
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@symfony/ux-turbo' => [
        'path' => './vendor/symfony/ux-turbo/assets/dist/turbo_controller.js',
    ],
    '@symfony/ux-dropzone' => [
        'path' => './vendor/symfony/ux-dropzone/assets/dist/controller.js',
    ],
    '@rekalogika/file-filepond' => [
        'path' => './vendor/rekalogika/file-filepond/assets/dist/filepond.js',
    ],
    '@rekalogika/temporary-url-bundle' => [
        'path' => './vendor/rekalogika/temporary-url-bundle/assets/dist/autoexpire.js',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@hotwired/turbo' => [
        'version' => '8.0.23',
    ],
    'es-module-shims' => [
        'version' => '2.8.4',
    ],
    'idiomorph/dist/idiomorph.min.js' => [
        'version' => '0.7.4',
    ],
    'frankenphp-hot-reload' => [
        'version' => '1.0.1',
    ],
    'bootstrap-icons/font/bootstrap-icons.min.css' => [
        'version' => '1.13.1',
        'type' => 'css',
    ],
    'boxicons/css/boxicons.min.css' => [
        'version' => '2.1.4',
        'type' => 'css',
    ],
    '@icon/feather/feather.css' => [
        'version' => '4.28.0-alpha.0',
        'type' => 'css',
    ],
    'ionicons/dist/css/ionicons.min.css' => [
        'version' => '4.6.4-1',
        'type' => 'css',
    ],
    '@fortawesome/fontawesome-free/css/all.min.css' => [
        'version' => '7.3.1',
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
        'version' => '4.9.1',
        'type' => 'css',
    ],
    'simple-line-icons/css/simple-line-icons.css' => [
        'version' => '2.5.5',
        'type' => 'css',
    ],
    '@tabler/icons-webfont/dist/tabler-icons.min.css' => [
        'version' => '3.46.0',
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
        'version' => '2.36.2',
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
        'version' => '4.9.2',
    ],
    '@swup/theme' => [
        'version' => '2.1.0',
    ],
    '@swup/plugin' => [
        'version' => '4.0.0',
    ],
    'delegate-it' => [
        'version' => '6.4.0',
    ],
    'path-to-regexp' => [
        'version' => '8.4.2',
    ],
    'bootstrap' => [
        'version' => '5.3.8',
    ],
    'bootstrap/dist/css/bootstrap.min.css' => [
        'version' => '5.3.8',
        'type' => 'css',
    ],
    'bootstrap/dist/css/bootstrap.rtl.min.css' => [
        'version' => '5.3.8',
        'type' => 'css',
    ],
    '@popperjs/core' => [
        'version' => '2.11.8',
    ],
    '@simonwep/pickr' => [
        'version' => '1.10.1',
    ],
    '@simonwep/pickr/dist/themes/nano.min.css' => [
        'version' => '1.10.1',
        'type' => 'css',
    ],
    'choices.js' => [
        'version' => '11.2.3',
    ],
    'choices.js/public/assets/styles/choices.min.css' => [
        'version' => '11.2.3',
        'type' => 'css',
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
    'simplebar/dist/simplebar.min.css' => [
        'version' => '6.3.3',
        'type' => 'css',
    ],
    'simplebar-core' => [
        'version' => '1.3.2',
    ],
    'simplebar-core/dist/simplebar.min.css' => [
        'version' => '1.3.2',
        'type' => 'css',
    ],
    'lodash-es/debounce.js' => [
        'version' => '4.18.1',
    ],
    'lodash-es/throttle.js' => [
        'version' => '4.18.1',
    ],
    'resize-observer-polyfill' => [
        'version' => '1.5.1',
    ],
    'filepond' => [
        'version' => '4.32.12',
    ],
    'filepond/dist/filepond.min.css' => [
        'version' => '4.32.12',
        'type' => 'css',
    ],
    'filepond/locale/ar-ar.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/cs-cz.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/da-dk.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/de-de.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/el-el.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/en-en.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/es-es.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/fa_ir.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/fi-fi.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/fr-fr.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/he-he.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/hr-hr.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/hu-hu.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/id-id.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/it-it.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/ja-ja.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/lt-lt.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/nl-nl.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/no_nb.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/pl-pl.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/pt-br.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/ro-ro.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/ru-ru.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/sk-sk.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/sv_se.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/tr-tr.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/uk-ua.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/vi-vi.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/zh-cn.js' => [
        'version' => '4.32.12',
    ],
    'filepond/locale/zh-tw.js' => [
        'version' => '4.32.12',
    ],
    'filepond-plugin-file-encode' => [
        'version' => '2.1.14',
    ],
    'filepond-plugin-file-metadata' => [
        'version' => '1.0.8',
    ],
    'filepond-plugin-file-poster' => [
        'version' => '2.5.2',
    ],
    'filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css' => [
        'version' => '2.5.2',
        'type' => 'css',
    ],
    'filepond-plugin-file-validate-size' => [
        'version' => '2.2.8',
    ],
    'filepond-plugin-file-validate-type' => [
        'version' => '1.2.9',
    ],
    'filepond-plugin-image-crop' => [
        'version' => '2.0.6',
    ],
    'filepond-plugin-image-edit' => [
        'version' => '1.6.3',
    ],
    'filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css' => [
        'version' => '1.6.3',
        'type' => 'css',
    ],
    'filepond-plugin-image-exif-orientation' => [
        'version' => '1.0.11',
    ],
    'filepond-plugin-image-preview' => [
        'version' => '4.6.12',
    ],
    'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css' => [
        'version' => '4.6.12',
        'type' => 'css',
    ],
    'filepond-plugin-image-resize' => [
        'version' => '2.0.10',
    ],
    'filepond-plugin-image-transform' => [
        'version' => '3.8.7',
    ],
    'filepond-plugin-image-validate-size' => [
        'version' => '1.2.7',
    ],
];
