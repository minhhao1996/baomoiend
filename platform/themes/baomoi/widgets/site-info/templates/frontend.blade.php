<div class="footer-menu">
    @if (theme_option('social_links'))
        <div class="mobile-social-icon nav-footer">
            @foreach(json_decode(theme_option('social_links'), true) as $socialLink)
                @if (count($socialLink) == 4)
                    <a href="{{ $socialLink[2]['value'] }}"
                       title="{{ $socialLink[0]['value'] }}" style="background-color: {{ $socialLink[3]['value'] }}; border: 1px solid {{ $socialLink[3]['value'] }};">
                        <i class="{{ $socialLink[1]['value'] }}"></i>
                    </a>
                @endif
            @endforeach
        </div>
    @endif
</div>
