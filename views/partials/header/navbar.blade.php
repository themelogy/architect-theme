<header id="navbar" class="navbar {{ $template ?? null }} boxed js-navbar navbar-fixed-top {{ $border ?? null }}">
    <button type="button" class="navbar-toggle {{ $type or null }}" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <a class="brand" href="{{ url(LaravelLocalization::getCurrentLocale()) }}">
        @if(isset($type))
            <img alt="{{ setting('theme::company-name') }}" src="{{ Theme::url("images/logo/logo-$type.svg") }}">
        @else
            <img alt="{{ setting('theme::company-name') }}" src="{{ Theme::url("images/logo/logo.svg") }}">
        @endif
    </a>

    <div class="social-list{{ !isset($social) ? ' hidden' : ' hidden-xs' }}">
        @include('partials.components.social')
    </div>

    <div class="navbar-spacer hidden-sm hidden"></div>
</header>