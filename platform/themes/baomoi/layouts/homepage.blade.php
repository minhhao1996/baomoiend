{!! Theme::partial('header') !!}
<main class="main" id="main-section">
    <section class="mt-60 mb-60">
        <div class="site-content container">
            <div class="row">
                <div class=" main-content col-md-8 col-12">
                    <div class="list-main-post">

                    </div>

                    @foreach (get_featured_categories(5) as $category)
                        <section class="post-slider">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="most-new-title">
                                        <a href="{{$category->url}}" title="{{$category->name}}">
                                            {{$category->name}}
                                        </a>
                                    </h3>
                                    <div id="news-{{$category->id}}" class="owl-carousel">
                                        @foreach ($category->posts()->limit(10)->get() as $post)
                                            <div class="post-slide">
                                                <div class="post-img">
                                                    <img src="{{ get_object_image($post->image, 'medium') }}"
                                                         alt="{{ $post->name }}">
                                                </div>
                                                <div class="post-content">
                                                    <h3 class="post-title">
                                                        <a href="{{ $post->url }}" title="{{ $post->url }}">
                                                            {{ $post->name }}
                                                        </a>
                                                    </h3>
                                                    <p class="post-description">{{ $post->description }}</p>
                                                    <span class="post-date"><i class="far fa-clock"></i>{{ date_from_database($post->created_at, 'M d, Y') }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                        <script>
                            $("#news-{{$category->id}}").owlCarousel({
                                responsive: {
                                    0: {
                                        items: 2,
                                        stagePadding: 30
                                    },
                                    600: {
                                        items: 2,
                                        stagePadding: 50
                                    },
                                    1000: {
                                        items: 3,
                                        stagePadding: 80
                                    }
                                },
                                dots: false,
                                autoPlay: true,
                                loop: false,
                                margin: 5,
                                responsiveClass: true,
                            });
                        </script>
                    @endforeach
                </div>
                <div class="right-sidebar col-md-4 col-12">
                    <div class="most-new ">
                        <h3 class="most-new-title">Popular Posts</h3>
                        @if (is_plugin_active('blog'))
                            @php
                                $recentPosts = get_popular_posts(12);
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
                                                        <a href="{{$post->url}}" title="{{$post->name}}">
                                                            {{$post->name}}
                                                        </a>
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
                        <h3 class="most-new-title">Recent Posts</h3>
                        @if (is_plugin_active('blog'))
                            @php
                                $recentPosts = get_recent_posts(12);
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
                                                        <a href="{{$post->url}}" title="{{$post->name}}">
                                                            {{$post->name}}
                                                        </a>
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
        </div>
    </section>
</main>
{!! Theme::partial('footer') !!}
