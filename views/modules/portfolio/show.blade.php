@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="resize-carousel-holder lightgallery">
            <div id="gallery_horizontal" class="owl-carousel gallery_horizontal project-details">
                @foreach($portfolio->present()->images(null,720,'resize',85) as $image)
                    <div class="horizontal_item">
                        <a class="popup-image slider-zoom" data-src="{{ $image }}" data-sub-html="{{ $portfolio->title }}"><i class="fa fa-expand"></i></a>
                        <img src="{{ $image }}" alt="{{ $portfolio->title }}"/>
                    </div>
                @endforeach
            </div>
        </div>
        <section class="section section-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="project-detail">
                            <h1 class="title h-line m-bot-50">{{ $portfolio->title }}</h1>
                            @if($brandImage = $portfolio->present()->brandImage(null,50,'resize',100))
                            <div class="brand-image">
                                <img src="{{ $brandImage }}" alt="{{ $portfolio->title }} Logo" />
                            </div>
                            @endif
                            @if(!empty($portfolio->description))
                            <div class="description">{!! $portfolio->description !!}</div>
                            @endif
                            <ul class="detail-list">
                                @if(!empty(@$portfolio->settings->location))
                                    <li>
                                        <span class="left uppercase">{{ trans('themes::portfolio.title.location') }} :</span>
                                        <span class="right">{{ $portfolio->settings->location }}</span>
                                    </li>
                                @endif
                                <li>
                                    <span class="left">{{ trans('themes::portfolio.title.year') }} :</span>
                                    <span class="right">{{ $portfolio->created_at->formatLocalized('%Y') }}</span>
                                </li>
                                @if(!empty(@$portfolio->category->title))
                                    <li>
                                        <span class="left">{{ trans('themes::portfolio.title.category') }}:</span>
                                        <span class="right">{{ $portfolio->category->title }}</span>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->area_size))
                                    <li>
                                        <span class="left uppercase">{{ trans('themes::portfolio.title.area_size') }} :</span>
                                        <span class="right">{{ $portfolio->settings->area_size }}</span>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->describe->tr))
                                    <li>
                                        <span class="left">{{ trans('themes::portfolio.title.describe') }} :</span>
                                        <span class="right">{{ $portfolio->settings->describe->{locale()} }}</span>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->employer->tr))
                                    <li>
                                        <span class="left">{{ trans('themes::portfolio.title.employer') }} :</span>
                                        <span class="right">{{ $portfolio->settings->employer->{locale()} }}</span>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->website))
                                    <li>
                                        <span class="left">{{ trans('themes::portfolio.title.website') }} :</span>
                                        <span class="right"><a target="_blank" href="{{ $portfolio->website }}">{{ $portfolio->website }}</a> </span>
                                    </li>
                                @endif
                            </ul>
                            <div class="detail-meta">
                                <span class="left hidden-xs pull-sm-left">{{ trans('themes::portfolio.title.share') }} :</span>
                                <div class="pull-sm-right">
                                    @include('partials.components.share', ['theme'=>'plain'])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js-inline')
{!! Asset::add(Theme::url('vendor/lightgallery/dist/css/lightgallery.min.css')) !!}
{!! Asset::add(Theme::url('vendor/lightgallery/dist/js/lightgallery.min.js')) !!}
{!! Asset::add(Theme::url('vendor/owl.carousel/dist/assets/owl.carousel.min.css')) !!}
{!! Asset::add(Theme::url('vendor/owl.carousel/dist/owl.carousel.min.js')) !!}
<script>
    $(document).ready(function () {
        var gR = $("#gallery_horizontal"), w = $(window);

        function initGalleryhorizontal() {
            var a = $(window).height(),
                    b = $("header").outerHeight(),
                    c = $(".gallery_horizontal"),
                    d = $("footer").outerHeight();

            if (gR.find(".owl-stage-outer").length) {
                gR.trigger("destroy.owl.carousel").removeClass('owl-carousel owl-theme');
                gR.find('.owl-stage-outer').children().unwrap();
            }

            if (w.width() > 768) {
                gR.addClass('gallery_horizontal');
                c.find("img").css({
                    height: a - b - (a/3)
                });
            } else {
                gR.removeClass('gallery_horizontal');
            }

            gR.addClass('owl-carousel owl-theme');
            gR.owlCarousel({
                dots: false,
                margin: 10,
                items: 3,
                smartSpeed: 1300,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                center: true,
                nav: true,
                navText: ["", ""],
                onInitialized: function () {
                    if (w.width() > 768) {
                        gR.find(".owl-stage").css({
                            height: a - b - (a/3),
                            overflow: "hidden"
                        });
                    }
                },
                responsive: {
                    0: {
                        items: 1,
                        autoHeight: true
                    },
                    768: {
                        items: 2,
                        autoHeight: true
                    },
                    1024: {
                        items: 3,
                        autoWidth: true
                    },
                    1200: {
                        items: 3,
                        autoWidth: true
                    },
                    1600: {
                        items: 4,
                        autoWidth: true
                    }
                }
            });
        }

        if (gR.length) {
            initGalleryhorizontal();
            w.on("resize.destroyhorizontal", function () {
                setTimeout(initGalleryhorizontal, 150);
            });
        }

        $(".lightgallery").lightGallery({
            selector: ".lightgallery, a.popup-image",
            cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
            download: false,
            counter: false
        });

        $(".lightgallery").on("onBeforeNextSlide.lg", function (a) {
            gR.trigger("next.owl.carousel");
        });

        $(".lightgallery").on("onBeforePrevSlide.lg", function (a) {
            gR.trigger("prev.owl.carousel");
        });
    });
