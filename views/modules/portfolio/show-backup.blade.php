@extends('layouts.master')

@section('content')
    {{--<main class="page-header-3">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-3">--}}
    {{--<div class="title-hr"></div>--}}
    {{--</div>--}}
    {{--<div class="col-md-8 col-lg-6"><h1>We Do Great Design For Creative Folks.</h1></div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</main>--}}

    <div class="content">
        <div class="owl-carousel owl-theme project-detail lightgallery">
            @foreach($portfolio->present()->images(1920,720,'fit',80) as $image)
                <div>
                    <a class="popup-image slider-zoom" data-src="{{ $image }}"><i class="fa fa-expand"></i></a>
                    <img class="owl-lazy" data-src="{{ $image }}" alt="{{ $portfolio->title }}" />
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('js-inline')
{!! Asset::add(Theme::url('vendor/lightgallery/dist/css/lightgallery.min.css')) !!}
{!! Asset::add(Theme::url('vendor/lightgallery/dist/js/lightgallery.min.js')) !!}
{!! Asset::add(Theme::url('vendor/lg-zoom/dist/lg-zoom.min.js')) !!}
{!! Asset::add(Theme::url('vendor/owl.carousel/dist/assets/owl.carousel.min.css')) !!}
{!! Asset::add(Theme::url('vendor/owl.carousel/dist/owl.carousel.min.js')) !!}
<script>
    $(document).ready(function(){
        var pd = $('.owl-carousel').owlCarousel({
            nav: false,
            dots: false,
            lazyLoad: true,
            items: 1,
            loop: true,
            autoPlay: true
        });
        $(".lightgallery").lightGallery({
            selector: ".lightgallery, a.popup-image",
            cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
            download: false,
            counter: false
        });
        $(".lightgallery").on("onBeforeNextSlide.lg", function(a) {
            pd.trigger("next.owl.carousel");
        });
        $(".lightgallery").on("onBeforePrevSlide.lg", function(a) {
            pd.trigger("prev.owl.carousel");
        });
    });
</script>
<style>
    .owl-carousel {
        position: relative;
        height: 100%;
    }
    .slider-zoom {
        position:absolute;
        bottom:50px;
        right:50px;
        z-index:999;
        width:35px;
        height:35px;
        color:#fff;
        cursor:pointer;
        line-height:40px;
        font-size:14px;
        text-align:center;
    }
    .slider-zoom i , .slider-zoom:before , .slider-zoom:after , .slider-zoom   , .herolink{
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        -ms-transition: all 200ms linear;
        transition: all 200ms linear;
    }
    .slider-zoom:before , .slider-zoom:after {
        content:'';
        position:absolute;
        width:10px;
        height:10px;
        z-index:-1;
    }
    .slider-zoom:before {
        top:0;
        left:0;
        border-left:1px solid #fff;
        border-top:1px solid #fff;
    }
    .slider-zoom:after{
        bottom:0;
        right:0;
        border-right:1px solid #fff;
        border-bottom:1px solid #fff;
    }
    .slider-zoom:hover:before {
        top:-5px;
        left:-5px;
    }
    .slider-zoom:hover:after {
        bottom:-5px;
        right:-5px;
    }
    .slider-zoom:hover i {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
    }
</style>
@endpush
