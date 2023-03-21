<?php

Route::group(['namespace' => 'Theme\baomoi\Http\Controllers', 'middleware' => 'web'], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::get('ajax/cart', 'BaoMoiController@ajaxCart')
            ->name('public.ajax.cart');

        Route::get('ajax/products', 'BaoMoiController@ajaxGetProducts')
            ->name('public.ajax.products');

        Route::get('ajax/product-categories/products', 'BaoMoiController@ajaxGetProductsByCategoryId')
            ->name('public.ajax.product-category-products');

        Route::get('ajax/featured-products', 'BaoMoiController@getFeaturedProducts')
            ->name('public.ajax.featured-products');

        Route::get('ajax/posts', 'BaoMoiController@ajaxGetPosts')->name('public.ajax.posts');

        Route::get('ajax/featured-product-categories', 'BaoMoiController@getFeaturedProductCategories')
            ->name('public.ajax.featured-product-categories');

        Route::get('ajax/featured-brands', 'BaoMoiController@ajaxGetFeaturedBrands')
            ->name('public.ajax.featured-brands');

        Route::get('ajax/related-products/{id}', 'BaoMoiController@ajaxGetRelatedProducts')
            ->name('public.ajax.related-products');

        Route::get('ajax/product-reviews/{id}', 'BaoMoiController@ajaxGetProductReviews')
            ->name('public.ajax.product-reviews');

        Route::get('ajax/get-flash-sales', 'BaoMoiController@ajaxGetFlashSales')
            ->name('public.ajax.get-flash-sales');

        Route::get('ajax/quick-view/{id}', 'BaoMoiController@getQuickView')
            ->name('public.ajax.quick-view');

        Route::get('ajax/load-main/{status}', 'BaoMoiController@LoadMain')
            ->name('public.ajax.load-main');
    });
});

Theme::routes();

Route::group(['namespace' => 'Theme\baomoi\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::get('/', 'BaoMoiController@getIndex')
            ->name('public.index');

        Route::get('sitemap.xml', 'BaoMoiController@getSiteMap')
            ->name('public.sitemap');

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), 'BaoMoiController@getView')
            ->name('public.single');
    });
});
