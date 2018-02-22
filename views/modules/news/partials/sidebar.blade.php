<div class="secondary col-md-4">
    <div class="widget sidebar_widget widget_recent_posts">
        <h3 class="widget-title">{{ trans('themes::news.recent posts') }}</h3>
        <ul>
            @foreach(News::latest(5) as $latestPost)
                <li>
                    <a href="{{ $latestPost->url }}" class="recent-post-thumbnail"><img alt="{{ $latestPost->title }}" src="{{ $latestPost->present()->firstImage(50,50,'fit',80) }}"></a>
                    <div class="recent-post-content">
                        <a href="{{ $latestPost->url }}" class="post-title">{{ $latestPost->title }}</a>
                        <span class="post-time">{{ $latestPost->created_at->formatLocalized('%d %B %Y') }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget sidebar_widget widget_categories">
        <h3 class="widget-title">{{ trans('themes::news.category.title') }}</h3>
        <ul>
            @foreach(NewsCategory::all() as $category)
                <li>
                    <a href="{{ $category->url }}">{{ $category->name }}</a> ({{ $category->posts()->count() }})
                </li>
            @endforeach
        </ul>
    </div>
</div>