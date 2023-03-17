    {!! dynamic_sidebar('top_footer_sidebar') !!}
    <footer class="footer ps-container">
        <footer class="footer ps-container">
            <div class="footer-contact ">
                <p class="footer-contact-tittle">
                    <a href="{{ route('public.index') }}"><img style="max-width: 150px"
                                                               src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"
                                                               alt="{{ theme_option('site_title') }}"></a>
                </p>
                <form class="newsletter-form contact-email"  action="{{ route('public.search') }}" method="GET" >
                    @csrf
                    <div class="sg-input-line-container position-relative">
                            <span class="icon-outline-error">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        <input placeholder="Enter key search..." type="text" name="q" class="sg-input-line" value="{{ BaseHelper::stringify(request()->query('q')) }}">
                        <span class="sg-caption-light sg-input-error"></span>
                    </div>
                    <div class="contact-subscribe">
                        <button type="submit" class="sg-button-primary">
                            Search
                        </button>
                    </div>
                </form>

            </div>
            {{--            {!! dynamic_sidebar('footer_sidebar') !!}--}}

            <div class="footer-Copyright ">
                <span class="copyright">
                    {{ theme_option('copyright') }}
                </span>
            </div>
        </footer>
    </footer>
    <!-- Quick view -->
    <div class="modal fade custom-modal" id="quick-view-modal" tabindex="-1" aria-labelledby="quick-view-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="half-circle-spinner loading-spinner">
                        <div class="circle circle-1"></div>
                        <div class="circle circle-2"></div>
                    </div>
                    <div class="quick-view-content"></div>
                </div>
            </div>
        </div>
    </div>

    @if (is_plugin_active('ecommerce'))
        <script>
            window.currencies = {!! json_encode(get_currencies_json()) !!};
        </script>
    @endif

    {!! Theme::footer() !!}

    <script>
        window.trans = {
            "Views": "{{ __('Views') }}",
            "Read more": "{{ __('Read more') }}",
            "days": "{{ __('days') }}",
            "hours": "{{ __('hours') }}",
            "mins": "{{ __('mins') }}",
            "sec": "{{ __('sec') }}",
            "No reviews!": "{{ __('No reviews!') }}"
        };
    </script>

    {!! Theme::place('footer') !!}

    @if (session()->has('success_msg') || session()->has('error_msg') || (isset($errors) && $errors->count() > 0) || isset($error_msg))
            <script type="text/javascript">
                window.onload = function () {
                    @if (session()->has('success_msg'))
                    window.showAlert('alert-success', '{{ session('success_msg') }}');
                    @endif

                    @if (session()->has('error_msg'))
                    window.showAlert('alert-danger', '{{ session('error_msg') }}');
                    @endif

                    @if (isset($error_msg))
                    window.showAlert('alert-danger', '{{ $error_msg }}');
                    @endif

                    @if (isset($errors))
                    @foreach ($errors->all() as $error)
                    window.showAlert('alert-danger', '{!! BaseHelper::clean($error) !!}');
                    @endforeach
                    @endif
                };
            </script>
        @endif

        <div id="scrollUp"><i class="fal fa-long-arrow-up"></i></div>
    </body>
</html>
