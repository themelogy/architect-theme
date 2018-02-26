@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="resize-carousel-holder lightgallery">
            <div id="gallery_horizontal" class="owl-carousel gallery_horizontal project-details">
                @foreach($portfolio->present()->images(null,720,'resize',85) as $image)
                    <div class="horizontal_item">
                        <a class="popup-image slider-zoom" data-src="{{ $image }}" data-sub-html="{{ $portfolio->title }}"><i class="fa fa-expand"></i></a>
                        <img src="{{ $image }}" alt="{{ $portfolio->title }} {{ $loop->iteration }}"/>
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
                            <ul class="detail-list">
                                @if(!empty(@$portfolio->settings->location))
                                    <li>
                                        <span class="left uppercase">{{ trans('themes::portfolio.title.location') }} :</span>
                                        <span class="right">{{ $portfolio->settings->location }}</span>
                                    </li>
                                @endif
                                <li>
                                    <span class="left">{{ trans('themes::portfolio.title.year') }} :</span>
                                    <span class="right">{{ $portfolio->start_at->formatLocalized('%Y') }}</span>
                                </li>
                                @if(!empty(@$portfolio->category->title))
                                    <li>
                                        <span class="left">{{ trans('themes::portfolio.title.category') }}:</span>
                                        <span class="right">{{ Html::link($portfolio->category->url, $portfolio->category->title) }}</span>
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
@endpush
