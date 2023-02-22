@if ($posts->count() > 0)
    @if (is_plugin_active('blog'))
        <div class="row">
            <div class=" main-content col-md-8 col-12">
                @php
                    $featured = get_featured_posts(8);
                    $featuredList = [];
                    if (!empty($featured)) {
                        $featuredList = $featured->pluck('id')->all();
                    }
                @endphp

                @if (!empty($featured))
                    <section class="featured">
                        <div class="row">
                            @foreach ($featured as $key=> $feature_item)
                                @if ($key < 1)
                                    <div class="first-featured col-sm-8 col-12">
                                        <div class="thumb-art">
                                            <a href="{{ $feature_item->url }}"
                                               title="Không khởi tố vụ bé trai lọt vào cọc bê tông ở Đồng Tháp">
                                                <figure class="bm_Bh"><img
                                                        src="{{ get_object_image($feature_item->image, 'featured') }}"
                                                        alt="{{ $feature_item->name }}"></figure>
                                            </a>
                                        </div>
                                        <div class="description">
                                            <div class="description-title">
                                                <h4>
                                                    <a href="{{ $feature_item->url }}"
                                                       title="{{ $feature_item->name }}">
                                                        {{ $feature_item->name }}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="description-content">
                                                {{ $feature_item->description }}
                                            </div>
                                            <div class="meta-news">
                                                <time datetime="2023-02-17T21:05:00+07:00"><i class="far fa-clock"></i>
                                                    &nbsp;{{ date_from_database($feature_item->created_at, 'M d, Y') }}
                                                    <span
                                                        class="hit-count has-dot">  {{ __(':count Views', ['count' => number_format($feature_item->views)]) }}</span>
                                                </time>
                                                @if ($feature_item->first_category->name)
                                                    <div class="entry-meta">
                                                        <a class="entry-meta meta-2"
                                                           href="{{ $feature_item->first_category->url }}">{{ $feature_item->first_category->name }}</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($key < 5)
                                    <div class="second_featured col-sm-4 col-12">
                                        <div class="thumb-art">
                                            <a href="{{ $feature_item->url }}" title="{{ $feature_item->name }}">
                                                <figure class="bm_Bh"><img
                                                        src="{{ get_object_image($feature_item->image, 'medium') }}"
                                                        alt="{{ $feature_item->name }}"></figure>
                                            </a>
                                        </div>
                                        <div class="description">
                                            <div class="description-title">
                                                <h4>
                                                    <a href="" title="">
                                                        {{ $feature_item->name }}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="description-content">
                                                {{ $feature_item->description }}
                                            </div>
                                            <div class="meta-news">
                                                <time datetime="2023-02-17T21:05:00+07:00"><i class="far fa-clock"></i>
                                                    &nbsp;{{ date_from_database($feature_item->created_at, 'M d, Y') }}
                                                    <span
                                                        class="hit-count has-dot">  {{ __(':count Views', ['count' => number_format($feature_item->views)]) }}</span>
                                                </time>
                                                @if ($feature_item->first_category->name)
                                                    <div class="entry-meta">
                                                        <a class="entry-meta meta-2"
                                                           href="{{ $feature_item->first_category->url }}">{{ $feature_item->first_category->name }}</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <article class="post_item">
                                        <div class="thumb-art">
                                            <a href="{{ $feature_item->url }}" title="{{ $feature_item->name }}">
                                                <figure class="bm_Bh"><img
                                                        src="{{ get_object_image($feature_item->image, 'medium') }}"
                                                        alt="{{ $feature_item->name }}"></figure>
                                            </a>
                                        </div>
                                        <div class="description">
                                            <div class="description-title">
                                                <h4>
                                                    <a href="" title="">
                                                        {{$feature_item->name}}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="description-content">
                                                {{$feature_item->description}}
                                            </div>
                                            <div class="meta-news">
                                                <time datetime="2023-02-17T21:05:00+07:00"><i class="far fa-clock"></i>
                                                    &nbsp;{{ date_from_database($feature_item->created_at, 'M d, Y') }}
                                                    <span
                                                        class="hit-count has-dot">  {{ __(':count Views', ['count' => number_format($feature_item->views)]) }}</span>
                                                </time>
                                                @if ($feature_item->first_category->name)
                                                    <div class="entry-meta">
                                                        <a class="entry-meta meta-2"
                                                           href="{{ $feature_item->first_category->url }}">{{ $feature_item->first_category->name }}</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </article>
                                @endif
                            @endforeach
                        </div>


                    </section>
                @endif

                @foreach (get_featured_categories(3) as $category)
                    <section class="post-slider">
                        <h3 class="most-new-title">
                            <a href="{{$category->url}}" title="{{$category->name}}">
                                {{$category->name}}
                            </a>
                        </h3>
                        <div id="news-{{$category->id}}" class="owl-carousel">
                            @foreach ($category->posts()->limit(6)->get() as $post)
                                <div class="post-slide">
                                    <div class="post-img">
                                        <img src="{{ get_object_image($post->image, 'medium') }}"
                                             alt="{{ $post->name }}">
                                        <a href="{{ $post->url }}" class="over-layer"><i class="fa fa-link"></i></a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="{{ $post->url }}">{{ $post->name }}</a>
                                        </h3>
                                        <p class="post-description">{{ $post->description }}</p>
                                        <span class="post-date"><i class="far fa-clock"></i>{{ date_from_database($post->created_at, 'M d, Y') }}</span>
                                        <a href="#" class="read-more">read more</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <script>
                        $("#news-{{$category->id}}").owlCarousel({
                            items: 2,
                            itemsDesktop: [1199, 3],
                            itemsDesktopSmall: [980, 2],
                            itemsMobile: [600, 1],
                            navigation: true,
                            navigationText: ["", ""],
                            pagination: true,
                            autoPlay: true,
                            loop: false,
                            margin: 5,
                            responsiveClass: true,
                            stagePadding: 80
                        });
                    </script>
                @endforeach
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
                                                <time datetime="2023-02-17T21:05:00+07:00"><i class="far fa-clock"></i>
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
                                                <time datetime="2023-02-17T21:05:00+07:00"><i class="far fa-clock"></i>
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
                                                <time datetime="2023-02-17T21:05:00+07:00"><i class="far fa-clock"></i>
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
                                                <time datetime="2023-02-17T21:05:00+07:00"><i class="far fa-clock"></i>
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
    @endif

    {!! $posts->withQueryString()->links(Theme::getThemeNamespace() . '::partials.custom-pagination') !!}
@endif
