<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Widget\Models\Widget as WidgetModel;
use Theme;

class WidgetSeeder extends BaseSeeder
{
    public function run(): void
    {
        WidgetModel::truncate();

        $data = [
            'en_US' => [
                [
                    'widget_id' => 'NewsletterWidget',
                    'sidebar_id' => 'top_footer_sidebar',
                    'position' => 1,
                    'data' => [
                        'id' => 'NewsletterWidget',
                        'name' => 'Sign up to Newsletter',
                        'subtitle' => '...and receive $25 coupon for first shopping.',
                    ],
                ],
                [
                    'widget_id' => 'SiteInfoWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position' => 0,
                    'data' => [
                        'id' => 'SiteInfoWidget',
                        'name' => 'Site information',
                    ],
                ],
                [
                    'widget_id' => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position' => 1,
                    'data' => [
                        'id' => 'CustomMenuWidget',
                        'name' => 'Categories',
                        'menu_id' => 'product-categories',
                    ],
                ],
                [
                    'widget_id' => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position' => 2,
                    'data' => [
                        'id' => 'CustomMenuWidget',
                        'name' => 'Information',
                        'menu_id' => 'information',
                    ],
                ],
                [
                    'widget_id' => 'PaymentMethodsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position' => 3,
                    'data' => [
                        'id' => 'PaymentMethodsWidget',
                        'name' => 'Payments',
                        'description' => 'Secured Payment Gateways',
                        'image' => 'general/payment-methods.png',
                    ],
                ],

                [
                    'widget_id' => 'BlogSearchWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position' => 0,
                    'data' => [
                        'id' => 'BlogSearchWidget',
                        'name' => 'Search',
                    ],
                ],
                [
                    'widget_id' => 'BlogCategoriesWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position' => 1,
                    'data' => [
                        'id' => 'BlogCategoriesWidget',
                        'name' => 'Categories',
                    ],
                ],
                [
                    'widget_id' => 'RecentPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position' => 2,
                    'data' => [
                        'id' => 'RecentPostsWidget',
                        'name' => 'Recent Posts',
                    ],
                ],
                [
                    'widget_id' => 'TagsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position' => 4,
                    'data' => [
                        'id' => 'TagsWidget',
                        'name' => 'Popular Tags',
                    ],
                ],

                [
                    'widget_id' => 'ProductCategoriesWidget',
                    'sidebar_id' => 'product_sidebar',
                    'position' => 1,
                    'data' => [
                        'id' => 'ProductCategoriesWidget',
                        'name' => 'Categories',
                    ],
                ],
                [
                    'widget_id' => 'FeaturedProductsWidget',
                    'sidebar_id' => 'product_sidebar',
                    'position' => 2,
                    'data' => [
                        'id' => 'FeaturedProductsWidget',
                        'name' => 'Featured Products',
                    ],
                ],
                [
                    'widget_id' => 'FeaturedBrandsWidget',
                    'sidebar_id' => 'product_sidebar',
                    'position' => 3,
                    'data' => [
                        'id' => 'FeaturedBrandsWidget',
                        'name' => 'Manufacturers',
                    ],
                ],
            ],
            'vi' => [
                [
                    'widget_id' => 'NewsletterWidget',
                    'sidebar_id' => 'top_footer_sidebar',
                    'position' => 1,
                    'data' => [
                        'id' => 'NewsletterWidget',
                        'name' => '????ng k?? nh???n b???n tin',
                        'subtitle' => '...v?? nh???n m?? gi???m gi?? $25 cho l???n ?????u mua s???m.',
                    ],
                ],
                [
                    'widget_id' => 'SiteInfoWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position' => 0,
                    'data' => [
                        'id' => 'SiteInfoWidget',
                        'name' => 'V??? ch??ng t??i',
                    ],
                ],
                [
                    'widget_id' => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position' => 1,
                    'data' => [
                        'id' => 'CustomMenuWidget',
                        'name' => 'Danh m???c s???n ph???m',
                        'menu_id' => 'danh-muc-san-pham',
                    ],
                ],
                [
                    'widget_id' => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position' => 2,
                    'data' => [
                        'id' => 'CustomMenuWidget',
                        'name' => 'Th??ng tin',
                        'menu_id' => 'thong-tin',
                    ],
                ],
                [
                    'widget_id' => 'PaymentMethodsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position' => 3,
                    'data' => [
                        'id' => 'PaymentMethodsWidget',
                        'name' => 'Thanh to??n',
                        'description' => 'C???ng thanh to??n an to??n',
                        'image' => 'general/payment-methods.png',
                    ],
                ],

                [
                    'widget_id' => 'BlogSearchWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position' => 0,
                    'data' => [
                        'id' => 'BlogSearchWidget',
                        'name' => 'T??m ki???m',
                    ],
                ],
                [
                    'widget_id' => 'BlogCategoriesWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position' => 1,
                    'data' => [
                        'id' => 'BlogCategoriesWidget',
                        'name' => 'Danh m???c',
                    ],
                ],
                [
                    'widget_id' => 'RecentPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position' => 2,
                    'data' => [
                        'id' => 'RecentPostsWidget',
                        'name' => 'B??i vi???t g???n ????y',
                    ],
                ],
                [
                    'widget_id' => 'TagsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position' => 4,
                    'data' => [
                        'id' => 'TagsWidget',
                        'name' => 'Tags ph??? bi???n',
                    ],
                ],

                [
                    'widget_id' => 'ProductCategoriesWidget',
                    'sidebar_id' => 'product_sidebar',
                    'position' => 1,
                    'data' => [
                        'id' => 'ProductCategoriesWidget',
                        'name' => 'Danh m???c s???n ph???m',
                    ],
                ],
                [
                    'widget_id' => 'FeaturedProductsWidget',
                    'sidebar_id' => 'product_sidebar',
                    'position' => 2,
                    'data' => [
                        'id' => 'FeaturedProductsWidget',
                        'name' => 'S???n ph???m n???i b???t',
                    ],
                ],
                [
                    'widget_id' => 'FeaturedBrandsWidget',
                    'sidebar_id' => 'product_sidebar',
                    'position' => 3,
                    'data' => [
                        'id' => 'FeaturedBrandsWidget',
                        'name' => 'Nh?? cung c???p',
                    ],
                ],
            ],
        ];

        $theme = Theme::getThemeName();

        foreach ($data as $locale => $widgets) {
            foreach ($widgets as $item) {
                $item['theme'] = $locale == 'en_US' ? $theme : ($theme . '-' . $locale);
                WidgetModel::create($item);
            }
        }
    }
}
