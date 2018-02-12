<footer id="footer" class="footer p-top-bot-50 boxed">
    <div class="footer-flex">
        <div class="flex-item">
            <a class="footer-brand" href="{{ url(LaravelLocalization::getCurrentLocale()) }}">
                <img alt="" src="{{ Theme::url("images/logo/logo-light.svg") }}">
            </a>
            <div class="social-list m-top-20">
                @include('partials.components.social')
            </div>
            <div class="copyrights p-top-30" style="color: grey;">{!! trans('themes::theme.footer.copyrights', ['company'=>setting('theme::company-name')]) !!}</div>
        </div>
        <div class="flex-item">
            <address>
                {!! setting('theme::address') !!}<br/>
                <abbr title="{{ trans('themes::contact.title.phone') }}">T:</abbr> {!! setting('theme::phone') !!} / {!! setting('theme::phone2') !!}<br/>
                <abbr title="{{ trans('themes::contact.title.fax') }}">F:</abbr> {!! setting('theme::fax') !!}
            </address>
        </div>
        <div class="flex-item">
            {!! Menu::render('alt-menu-sol', \Themes\Architect\Presenter\FooterMenuLinksPresenter::class) !!}
        </div>
        <div class="flex-item">
            {!! Menu::render('alt-menu-sag', \Themes\Architect\Presenter\FooterMenuLinksPresenter::class) !!}
        </div>
        <div class="flex-item">
            <ul>
                @include('partials.components.language',['list_type'=>'true'])
            </ul>
        </div>
    </div>
</footer>
<a class="bt-top" href="#top"><i class="fa fa-angle-up"></i></a>