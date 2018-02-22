<footer id="footer" class="footer p-top-bot-50 boxed">
    <div class="footer-flex">
        <div class="flex-item">
            @include('partials.footer.logo')
        </div>
        <div class="flex-item">
            {!! Menu::render('alt-menu-1', \Themes\Architect\Presenter\FooterMenuLinksPresenter::class) !!}
        </div>
        <div class="flex-item">
            {!! Menu::render('alt-menu-2', \Themes\Architect\Presenter\FooterMenuLinksPresenter::class) !!}
        </div>
        <div class="flex-item">
            {!! Menu::render('alt-proje-1', \Themes\Architect\Presenter\FooterMenuLinksPresenter::class) !!}
        </div>
        <div class="flex-item">
            {!! Menu::render('alt-proje-2', \Themes\Architect\Presenter\FooterMenuLinksPresenter::class) !!}
        </div>
        <div class="flex-item">
            {!! Menu::render('alt-proje-3', \Themes\Architect\Presenter\FooterMenuLinksPresenter::class) !!}
        </div>
        <div class="flex-item">
            <ul class="lang">
                @include('partials.components.language',['list_type'=>'true'])
            </ul>
        </div>
    </div>
</footer>
<a class="bt-top" href="#top"><i class="fa fa-angle-up"></i></a>