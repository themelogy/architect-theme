@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="project-detail">
            <div class="rev_slider_wrapper">
                <div id="rev_slider2" class="rev_slider tp-overflow-hidden fullscreenbanner">
                    <ul class="lightgallery">
                        @foreach($portfolio->present()->images(null,1080,'resize',80) as $image)
                        <li data-transition="slideleft" data-masterspeed="1200" data-fsmasterspeed="1200" data-thumb="{{ $image }}">
                            <a class="popup-image slider-zoom" data-src="{{ $image }}" data-sub-html="{{ $portfolio->title }}"><i class="fa fa-expand"></i></a>
                            <img data-lazyload="{{ $image }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="project-detail-button">
                <a href="#"><i class="fa fa-info"></i></a>
            </div>
            <div class="project-overlay"></div>
            <div class="project-detail-info">
                <span class="close-menu icon-cross2"></span>
                <div class="project-detail-content">
                    <h3 class="project-detail-title">{{ $portfolio->title }}</h3>
                    <div class="project-detail-text">{!! $portfolio->description !!}</div>
                    <ul class="project-detail-list text-white">
                        @if(!empty(@$portfolio->settings->location))
                        <li>
                            <span class="left uppercase">{{ trans('themes::portfolio.title.location') }}:</span>
                            <span class="right">{{ $portfolio->settings->location }}</span>
                        </li>
                        @endif
                        <li>
                            <span class="left">{{ trans('themes::portfolio.title.year') }}:</span>
                            <span class="right">{{ $portfolio->created_at->formatLocalized('%Y') }}</span>
                        </li>
                        @if(!empty(@$portfolio->category->title))
                        <li>
                            <span class="left">{{ trans('themes::portfolio.title.category') }}:</span>
                            <span class="right">{{ $portfolio->category->title }}</span>
                        </li>
                        @endif
                        @if(!empty(@$portfolio->settings->describe->tr))
                        <li>
                            <span class="left">{{ trans('themes::portfolio.title.describe') }}:</span>
                            <span class="right">{{ $portfolio->settings->describe->{locale()} }}</span>
                        </li>
                        @endif
                        @if(!empty($portfolio->website))
                        <li>
                            <span class="left">{{ trans('themes::portfolio.title.website') }}:</span>
                            <span class="right"><a target="_blank" href="{{ $portfolio->website }}">{{ $portfolio->website }}</a> </span>
                        </li>
                        @endif
                    </ul>
                    <div class="project-detail-meta">
                        <span class="left text-white hidden-xs pull-sm-left">{{ trans('themes::portfolio.title.share') }}:</span>
                        <div class="social-list pull-sm-right">
                            <a href="" class="icon ion-social-twitter"></a>
                            <a href="" class="icon ion-social-facebook"></a>
                            <a href="" class="icon ion-social-googleplus"></a>
                            <a href="" class="icon ion-social-linkedin"></a>
                            <a href="" class="icon ion-social-dribbble-outline"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.sections.clients')
@endsection

@push('js-stack')
{!! Asset::add(Theme::url('vendor/lightgallery/dist/css/lightgallery.min.css')) !!}
{!! Asset::add(Theme::url('vendor/lightgallery/dist/js/lightgallery.min.js')) !!}
{!! Asset::add(Theme::url('vendor/lg-zoom/dist/lg-zoom.min.js')) !!}
{!! Theme::script('js/jquery.revolution.min.js') !!}
{!! Theme::script('js/rev-slider-init.js') !!}
<script>
    $(document).ready(function() {
        $(".lightgallery").lightGallery({
            selector: ".lightgallery, a.popup-image",
            cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
            download: false,
            counter: false
        });
        $('.close-menu').on('click', function(){
            $('.project-overlay').removeClass('visible', 1000);
            $('.project-detail-info').removeClass('visible', 1000);
        });
        $('.project-detail-button a').on('click', function(){
            $('.project-overlay').addClass('visible', 1000);
            $('.project-detail-info').addClass('visible', 1000);
        });
        $(".project-detail-text").niceScroll({
            cursorcolor: "#BF263A",
            cursorborder: "#BF263A"
        });
    });
</script>
@endpush
