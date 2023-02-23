<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! BaseHelper::googleFonts('https://fonts.googleapis.com/css2?family=' . urlencode(theme_option('font_text', 'Poppins')) . ':ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap') !!}

    <style>
        :root {
            --font-text: {{ theme_option('font_text', 'Poppins') }}, sans-serif;
            --color-brand: {{ theme_option('color_brand', '#5897fb') }};
            --color-brand-2: {{ theme_option('color_brand_2', '#3256e0') }};
            --color-primary: {{ theme_option('color_primary', '#3f81eb') }};
            --color-secondary: {{ theme_option('color_secondary', '#41506b') }};
            --color-warning: {{ theme_option('color_warning', '#ffb300') }};
            --color-danger: {{ theme_option('color_danger', '#ff3551') }};
            --color-success: {{ theme_option('color_success', '#3ed092') }};
            --color-info: {{ theme_option('color_info', '#18a1b7') }};
            --color-text: {{ theme_option('color_text', '#4f5d77') }};
            --color-heading: {{ theme_option('color_heading', '#222222') }};
            --color-grey-1: {{ theme_option('color_grey_1', '#111111') }};
            --color-grey-2: {{ theme_option('color_grey_2', '#242424') }};
            --color-grey-4: {{ theme_option('color_grey_4', '#90908e') }};
            --color-grey-9: {{ theme_option('color_grey_9', '#f4f5f9') }};
            --color-muted: {{ theme_option('color_muted', '#8e8e90') }};
            --color-body: {{ theme_option('color_body', '#4f5d77') }};
        }
    </style>

    {!! Theme::header() !!}

    @php
        $headerStyle = theme_option('header_style') ?: '';
        $page = Theme::get('page');
        if ($page) {
            $headerStyle = $page->getMetaData('header_style', true) ?: $headerStyle;
        }
        $headerStyle = ($headerStyle && in_array($headerStyle, array_keys(get_layout_header_styles()))) ? $headerStyle : '';
    @endphp
</head>
<body @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl"
      @endif class="@if (BaseHelper::siteLanguageDirection() == 'rtl') rtl @endif header_full_true wowy-template css_scrollbar lazy_icons btnt4_style_2 zoom_tp_2 css_scrollbar template-index wowy_toolbar_true hover_img2 swatch_style_rounded swatch_list_size_small label_style_rounded wrapper_full_width header_full_true header_sticky_true hide_scrolld_true des_header_3 h_banner_true top_bar_true prs_bordered_grid_1 search_pos_canvas lazyload @if (Theme::get('bodyClass')) {{ Theme::get('bodyClass') }} @endif">
{!! apply_filters(THEME_FRONT_BODY, null) !!}
<div id="alert-container"></div>

{!! Theme::partial('preloader') !!}
<header>
    <div class="header-full">
        <div class="header-content ">
            <div class="h-content-top container">
                <div class="logo ">
                    <a style="background-image:url({{ RvMedia::getImageUrl(theme_option('logo')) }}"
                       href="{{ route('public.index') }}" class="bm_Ci" title="{{ theme_option('site_title') }}"></a>
                </div>
                <form class="search" action="{{ route('public.search') }}" method="GET">
                    @csrf
                    <input type="text" name="q" value="{{ BaseHelper::stringify(request()->query('q')) }}"
                           placeholder="{{ __('Search...') }}">
                    <button class="bm_EB " tabindex="0" type="submit" aria-label="Button"><i
                            class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="h-content-bottom">
                <nav class="navbar navbar-expand-lg ">
                    <div class="collapse navbar-collapse container" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item item-cat">
                                <a class="nav-link" href="#">TOPIC</a>
                            </li>
                            @foreach (get_popular_tags(3) as $tag)
                                @if (!$tag->slug)
                                    @php info($tag->name); @endphp
                                @endif
                                    <li class="nav-item tag">
                                        <a class="nav-link " href="{{ route('public.tag', $tag->slug) }}">
                                          <span class="tag-hot">
                                            #{{$tag->name}}
                                          </span>
                                        </a>
                                    </li>
                            @endforeach


                        </ul>

                        <div class="d-flex ">
                            <div class="icon-menu">
                                <button class="" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarToggleExternalContent"
                                        aria-controls="navbarToggleExternalContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="collapse categories" id="navbarToggleExternalContent">
                    <div class="categories-container container">
                        <ul class="categories-list">
                            @foreach(app(\Botble\Blog\Repositories\Interfaces\CategoryInterface::class)
                                ->advancedGet(['condition' => ['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED,'parent_id'=>0], 'take' => 10,
                                 'with' => ['slugable']]) as $category)
                                <li class="list-item">
                                    <a href="{{ $category->url }}" class=""><span>{{ $category->name }}</span></a>
                                    <ul class="parent-list">
                                        @foreach($category->children as $child)
                                        <li class="item-child">
                                            <a href="{{ $child->url }}" class=""><span>{{$child->name}}</span></a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
