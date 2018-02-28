@extends('layouts.master')

@section('content')
    <div class="content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title h-line m-top-20">{{ trans('themes::employee.title') }}</h1>
                        <ul class="team-holder">
                            @foreach($employees as $employee)
                            <li>
                                <div class="team-box" data-top-bottom="transform: translateY(-50px);" data-bottom-top="transform: translateY(50px);">
                                    <div class="team-photo">
                                        <div class="overlay"></div>
                                        <ul class="team-social">
                                            <li><a href="#">{!! $employee->description !!}</a></li>
                                        </ul>
                                        <img src="{{ $employee->present()->firstImage(370,450,'fit',80) }}" alt="{{ $employee->fullname }}" class="img-responsive">
                                    </div>
                                    <div class="team-info">
                                        <h3><a href="{{ $employee->url }}" class="ajax">{{ $employee->fullname }}</a></h3>
                                        <h4>{{ $employee->position }}</h4>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection

@push('js-inline')
<script type="text/javascript">
    // remove parallax and video on mobile   ------------------
    function initparallax() {
        var a = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return a.Android() || a.BlackBerry() || a.iOS() || a.Opera() || a.Windows();
            }
        };
        trueMobile = a.any();
        if (null == trueMobile) {
            var b = $("#main");
            b.find("[data-top-bottom]").length > 0 && b.waitForImages(function() {
                s = skrollr.init();
                s.destroy();
                $(window).resize(function() {
                    var a = $(window).width();
                    if (a < 1036) s.destroy(); else skrollr.init({
                        forceHeight: !1,
                        easing: "easeInOutElastic",
                        mobileCheck: function() {
                            return !1;
                        }
                    });
                });
                skrollr.init({
                    forceHeight: !1,
                    easing: "easeInOutElastic",
                    mobileCheck: function() {
                        return !1;
                    }
                });
            });
            var c = $(window).width();
            if (c < 1036) {
                s = skrollr.init();
                s.destroy();
            }
        }
        if (trueMobile) $(".background-youtube , .background-vimeo").remove();
    }
    $(document).ready(function() {
        $(".team-box").hover(function() {
            $(this).find("ul.team-social").fadeIn();
            $(this).find(".team-social a").each(function(a) {
                var b = $(this);
                setTimeout(function() {
                    b.animate({
                        opacity: 1,
                        top: "0"
                    }, 400);
                }, 150 * a);
            });
        }, function() {
            $(this).find(".team-social a").each(function(a) {
                var b = $(this);
                setTimeout(function() {
                    b.animate({
                        opacity: 0,
                        top: "50px"
                    }, 400);
                }, 150 * a);
            });
            setTimeout(function() {
                $(this).find("ul.team-social").fadeOut();
            }, 150);
        });
        initparallax();
    });
</script>
@endpush