@if (!empty($post))
    <section class="featured">
        <div class="row">
            @foreach ($post as $key=> $post_item)
                @if ($key < 1)
                    <div class="first-featured col-sm-8 col-12">
                        <div class="thumb-art">
                            <a href="{{ $post_item->url }}"
                               title="{{ $post_item->name }}">
                                <figure class="bm_Bh"><img
                                        src="{{ get_object_image($post_item->image, 'featured') }}"
                                        alt="{{ $post_item->name }}"></figure>
                            </a>
                        </div>
                        <div class="description">
                            <div class="description-title">
                                <h4>
                                    <a href="{{ $post_item->url }}"
                                       title="{{ $post_item->name }}">
                                        {{ $post_item->name }}
                                    </a>
                                </h4>
                            </div>
                            <div class="description-content">
                                {{ $post_item->description }}
                            </div>
                            <div class="meta-news">
                                <time datetime="{{$post_item->created_at}}"><i class="far fa-clock"></i>
                                    &nbsp;{{ date_from_database($post_item->created_at, 'M d, Y') }}
                                    <span
                                        class="hit-count has-dot">  {{ __(':count Views', ['count' => number_format($post_item->views)]) }}</span>
                                </time>
                                @if ($post_item->first_category->name)
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2"
                                           href="{{ $post_item->first_category->url }}">{{ $post_item->first_category->name }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @elseif ($key < 5)
                    <div class="second_featured col-sm-4 col-6">
                        <div class="thumb-art">
                            <a href="{{ $post_item->url }}" title="{{ $post_item->name }}">
                                <figure class="bm_Bh"><img
                                        src="{{ get_object_image($post_item->image, 'product-thumb') }}"
                                        alt="{{ $post_item->name }}"></figure>
                            </a>
                        </div>
                        <div class="description">
                            <div class="description-title">
                                <h4>
                                    <a href="{{ $post_item->url }}" title="{{ $post_item->name }}">
                                        {{ $post_item->name }}
                                    </a>
                                </h4>
                            </div>
                            <div class="description-content">
                                {{ $post_item->description }}
                            </div>
                            <div class="meta-news">
                                <time datetime="{{$post_item->created_at}}"><i class="far fa-clock"></i>
                                    &nbsp;{{ date_from_database($post_item->created_at, 'M d, Y') }}
                                    <span
                                        class="hit-count has-dot">  {{ __(':count Views', ['count' => number_format($post_item->views)]) }}</span>
                                </time>
                                @if ($post_item->first_category->name)
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2"
                                           href="{{ $post_item->first_category->url }}">{{ $post_item->first_category->name }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <article class="post_item">
                        <div class="thumb-art">
                            <a href="{{ $post_item->url }}" title="{{ $post_item->name }}">
                                <figure class="bm_Bh"><img
                                        src="{{ get_object_image($post_item->image, 'product-thumb') }}"
                                        alt="{{ $post_item->name }}"></figure>
                            </a>
                        </div>
                        <div class="description">
                            <div class="description-title">
                                <h4>
                                    <a href="{{ $post_item->url }}" title="{{ $post_item->name }}">
                                        {{$post_item->name}}
                                    </a>
                                </h4>
                            </div>
                            <div class="description-content">
                                {{$post_item->description}}
                            </div>
                            <div class="meta-news">
                                <time datetime="{{$post_item->created_at}}"><i class="far fa-clock"></i>
                                    &nbsp;{{ date_from_database($post_item->created_at, 'M d, Y') }}
                                    <span
                                        class="hit-count has-dot">  {{ __(':count Views', ['count' => number_format($post_item->views)]) }}</span>
                                </time>
                                @if ($post_item->first_category->name)
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2"
                                           href="{{ $post_item->first_category->url }}">{{ $post_item->first_category->name }}</a>
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
