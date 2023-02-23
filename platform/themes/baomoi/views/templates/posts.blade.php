@if ($posts->count() > 0)
    <div class="single-header mb-80">
        <h1 class="font-xxl text-brand hidden">{{ SeoHelper::getTitle() }}</h1>
        <div class="entry-meta meta-1 font-xs mt-15 mb-15">
            <span class="post-by has-dot d-inline-block">{{ __(':count Categories', ['count' => app(\Botble\Blog\Repositories\Interfaces\CategoryInterface::class)->count(['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED])]) }}</span>
            <span class="post-on d-inline-block has-dot">{{ __(':count Articles', ['count' => app(\Botble\Blog\Repositories\Interfaces\PostInterface::class)->count(['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED])]) }}</span>
            <span class="hit-count d-inline-block has-dot">{{ __(':count Views', ['count' => number_format(app(\Botble\Blog\Repositories\Interfaces\PostInterface::class)->getModel()->sum('views'))]) }}</span>
        </div>
    </div>

    <div class="loop-grid pr-30">
        <div class="row">
            <div class=" main-content col-md-8 col-12">
                <section class="section_container">
                    @foreach ($posts as $post)
                        <div class="post_item">
                            <div class="thumb-art">
                                <a href="{{ $post->url }}" title="{{ $post->name }}">
                                    <figure class="bm_Bh">
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                                    </figure>
                                </a>
                            </div>
                            <div class="description">
                                <div class="description-title">
                                    <h4>
                                        <a href="{{ $post->url }}" title="{{ $post->name }}">
                                            {{ $post->name }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="description-content">
                                    {{ $post->description }}
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
                    @endforeach
                    <div class="button-page">
                        {!! $posts->withQueryString()->links(Theme::getThemeNamespace() . '::partials.custom-pagination') !!}
                    </div>
                </section>
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
    </div>
@endif
