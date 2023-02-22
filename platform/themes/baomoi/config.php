<?php

use Botble\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these events can be overridden by package config.
    |
    */

    'events' => [

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function (Theme $theme) {
            if (is_plugin_active('ecommerce')) {
                $categories = ProductCategoryHelper::getActiveTreeCategories();

                $theme->partialComposer('header', function ($view) use ($categories) {
                    $view->with('categories', $categories);
                });
            }

            $version = get_cms_version();

            /*import vendors*/

            $theme->asset()->usePath()->add('bootstrap-css', 'css/vendors/bootstrap.min.css');
            $theme->asset()->usePath()->add('fontawesome-css', 'css/vendors/fontawesome-all.min.css');
            $theme->asset()->usePath()->add('baomoi-font-css', 'css/vendors/baomoi-font.css');
            $theme->asset()->add('baomoi-font-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css');
            /*import plugins*/
            $theme->asset()->usePath()->add('animate-css', 'css/plugins/animate.css');


            $theme->asset()->usePath()->add('style-css', 'css/style.css', [], [], $version);

            if (BaseHelper::siteLanguageDirection() == 'rtl') {
                $theme->asset()->usePath()->add('rtl', 'css/rtl.css', [], [], $version);
            }

            $theme->asset()->container('header')->add('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js');
            $theme->asset()->container('footer')->add('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js');
//            $theme->asset()->container('footer')->usePath()->add('wow-js', 'js/plugins/wow.js');
            $theme->asset()->container('header')->add('carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
            $theme->asset()->container('footer')->usePath()->add('main', 'js/main.js', ['jquery.theia.sticky-js', 'jquery.elevatezoom-js'], [], $version);

            if (function_exists('shortcode')) {
                $theme->composer(['page', 'post', 'ecommerce.product'], function (\Botble\Shortcode\View\View $view) {
                    $view->withShortcodes();
                });
            }
        },
    ],
];