</script>
<style>
    .lg-backdrop {
        background-color: rgba(0, 0, 0, 0.75);
    }

    .lg-toolbar {
        background-color: transparent;
    }

    .slider-zoom {
        position: absolute;
        bottom: 50px;
        right: 50px;
        z-index: 999;
        width: 35px;
        height: 35px;
        color: #fff;
        cursor: pointer;
        line-height: 40px;
        font-size: 14px;
        text-align: center;
    }

    .slider-zoom i, .slider-zoom:before, .slider-zoom:after, .slider-zoom, .herolink {
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        transition: all 200ms linear;
    }

    .slider-zoom:before, .slider-zoom:after {
        content: '';
        position: absolute;
        width: 10px;
        height: 10px;
        z-index: -1;
    }

    .slider-zoom:before {
        top: 0;
        left: 0;
        border-left: 1px solid #fff;
        border-top: 1px solid #fff;
    }

    .slider-zoom:after {
        bottom: 0;
        right: 0;
        border-right: 1px solid #fff;
        border-bottom: 1px solid #fff;
    }

    .slider-zoom:hover:before {
        top: -5px;
        left: -5px;
    }

    .slider-zoom:hover:after {
        bottom: -5px;
        right: -5px;
    }

    .slider-zoom:hover i {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
    }
</style>
<style>
    .gallery_horizontal {
        /*float:left;*/
        width: 100%;
        position: relative;
        /*padding-top: 10px;*/
    }

    .gallery_horizontal .owl-item img {
        width: auto;
        position: relative;
        z-index: 1;
        /*max-height: 500px;*/
    }

    .horizontal_item {
        overflow: hidden;
        position: relative;
        height: 100%;
        width: 100%;
    }

    .flow-gallery .horizontal_item {
        opacity: 0.6;
        -webkit-transition: all 500ms linear;
        -moz-transition: all 500ms linear;
        -o-transition: all 500ms linear;
        -ms-transition: all 500ms linear;
        transition: all 500ms linear;
        -webkit-transition-delay: 300ms;
        transition-delay: 300ms;
        -webkit-transform: scale(0.65);
        -moz-transform: scale(0.65);
        transform: scale(0.65);
    }

    .flow-gallery .owl-item.center .horizontal_item {
        opacity: 1;
        -webkit-transform: scale(1.0);
        -moz-transform: scale(1.0);
        transform: scale(1.0);
    }

    .horizontal_item {
        cursor: e-resize;
    }

    .owl-nav div {
        position: absolute;
        top: 50%;
        width: 40px;
        height: 40px;
        line-height: 40px;
        background: rgba(0, 0, 0, 0.31);
        text-align: center;
        cursor: pointer;
        color: #fff;
        font-size: 2rem;
        font-weight: 600;
        opacity: 1;
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        transition: all 200ms linear;
        z-index: 20;
    }

    .owl-next {
        right: 5rem;
        padding-left: 2px;
    }

    .owl-prev {
        left: 5rem;
        padding-right: 2px;
    }
</style>
@endpush
