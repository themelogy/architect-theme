@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="resize-carousel-holder lightgallery">
            <div id="gallery_horizontal" class="owl-carousel owl-theme gallery_horizontal project-details">
                @foreach($portfolio->present()->images(null,720,'resize',60) as $image)
                    <div class="owl-item">
                        <a class="popup-image slider-zoom" data-src="{{ $image }}" data-sub-html="{{ $portfolio->title }}"><i class="fa fa-expand"></i></a>
                        <img class="owl-lazy" data-src="{{ $image }}" alt="{{ $portfolio->title }} {{ $loop->iteration }}"/>
                    </div>
                @endforeach
            </div>
        </div>
        <section class="section section-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="project-detail">
                            <h1 class="title h-line md-m-bot-50">{{ $portfolio->title }}</h1>
                            @if($brandImage = $portfolio->present()->brandImage(null,50,'resize',100))
                                <div class="brand-image m-bot-20">
                                    <img src="{{ $brandImage }}" alt="{{ $portfolio->title }} Logo" />
                                </div>
                            @endif
                            @if(!empty($portfolio->description))
                                <div class="description">{!! $portfolio->description !!}</div>
                            @endif
                            @if(@$portfolio->settings->tech_desc->{locale()})
                                <h4 class="title m-bot-10 m-top-20">{{ trans('themes::portfolio.title.tech_desc') }}</h4>
                                <div class="description">{!! @$portfolio->settings->tech_desc->{locale()} !!}</div>
                            @endif
                            <ul class="detail-list">
                                @if(!empty(@$portfolio->settings->location))
                                    <li class="row">
                                        <span class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.location') }}</span>
                                        <span class="col-md-10 col-xs-12"><span class="hidden-xs">:</span> {{ $portfolio->settings->location }}</span>
                                    </li>
                                @endif
                                <li class="row">
                                    <span class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.year') }}</span>
                                    <span class="col-md-10 col-xs-12"><span class="hidden-xs">:</span> {{ $portfolio->start_at->formatLocalized('%Y') }}</span>
                                </li>
                                @if(isset($portfolio->categories))
                                    <li class="row">
                                        <span class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.category') }}</span>
                                        <span class="col-md-10 col-xs-12"><span class="hidden-xs">:</span>
                                            {!! $portfolio->present()->categories !!}
                                        </span>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->area_size))
                                    <li class="row">
                                        <span class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.area_size') }} </span>
                                        <span class="col-md-10 col-xs-12"><span class="hidden-xs">:</span> {{ $portfolio->settings->area_size }}</span>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->describe->tr))
                                    <li class="row">
                                        <span class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.describe') }} </span>
                                        <span class="col-md-10 col-xs-12"><span class="hidden-xs">:</span> {{ $portfolio->settings->describe->{locale()} }}</span>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->partner))
                                    <li class="row">
                                        <span class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.partner') }} </span>
                                        <span class="col-md-10 col-xs-12"><span class="hidden-xs">:</span> {{ $portfolio->settings->partner }}</span>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->employer->tr))
                                    <li class="row">
                                        <span class="col-md-2 col-xs-12 text-bold">{{ trans('themes::portfolio.title.employer') }} </span>
                                        <span class="col-md-10 col-xs-12"><span class="hidden-xs">:</span> {{ $portfolio->settings->employer->{locale()} }}</span>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->website))
                                    <li class="row">
                                        <span class="col-md-2 text-bold col-xs-12">{{ trans('themes::portfolio.title.website') }} </span>
                                        <span class="col-md-10 col-xs-12"><span class="hidden-xs">:</span> <a target="_blank" href="{{ $portfolio->website }}">{{ $portfolio->website }}</a> </span>
                                    </li>
                                @endif
                                @if(!empty(@$portfolio->settings->video))
                                    <li class="row">
                                        <span class="col-md-2 text-bold col-xs-12">{{ trans('themes::portfolio.title.video') }} </span>
                                        <span class="col-md-10 col-xs-12"><span class="hidden-xs">:</span>
                                                <a class="play-1 btn btn-bordered" href="{{ $portfolio->settings->video }}"><i class="fa fa-play"></i></a>
                                            </span>
                                    </li>
                                @endif
                            </ul>
                            <div class="detail-meta m-top-20">
                                <span class="hidden-xs text-bold pull-left m-top-10 m-rgt-10">{{ trans('themes::portfolio.title.share') }} </span>
                                <div class="pull-left">
                                    @include('partials.components.share', ['theme'=>'plain'])
                                </div>
                            </div>
                            <div class="detail-buttons m-top-30">
                                @if($previous = $portfolio->present()->previous)
                                    <div class="previous-post-link pull-left m-rgt-10">
                                        <a class="btn btn-bordered" href="{{ $previous->url }}"><i class="fa fa-angle-left font-20"></i></a>
                                    </div>
                                @endif
                                @if($next = $portfolio->present()->next)
                                    <div class="next-post-link pull-left">
                                        <a class="btn btn-bordered" href="{{ $next->url }}"><i class="fa fa-angle-right font-20"></i></a>
                                    </div>
                                @endif
                            </div>
                            <div class="detail-tags">
                                @if(count($portfolio->tags)>0)
                                    <ul class="list-inline">
                                        @foreach($portfolio->tags as $tag)
                                            <li><a class="text-white" href="{{ route('news.tag', [$tag->slug]) }}">{{ $tag->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
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
@if(@$portfolio->settings->video)
    {!! Asset::add(Theme::url('vendor/youtubeurl/jquery.yu2fvl.css')) !!}
    {!! Asset::add(Theme::url('vendor/youtubeurl/jquery.yu2fvl.min.js')) !!}
    <script> $('.play-1').yu2fvl({minPaddingX: 200, minPaddingY: 200}); </script>
@endif
@endpush
