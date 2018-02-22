<div class="click-capture"></div>

<div class="menu">
    <div class="menu-header">
        <a class="brand" href="{{ url(LaravelLocalization::getCurrentLocale()) }}">
            <img alt="{{ setting('theme::company-name') }}" src="{{ Theme::url("images/logo/logo-dark.svg") }}">
        </a>
        <span class="close-menu icon-cross2"></span>
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



@if ($__env->yieldContent('navbar'))
    @yield('navbar')
@else
    @include('partials.header.navbar', ['type'=>'dark', 'border'=>'border', 'social'=>true])
@endif