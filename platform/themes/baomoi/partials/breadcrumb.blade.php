
<div class=" title_wrap">
    <div class=" cat">
        <div class=" page_title">
            @foreach ($crumbs = Theme::breadcrumb()->getCrumbs() as $i => $crumb)
                @if ($i != (count($crumbs) - 1))
                    <div itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="bm_T d-inline-block">
                        <a href="{{ $crumb['url'] }}" itemprop="item" title="{{ $crumb['label'] }}">
                            {{ $crumb['label'] }}
                            <meta itemprop="name" content="{{ $crumb['label'] }}" />
                        </a>
                        <meta itemprop="position" content="{{ $i + 1}}" />
                    </div>

                @else
                    <div class="bm_T d-inline-block active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <span itemprop="item">
                            {!! $crumb['label'] !!}
                        </span>
                        <meta itemprop="name" content="{{ $crumb['label'] }}" />
                        <meta itemprop="position" content="{{ $i + 1}}" />
                    </div>
                @endif
            @endforeach
        </div>
    </div>

</div>
