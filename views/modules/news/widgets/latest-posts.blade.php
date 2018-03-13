@if(count($posts)>0)
    <section class="section-news section m-bot-20 m-top-20">
        <div class="container-fluid">
            <h2 class="section-title p-bot-20">{{ trans('themes::news.title') }}
                <a href="{{ route('news.index') }}" class="link-arrow-2 pull-right">{{ trans('themes::news.other news') }}
                    <i class="icon ion-ios-arrow-right"></i>
                </a>
            </h2>
            <div class="news-carousel owl-carousel">
                @foreach($posts as $post)
                    <div class="news-item">
                        <img class="owl-lazy" alt="{{ $post->title }}" data-src="{{ $post->present()->firstImage(370,370,'fit',80) }}">
                        <div class="news-hover">
                            <div class="content">
                                <div class="time">{{ $post->created_at->formatLocalized('%d %B %Y') }}</div>
                                <h3 class="news-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h3>
                                <p class="news-description">{!! Str::words(strip_tags($post->intro), 15) !!}</p>
                            </div>
                            <a class="fill-div" href="{{ $post->url }}">{{ trans('global.buttons.read more') }} <i class="icon ion-ios-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @push('js-stack')
    {!! Asset::add(Theme::url('vendor/owl.carousel/dist/owl.carousel.min.js')) !!}
    @endpush
@endif