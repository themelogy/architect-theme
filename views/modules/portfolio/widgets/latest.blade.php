@if(count($portfolios)>0)
<section class="section-projects section m-top-20">
    <div class="container-fluid">
        <h2 class="section-title p-bot-20">{{ trans('themes::portfolio.title.portfolios') }}
            <a href="{{ route('portfolio.index') }}" class="link-arrow-2 pull-right">{{ trans('themes::portfolio.title.all portfolios') }}
                <i class="icon ion-ios-arrow-right"></i>
            </a>
        </h2>
    </div>
    <div class="project-carousel owl-carousel">
        @foreach($portfolios as $portfolio)
            <div class="project-item item-shadow building">
                <img alt="{{ $portfolio->title }}" class="img-responsive" src="{{ $portfolio->present()->firstImage(426,579,'fit',60) }}">
                <div class="project-hover">
                    <div class="project-hover-content">
                        <h3 class="project-title">
                            <a href="{{ $portfolio->url }}">{!! wordwrap($portfolio->title, 1,'<br/>') !!}</a></h3>
                        <p class="project-description">
                            {!! str_sentence($portfolio->description, 1) !!}
                        </p>
                    </div>
                </div>
                <a href="{{ $portfolio->url }}" class="fill-div">{{ trans('themes::portfolio.button.detail') }} <i class="icon ion-ios-arrow-right"></i></a>
            </div>
        @endforeach
    </div>
</section>
@push('js-stack')
{!! Asset::add(Theme::url('vendor/owl.carousel/dist/owl.carousel.min.js')) !!}
@endpush
@endif