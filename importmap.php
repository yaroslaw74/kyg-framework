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
        'version' => '8.0.23',
    ],
    'es-module-shims' => [
        'version' => '2.8.0',
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
        'version' => '4.9.1',
        'type' => 'css',
    ],
    'simple-line-icons/css/simple-line-icons.css' => [
        'version' => '2.5.5',
        'type' => 'css',
    ],
    '@tabler/icons-webfont/dist/tabler-icons.min.css' => [
        'version' => '3.36.1',
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
        'version' => '2.32.0',
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
    '@symfony/ux-toggle-password' => [
        'version' => '2.32.0',
    ],
    '@symfony/ux-toggle-password/dist/style.min.css' => [
        'version' => '2.32.0',
        'type' => 'css',
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
        'version' => '4.17.23',
    ],
    'lodash-es/throttle.js' => [
        'version' => '4.17.23',
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
        'version' => '3.2.2',
    ],
    'flatpickr' => [
        'version' => '4.6.13',
    ],
    'flatpickr/dist/flatpickr.min.css' => [
        'version' => '4.6.13',
        'type' => 'css',
    ],
    '@stimulus/core' => [
        'version' => '2.0.0',
    ],
    '@stimulus/mutation-observers' => [
        'version' => '2.0.0',
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
    'filepond' => [
        'version' => '4.32.11',
    ],
    'filepond/dist/filepond.min.css' => [
        'version' => '4.32.11',
        'type' => 'css',
    ],
    'filepond/locale/ar-ar.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/cs-cz.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/da-dk.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/de-de.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/el-el.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/en-en.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/es-es.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/fa_ir.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/fi-fi.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/fr-fr.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/he-he.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/hr-hr.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/hu-hu.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/id-id.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/it-it.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/ja-ja.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/lt-lt.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/nl-nl.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/no_nb.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/pl-pl.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/pt-br.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/ro-ro.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/ru-ru.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/sk-sk.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/sv_se.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/tr-tr.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/uk-ua.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/vi-vi.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/zh-cn.js' => [
        'version' => '4.32.11',
    ],
    'filepond/locale/zh-tw.js' => [
        'version' => '4.32.11',
    ],
    'chart.js' => [
        'version' => '4.5.1',
    ],
    'chartjs-plugin-annotation' => [
        'version' => '3.1.0',
    ],
    'chartjs-plugin-datalabels' => [
        'version' => '2.2.0',
    ],
    'chartjs-plugin-zoom' => [
        'version' => '2.2.0',
    ],
    'cropperjs' => [
        'version' => '1.6.2',
    ],
    'cropperjs/dist/cropper.min.css' => [
        'version' => '1.6.2',
        'type' => 'css',
    ],
    'tom-select' => [
        'version' => '2.4.5',
    ],
    'tom-select/dist/css/tom-select.default.css' => [
        'version' => '2.4.5',
        'type' => 'css',
    ],
    'tom-select/dist/css/tom-select.bootstrap4.css' => [
        'version' => '2.4.5',
        'type' => 'css',
    ],
    'tom-select/dist/css/tom-select.bootstrap5.css' => [
        'version' => '2.4.5',
        'type' => 'css',
    ],
    '@orchidjs/sifter' => [
        'version' => '1.1.0',
    ],
    '@orchidjs/unicode-variants' => [
        'version' => '1.1.2',
    ],
    'apexcharts' => [
        'version' => '5.3.6',
    ],
    'apexcharts/dist/apexcharts.css' => [
        'version' => '5.3.6',
        'type' => 'css',
    ],
    'echarts' => [
        'version' => '6.0.0',
    ],
    'tslib' => [
        'version' => '2.3.0',
    ],
    'zrender/lib/zrender.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/util.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/env.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/timsort.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/Eventful.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/Text.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/tool/color.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/Path.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/tool/path.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/matrix.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/vector.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/Transformable.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/Image.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/Group.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/shape/Circle.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/shape/Ellipse.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/shape/Sector.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/shape/Ring.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/shape/Polygon.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/shape/Polyline.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/shape/Rect.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/shape/Line.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/shape/BezierCurve.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/shape/Arc.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/CompoundPath.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/LinearGradient.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/RadialGradient.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/BoundingRect.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/OrientedBoundingRect.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/Point.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/IncrementalDisplayable.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/helper/subPixelOptimize.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/dom.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/helper/parseText.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/WeakMap.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/LRU.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/contain/text.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/canvas/graphic.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/platform.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/contain/polygon.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/PathProxy.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/contain/util.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/curve.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/svg/Painter.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/canvas/Painter.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/event.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/tool/parseSVG.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/tool/parseXML.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/graphic/Displayable.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/core/bbox.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/contain/line.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/contain/quadratic.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/animation/Animator.js' => [
        'version' => '6.0.0',
    ],
    'zrender/lib/tool/morphPath.js' => [
        'version' => '6.0.0',
    ],
];
