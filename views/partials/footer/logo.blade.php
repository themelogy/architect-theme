<a class="footer-brand" href="{{ url(LaravelLocalization::getCurrentLocale()) }}">
    <img alt="{{ setting('theme::company-name') }}" src="{{ Theme::url("images/logo/logo-dark.svg") }}">
</a>
<div class="social-list m-top-20">
    @include('partials.components.social')
</div>
<div class="copyrights p-top-30" style="color: grey;">{!! trans('themes::theme.footer.copyrights', ['company'=>setting('theme::company-name')]) !!}</div>