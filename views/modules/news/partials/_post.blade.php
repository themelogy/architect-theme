<div class="grid-item js-isotope-item js-grid-item">
    <div class="card">
        <img alt="{{ $post->title }}" width="426" height="426" class="img-responsive" src="{{ $post->present()->firstImage(426,null,'resize',80) }}">
        <div class="card-block">
            <div class="card-posted"><a class="m-rgt-10 text-bold" href="{{ $post->category->url }}">{{ $post->category->name }}</a> <a href="{{ $post->url }}">{{ $post->created_at->formatLocalized('%d %B %Y') }}</div>
            <h4 class="card-title text-dark">{{ $post->title }}</h4>
            <div class="card-text">{!! Str::words(strip_tags($post->intro), 15) !!}</div>
            <a href="{{ $post->url }}" class="card-read-more">{{ trans('global.buttons.read more') }}</a>
        </div>
    </div>
</div>