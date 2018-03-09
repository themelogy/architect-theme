@extends('layouts.master')

@section('content')
    <div class="page-content-2">
        <div class="container">
            <div class="row">
                <div class="primary col-md-8 m-bot-50">
                    <article class="post">
                        <h1 class="entry-title h-line">{{ $post->title }}</h1>
                        <div class="posted-on m-bot-30">
                            <a class="url fn n m-rgt-10" href="{{ $post->category->url }}">{{ $post->category->name }}</a>
                            {{ $post->created_at->formatLocalized('%d %B %Y') }}
                        </div>
                        <div class="post-image m-bot-20">
                            <img class="img-responsive" src="{{ $post->present()->firstImage(750,400,'fit',80) }}" alt="{{ $post->title }}" />
                        </div>
                        <div class="entry-content">
                            {!! $post->content !!}
                        </div>
                        <div class="entry-footer">
                            <div class="post-share social-share">
                                <div>{{ trans('themes::news.share') }}</div>
                                @include('partials.components.share', ['theme'=>'plain'])
                            </div>
                            @if(count($post->tags)>0)
                                <div class="tags-links m-top-20">
                                    <span class="text-white">{{ trans('tag::tags.tag') }}</span>
                                    @foreach($post->tags as $tag)
                                        @if(!empty($tag->slug))
                                        <a class="text-white" href="{{ route('news.tag', [$tag->slug]) }}">{{ $tag->name }}</a>@if(!$loop->first && $loop->last), @endif
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </article>
                </div>
                @include('news::partials.sidebar')
            </div>
        </div>
    </div>
@endsection