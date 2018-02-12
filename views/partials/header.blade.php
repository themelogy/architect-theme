<div class="click-capture"></div>

<div class="menu">
    <div class="menu-header">
        <a class="brand" href="{{ url(LaravelLocalization::getCurrentLocale()) }}">
            <img alt="{{ setting('theme::company-name') }}" src="{{ Theme::url("images/logo/logo-light.svg") }}">
        </a>
        <span class="close-menu icon-cross2 right-boxed"></span>
    </div>

    {!! Menu::render('ust-menu', \Themes\Architect\Presenter\HeaderMenuPresenter::class) !!}

    <div class="menu-footer right-boxed">
        <div class="menu-lang m-bot-20">
            @include('partials.components.language')
        </div>
        <div class="social-list">
            @include('partials.components.social')
        </div>
        <div class="copy">{!! trans('themes::theme.footer.copyrights', ['company'=>setting('theme::company-name')]) !!}</div>
    </div>
</div>

<header class="navbar boxed js-navbar">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <a class="brand" href="{{ url(LaravelLocalization::getCurrentLocale()) }}">
        <img alt="{{ setting('theme::company-name') }}" src="{{ Theme::url("images/logo/logo-light.svg") }}">
    </a>

    <div class="social-list hidden">
        @include('partials.components.social')
    </div>

    <div class="navbar-spacer hidden-sm hidden"></div>
</header>