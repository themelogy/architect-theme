<a class="brand" href="{{ url(LaravelLocalization::getCurrentLocale()) }}">
    @if(isset($type))
        @if($type=='light')
            <img alt="{{ setting('theme::company-name') }}" src="{{ Theme::url("images/logo/logo-light.svg") }}">
        @elseif($type=='dark')
            <img alt="{{ setting('theme::company-name') }}" src="{{ Theme::url("images/logo/logo.svg") }}">
        @endif
    @else
            <img alt="{{ setting('theme::company-name') }}" src="{{ Theme::url("images/logo/logo.svg") }}">
    @endif
</a>