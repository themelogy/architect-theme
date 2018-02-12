@extends('layouts.master')

@section('content')
    <div class="content" style="padding-top: 98px;">
        <div class="projects">
            <div class="grid-items js-isotope js-grid-items">
                @foreach($portfolios as $portfolio)
                <div class="grid-item {{ $portfolio->category->slug }} js-isotope-item js-grid-item">
                    <div class="project-item">
                        <img alt="{{ $portfolio->title }}" class="img-responsive" src="{{ $portfolio->present()->firstImage(426,null,'resize',80) }}">
                        <a href="{{ $portfolio->url }}" class="project-hover-2">
                            <i class="icon-plus"></i>
                            <div class="project-hover-content">
                                <h3 class="project-title">{!! wordwrap($portfolio->title, 1, '<br>') !!}</h3>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection