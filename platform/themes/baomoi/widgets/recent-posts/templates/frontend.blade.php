@if (is_plugin_active('blog'))
    @php
        $posts = get_recent_posts($config['number_display']);
    @endphp
    @if ($posts->count())
        @if (is_plugin_active('blog'))
            @php
                $posts = get_recent_posts($config['number_display']);
            @endphp
            @if ($posts->count())
                <div class="col-md-4 col-12">
                    <div class="widget widget--transparent widget__footer">
                        <div class="widget__header"><h3 class="widget__title">Recent Posts</h3></div>
                        <div class="widget__content">
                            <ul class="list list--light list--fadeIn">
                                <li><a href="https://cms.botble.com/the-top-2020-handbag-trends-to-know"
                                       title="The Top 2020 Handbag Trends to Know" data-number-line="2">The Top 2020 Handbag
                                        Trends to Know</a></li>
                                <li><a href="https://cms.botble.com/top-search-engine-optimization-strategies"
                                       title="Top Search Engine Optimization Strategies!" data-number-line="2">Top Search
                                        Engine Optimization Strategies!</a></li>
                                <li><a href="https://cms.botble.com/which-company-would-you-choose"
                                       title="Which Company Would You Choose?" data-number-line="2">Which Company Would You
                                        Choose?</a></li>
                                <li><a href="https://cms.botble.com/used-car-dealer-sales-tricks-exposed"
                                       title="Used Car Dealer Sales Tricks Exposed" data-number-line="2">Used Car Dealer
                                        Sales Tricks Exposed</a></li>
                                <li><a href="https://cms.botble.com/20-ways-to-sell-your-product-faster"
                                       title="20 Ways To Sell Your Product Faster" data-number-line="2">20 Ways To Sell Your
                                        Product Faster</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{--        <div class="sidebar-widget widget_alitheme_lastpost mb-50">--}}
                {{--            <div class="widget-header position-relative mb-20 pb-10">--}}
                {{--                <h5 class="widget-title">{{ $config['name'] }}</h5>--}}
                {{--            </div>--}}
                {{--            <div class="row">--}}
                {{--                @foreach($posts as $post)--}}
                {{--                    <div class="col-md-6 col-sm-6 sm-grid-content mb-30">--}}
                {{--                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">--}}
                {{--                            <a href="{{ $post->url }}">--}}
                {{--                                <img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">--}}
                {{--                            </a>--}}
                {{--                        </div>--}}
                {{--                        <div class="post-content media-body">--}}
                {{--                            <a href="{{ $post->url }}"><h6 class="post-title mb-10 text-limit-2-row">{{ $post->name }}</h6></a>--}}
                {{--                            <div class="entry-meta meta-1 font-xxs color-grey">--}}
                {{--                                <span class="post-on has-dot">{{ $post->created_at->translatedFormat('M d, Y') }}</span>--}}
                {{--                                <span class="hit-count has-dot">{{ __(':count Views', ['count' => number_format($post->views)]) }}</span>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                @endforeach--}}
                {{--            </div>--}}
                {{--        </div>--}}
            @endif
        @endif

        {{--        <div class="sidebar-widget widget_alitheme_lastpost mb-50">--}}
        {{--            <div class="widget-header position-relative mb-20 pb-10">--}}
        {{--                <h5 class="widget-title">{{ $config['name'] }}</h5>--}}
        {{--            </div>--}}
        {{--            <div class="row">--}}
        {{--                @foreach($posts as $post)--}}
        {{--                    <div class="col-md-6 col-sm-6 sm-grid-content mb-30">--}}
        {{--                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">--}}
        {{--                            <a href="{{ $post->url }}">--}}
        {{--                                <img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">--}}
        {{--                            </a>--}}
        {{--                        </div>--}}
        {{--                        <div class="post-content media-body">--}}
        {{--                            <a href="{{ $post->url }}"><h6 class="post-title mb-10 text-limit-2-row">{{ $post->name }}</h6></a>--}}
        {{--                            <div class="entry-meta meta-1 font-xxs color-grey">--}}
        {{--                                <span class="post-on has-dot">{{ $post->created_at->translatedFormat('M d, Y') }}</span>--}}
        {{--                                <span class="hit-count has-dot">{{ __(':count Views', ['count' => number_format($post->views)]) }}</span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                @endforeach--}}
        {{--            </div>--}}
        {{--        </div>--}}
    @endif
@endif
