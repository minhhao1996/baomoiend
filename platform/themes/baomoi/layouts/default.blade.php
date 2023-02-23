{!! Theme::partial('header') !!}

<main class="main" id="main-section">
    <section class="mt-60 mb-60">
        <div class="site-content container">
            @if (Theme::get('hasBreadcrumb', true))
                {!! Theme::partial('breadcrumb') !!}
            @endif
            {!! Theme::content() !!}
        </div>
    </section>
</main>

{!! Theme::partial('footer') !!}
