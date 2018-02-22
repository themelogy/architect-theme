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
        <div class="owl-carousel owl-theme gallery_horizontal project-detail lightgallery">
            @foreach($portfolio->present()->images(null,720,'resize',80) as $image)
                <div class="item">
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
        var gR = $(".gallery_horizontal"), w = $(window), cf = $(".gallery_horizontal").data("cen");
        function initGalleryhorizontal() {
            var a = $(window).height(), b = $("header").outerHeight(), c = $(".gallery_horizontal"), d = $(".control-panel").outerHeight();
            c.find("img").css({
                height: a - b - d - 20
            });
            if (gR.find(".owl-stage-outer").length) {
                gR.trigger("destroy.owl.carousel");
                gR.find(".horizontal_item").unwrap();
            }
            if (w.width() > 1036) gR.owlCarousel({
                autoWidth: true,
                margin: 10,
                items: 3,
                smartSpeed: 1300,
                loop: true,
                center: cf,
                nav: false,
                thumbs: true,
                thumbImage: true,
                thumbContainerClass: "owl-thumbs",
                thumbItemClass: "owl-thumb-item",
                onInitialized: function() {
                    gR.find(".owl-stage").css({
                        height: a - b - d,
                        overflow: "hidden"
                    });
                    var c = $(".owl-carousel").find(".active").find(".horizontal_item");
                    var e = c.data("phdesc");
                    var f = c.data("phname");
                    if (e) $(".caption").html("<h4>" + f + "</h4><p>" + e + "</p>");
                }
            });
        }
        if (gR.length) {
            initGalleryhorizontal();
            w.on("resize.destroyhorizontal", function() {
                setTimeout(initGalleryhorizontal, 150);
            });
        }
        gR.on("translated.owl.carousel", function(a) {
            var b = $(this).find(".active").find(".horizontal_item").data("phdesc");
            var c = $(this).find(".active").find(".horizontal_item").data("phname");
            if (b) $(".caption").html("<h4>" + c + "</h4><p>" + b + "</p>");
        });
        if (navigator.appVersion.indexOf("Win")!=-1) {
            var timestamp_mousewheel = 0;

            gR.on("mousewheel", ".owl-stage", function(a) {
                var d = new Date();
                if((d.getTime() - timestamp_mousewheel) > 1000){
                    timestamp_mousewheel = d.getTime();
                    if (a.deltaY < 0) gR.trigger("next.owl"); else gR.trigger("prev.owl");
                    a.preventDefault();
                }
            });
        }
        $(".resize-carousel-holder a.next-slide").on("click", function() {
            $(this).closest(".resize-carousel-holder").find(gR).trigger("next.owl.carousel");
            return false;
        });
        $(".resize-carousel-holder a.prev-slide").on("click", function() {
            $(this).closest(".resize-carousel-holder").find(gR).trigger("prev.owl.carousel");
            return false;
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
    .lg-outer {
        background: rgba(0,0,0,0.25);
    }
</style>
@endpush
