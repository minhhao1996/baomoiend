<div class="row">
    <div class="main-content col-md-8 col-12">
        <div class="single-page">
            <div class="single-header style-2">
                <h1 class="mb-30">{{ $post->name }}</h1>
                <div class="single-header-meta">
                    <div class="entry-meta meta-1 font-xs">
                        <span class="post-by">{{ __('By') }} {{ $post->author->name }}</span>
                        <span class="post-on has-dot">{{ $post->created_at->translatedFormat('M d, Y') }}</span>
                        <span class="time-reading has-dot">{{ __(':count mins read', ['count' => get_time_to_read($post)]) }}</span>
                        <span class="hit-count has-dot">{{ __(':count Views', ['count' => number_format($post->views)]) }}</span>
                    </div>
                    <div class="social-icons social-icons-colored-hover">
                        <ul class="text-grey-5 ">
                            <li><strong class="mr-10">{{ __('Share this') }}:</strong></li>
                            <li class="social-facebook">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($post->url) }}" target="_blgiank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="social-twitter">
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode($post->url) }}&text={{ strip_tags($post->description) }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="social-linkedin">
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($post->url) }}&summary={{ rawurldecode(strip_tags($post->description)) }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="single-content">
                {!! BaseHelper::clean($post->content) !!}
                <br>
                {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes' ? Theme::partial('comments') : null) !!}
            </div>
        </div>
    </div>
    <div class="right-sidebar col-md-4 col-12">
        <div class="most-new">
            <h3 class="most-new-title">Recent Posts</h3>
            @if (is_plugin_active('blog'))
                @php
                    $recentPosts = get_recent_posts(8);
                @endphp
                @if ($recentPosts->count())
                    @foreach($recentPosts  as $key=> $post)
                        @if($key ===0)
                            <div class="new-first">
                                <div class="thumb-art">
                                    <a href="{{$post->url}}" title="{{$post->name}}">
                                        <figure class="bm_Bh"><img
                                                src="{{ get_object_image($post->image, 'product-thumb') }}"
                                                alt="{{$post->name}}"></figure>
                                    </a>
                                </div>
                                <div class="description">
                                    <div class="description-title">
                                        <h4>
                                            <a href="{{$post->url}}" title="{{$post->name}}">
                                                {{$post->name}}
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="description-content">
                                        {{$post->description}}
                                    </div>
                                    <div class="meta-news">
                                        <time datetime="{{$post->created_at}}"><i class="far fa-clock"></i>
                                            &nbsp;{{ date_from_database($post->created_at, 'M d, Y') }}
                                            <span
                                                class="hit-count has-dot">  {{ __(':count Views', ['count' => number_format($post->views)]) }}</span>
                                        </time>
                                        @if ($post->first_category->name)
                                            <div class="entry-meta">
                                                <a class="entry-meta meta-2"
                                                   href="{{ $post->first_category->url }}">{{ $post->first_category->name }}</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="news-item">
                                <div class="thumb-art">
                                    <a href="{{$post->url}}" title="{{$post->name}}">
                                        <figure class="bm_Bh">
                                            <img src="{{ get_object_image($post->image, 'thumb') }}"
                                                 alt="{{$post->name}}"></figure>
                                    </a>
                                </div>
                                <div class="description">
                                    <div class="description-title">
                                        <h4>
                                            {{$post->name}}
                                        </h4>
                                    </div>
                                    <div class="meta-news">
                                        <time datetime="{{$post->created_at}}"><i class="far fa-clock"></i>
                                            &nbsp;{{ date_from_database($post->created_at, 'M d, Y') }}
                                        </time>
                                        @if ($post->first_category->name)
                                            <div class="entry-meta">
                                                <a class="entry-meta meta-2"
                                                   href="{{ $post->first_category->url }}">{{ $post->first_category->name }}</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach
                @endif
            @endif
        </div>
        <div class="most-new mt-5">
            <h3 class="most-new-title">Popular Posts</h3>
            @if (is_plugin_active('blog'))
                @php
                    $recentPosts = get_popular_posts(8);
                @endphp
                @if ($recentPosts->count())
                    @foreach($recentPosts  as $key=> $post)
                        @if($key ===0)
                            <div class="new-first">
                                <div class="thumb-art">
                                    <a href="{{$post->url}}" title="{{$post->name}}">
                                        <figure class="bm_Bh"><img
                                                src="{{ get_object_image($post->image, 'product-thumb') }}"
                                                alt="{{$post->name}}"></figure>
                                    </a>
                                </div>
                                <div class="description">
                                    <div class="description-title">
                                        <h4>
                                            <a href="{{$post->url}}" title="{{$post->name}}">
                                                {{$post->name}}
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="description-content">
                                        {{$post->description}}
                                    </div>
                                    <div class="meta-news">
                                        <time datetime="{{$post->created_at}}"><i class="far fa-clock"></i>
                                            &nbsp;{{ date_from_database($post->created_at, 'M d, Y') }}
                                            <span
                                                class="hit-count has-dot">  {{ __(':count Views', ['count' => number_format($post->views)]) }}</span>
                                        </time>
                                        @if ($post->first_category->name)
                                            <div class="entry-meta">
                                                <a class="entry-meta meta-2"
                                                   href="{{ $post->first_category->url }}">{{ $post->first_category->name }}</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="news-item">
                                <div class="thumb-art">
                                    <a href="{{$post->url}}" title="{{$post->name}}">
                                        <figure class="bm_Bh">
                                            <img src="{{ get_object_image($post->image, 'thumb') }}"
                                                 alt="{{$post->name}}"></figure>
                                    </a>
                                </div>
                                <div class="description">
                                    <div class="description-title">
                                        <h4>
                                            {{$post->name}}
                                        </h4>
                                    </div>
                                    <div class="meta-news">
                                        <time datetime="{{$post->created_at}}"><i class="far fa-clock"></i>
                                            &nbsp;{{ date_from_database($post->created_at, 'M d, Y') }}
                                        </time>
                                        @if ($post->first_category->name)
                                            <div class="entry-meta">
                                                <a class="entry-meta meta-2"
                                                   href="{{ $post->first_category->url }}">{{ $post->first_category->name }}</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach
                @endif
            @endif
        </div>
    </div>
</div>


@php $relatedPosts = get_related_posts($post->id, 3); @endphp
@if ($relatedPosts->count())
    <div class="loop-grid pr-30">
        <h4 class="mb-20">{{ __('Related Articles') }}</h4>
        <div class="row">
            @foreach ($relatedPosts as $relatedItem)
                <div class="col-lg-4 col-md-4 col-12">
                    <article class="wow fadeIn animated hover-up mb-30">
                        <div class="post-thumb img-hover-scale">
                            <a href="{{ $relatedItem->url }}">
                                <img src="{{ RvMedia::getImageUrl($relatedItem->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $relatedItem->name }}">
                            </a>
                            @if ($relatedItem->first_category->name)
                                <div class="entry-meta">
                                    <a class="entry-meta meta-2" href="{{ $relatedItem->first_category->url }}">{{ $relatedItem->first_category->name }}</a>
                                </div>
                            @endif
                        </div>
                        <div class="entry-content-2">
                            <h3 class="post-title mb-15">
                                <a href="{{ $relatedItem->url }}">{{ $relatedItem->name }}</a></h3>
                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                <div>
                                    <span class="post-on has-dot"> <i class="far fa-clock"></i> {{ $relatedItem->created_at->translatedFormat('M d, Y') }}</span>
                                    <span class="hit-count has-dot">{{ __(':count Views', ['count' => number_format($relatedItem->views)]) }}</span>
                                </div>
                                <a href="{{ $relatedItem->url }}" class="text-brand">{{ __('Read more') }} <i class="fa fa-arrow-right fw-300 text-brand ml-5"></i></a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
@endif
