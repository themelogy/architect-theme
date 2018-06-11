<section class="section-projects section m-top-20">
    <div class="container-fluid">
        <h2 class="section-title p-bot-20">{!! Page::findBySlug('proje-gelistirme')->title !!}</h2>
    </div>
    <div class="content">
        <div class="row">
            @portfolioGroups(4, 'home-group')
        </div>
    </div>
</section>