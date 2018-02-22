@extends('layouts.master')

@section('content')
    <div class="content">
        <div id="project-gallery" class="lightgallery project-detail slider lazy">
            @foreach($portfolio->present()->images(null,720,'resize',80) as $image)
                <div class="item">
                    <a class="popup-image slider-zoom" data-src="{{ $image }}"><i class="fa fa-expand"></i></a>
                    <img data-lazy="{{ $image }}" alt="{{ $portfolio->title }}"/>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('js-inline')
{!! Asset::add(Theme::url('vendor/lightgallery/dist/css/lightgallery.min.css')) !!}
{!! Asset::add(Theme::url('vendor/lightgallery/dist/js/lightgallery.min.js')) !!}
{!! Asset::add(Theme::url('vendor/slick-carousel/slick/slick.css')) !!}
{!! Asset::add(Theme::url('vendor/slick-carousel/slick/slick-theme.css')) !!}
{!! Asset::add(Theme::url('vendor/slick-carousel/slick/slick.min.js')) !!}
<script>
    $(document).ready(function () {
        $('#project-gallery').slick({
            dots: false,
            arrows: true,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            centerMode: true,
            variableWidth: true,
            loop: true,
            autoplay: true,
            lazyLoad: 'progressive',
            centerPadding: '60px',
            prevArrow: '<div class="slick-prev"><span class="fa fa-angle-left"></span></div>',
            nextArrow: '<div class="slick-next"><span class="fa fa-angle-right"></span></div>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        $(".lightgallery").lightGallery({
            selector: ".lightgallery, a.popup-image",
            cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
            download: false,
            counter: false
        });
    });
</script>
<style>
    .project-detail {
        position: relative;
        height: 100%;
    }
    .lg-backdrop {
        background-color: rgba(0,0,0,0.75);
    }
    .lg-toolbar {
        background-color: transparent;
    }
    .slick-slide {
        position: relative;
        padding: 0 20px;
    }
    .slick-prev {
        left:0;
        z-index: 10;
    }
    .slick-next {
        right:0;
        z-index: 10;
    }
    .slick-list,
    .slick-track {
        height: 100%;
    }
</style>
@endpush
