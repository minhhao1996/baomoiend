@php
    Theme::asset()->container('footer')->usePath()->add('jquery.theia.sticky-js', 'js/plugins/jquery.theia.sticky.js');
@endphp

{!! Theme::partial('header') !!}

<main class="main" id="main-section">
{{--    @if (Theme::get('hasBreadcrumb', true))--}}
{{--        {!! Theme::partial('breadcrumb') !!}--}}
{{--    @endif--}}

    <section class="mt-60 mb-60">
        <div class="site-content container">
            {!! Theme::content() !!}
        </div>
    </section>
</main>
{!! Theme::partial('footer') !!}


