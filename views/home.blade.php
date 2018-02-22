@extends('layouts.master')

@section('navbar')
    @include('partials.header.navbar', ['type'=>'light', 'template'=>'home'])
@endsection

@section('content')
    <main class="jumbotron">
        @include('partials.sections.slider')
    </main>

    <div class="content boxed">

        <section class="section-projects section m-top-20">
            <div class="container-fluid">
                <h2 class="section-title p-bot-20">{{ trans('themes::portfolio.title.portfolios') }}
                    <a href="{{ route('portfolio.index') }}" class="link-arrow-2 pull-right">{{ trans('themes::portfolio.title.all portfolios') }}
                        <i class="icon ion-ios-arrow-right"></i>
                    </a>
                </h2>
            </div>
            <div class="project-carousel owl-carousel">
                @foreach(app(\Modules\Portfolio\Repositories\PortfolioRepository::class)->latest(8) as $portfolio)
                <div class="project-item item-shadow building">
                    <img alt="{{ $portfolio->title }}" class="img-responsive" src="{{ $portfolio->present()->firstImage(426,579,'fit',80) }}">
                    <div class="project-hover">
                        <div class="project-hover-content">
                            <h3 class="project-title">
                                <a href="{{ $portfolio->url }}">{!! wordwrap($portfolio->title, 1,'<br/>') !!}</a></h3>
                            <p class="project-description">
                                {!! str_sentence($portfolio->description, 1) !!}
                            </p>
                        </div>
                    </div>
                    <a href="{{ $portfolio->url }}" class="link-arrow link-arrow-2">{{ trans('themes::portfolio.button.detail') }} <i class="icon ion-ios-arrow-right"></i></a>
                </div>
                @endforeach
            </div>
        </section>

        @php
            $recentPosts = News::latest(8);
        @endphp
        @if(count($recentPosts)>0)
        <section class="section-news section m-bot-20 m-top-20">
            <div class="container-fluid">
                <h2 class="section-title p-bot-20">{{ trans('themes::news.title') }}
                    <a href="{{ route('news.index') }}" class="link-arrow-2 pull-right">{{ trans('themes::news.other news') }}
                        <i class="icon ion-ios-arrow-right"></i>
                    </a>
                </h2>
                <div class="news-carousel owl-carousel">
                    @foreach($recentPosts as $recentPost)
                    <div class="news-item">
                        <img alt="{{ $recentPost->title }}" src="{{ $recentPost->present()->firstImage(370,370,'fit',80) }}">
                        <div class="news-hover">
                            <div class="content">
                                <div class="time">{{ $recentPost->created_at->formatLocalized('%d %B %Y') }}</div>
                                <h3 class="news-title"><a href="{{ $recentPost->url }}">{{ $recentPost->title }}</a></h3>
                                <p class="news-description">{!! Str::words(strip_tags($recentPost->intro), 15) !!}</p>
                            </div>
                            <a class="read-more link-arrow-2" href="{{ $recentPost->url }}">{{ trans('global.buttons.read more') }} <i class="icon ion-ios-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </div>


    @include('partials.sections.clients')

@endsection

@push('js-inline')
<script>
    $(document).ready(function () {
        var classChanged = false;
        $('#navbar').on('classChanged', function () {
            if($('#navbar').hasClass('affix')) {
                $('.navbar.affix .brand img').attr('src', '/themes/architect/images/logo/logo-dark.svg');
                $('.navbar .icon-bar').attr('style', 'background-color:#404040;');
                classChanged = true;
            } else {
                $('.navbar .brand img').attr('src', '/themes/architect/images/logo/logo-light.svg');
                $('.navbar .icon-bar').attr('style', 'background-color:#fff;');
                classChanged = true;
            }
        });
        if(classChanged === false) {
            if($('#navbar').hasClass('affix')) {
                $('.navbar.affix .brand img').attr('src', '/themes/architect/images/logo/logo-dark.svg');
                $('.navbar .icon-bar').attr('style', 'background-color:#404040;');
            }
        }
    });
</script>
@endpush