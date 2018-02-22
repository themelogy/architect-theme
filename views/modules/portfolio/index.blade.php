@extends('layouts.master')

@section('content')
    <div class="content boxed">
        <h1 class="title h-line m-bot-30">{{ trans('themes::portfolio.title.portfolios') }}</h1>
        <div class="project-categories p-top-bot-20">
            <ul class="list-inline">
                @foreach(app(\Modules\Portfolio\Repositories\CategoryRepository::class)->all()->sortBy('ordering') as $cat)
                    <li><a class="text-uppercase text-bold l-cube-20" href="{{ $cat->url }}">{{ $cat->title }}</a></li>
                @endforeach
                    <li><a class="text-uppercase text-bold l-cube-20" href="{{ route('portfolio.index') }}">{{ trans('themes::theme.buttons.all') }}</a></li>
            </ul>
        </div>
        <div class="projects m-bot-50">
            <div class="grid-items js-isotope js-grid-items">
                @foreach($portfolios as $portfolio)
                    @php
                        $image_width = isset($portfolio->settings->image_width) ? (int)$portfolio->settings->image_width : 500;
                        $image_height = isset($portfolio->settings->image_height) ? (int)$portfolio->settings->image_height : null;
                        $image_mode = $image_width && $image_height ? 'fit' : 'resize';
                    @endphp
                <div class="grid-item {{ $portfolio->category->slug }} js-isotope-item js-grid-item p-bot-10">
                    <div class="project-item">
                        <img alt="{{ $portfolio->title }}" class="image img-responsive" src="{{ $portfolio->present()->firstImage($image_width,$image_height,$image_mode,80) }}">
                        <a href="{{ $portfolio->url }}">
                            <h3 class="title">{!! $portfolio->title !!}</h3>
                        </a>
                        <h4 class="sub-title text-uppercase">{{ !isset($portfolio->settings->location) ? '' : $portfolio->settings->location.', ' }} {{ $portfolio->created_at->format('Y') }}</h4>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{--{!! $portfolio->render('partials.components.pagination') !!}--}}
    </div>

    @include('partials.sections.clients')
@endsection