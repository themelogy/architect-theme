@php
    $image_width = isset($portfolio->settings->image_width) ? (int)$portfolio->settings->image_width : 500;
    $image_height = isset($portfolio->settings->image_height) ? (int)$portfolio->settings->image_height : null;
    $image_mode = $image_width && $image_height ? 'fit' : 'resize';
@endphp

<div class="grid-item {{ $portfolio->category->slug }} js-isotope-item js-grid-item p-bot-10">
    <div class="project-item">
        <a href="{{ $portfolio->url }}"><img alt="{{ $portfolio->title }}" class="image img-responsive" src="{{ $portfolio->present()->firstImage($image_width,$image_height,$image_mode,80) }}"></a>
        <a href="{{ $portfolio->url }}">
            <h3 class="title">{!! $portfolio->title !!}</h3>
        </a>
        <h4 class="sub-title text-uppercase">{{ !isset($portfolio->settings->location) ? '' : $portfolio->settings->location.', ' }} {{ $portfolio->start_at->format('Y') }}</h4>
    </div>
</div>