@extends('layouts.master')

@section('content')
    <div class="content boxed">
        <h1 class="title h-line m-top-30">{{ ucwords($tag->name) }}</h1>
        <div class="grid-items js-isotope js-grid-items p-top-bot-50 section-news">
            @foreach($posts as $post)
                @include('blog::partials._post')
            @endforeach
        </div>
        {!! $posts->render('partials.components.pagination') !!}
    </div>
@endsection

@push('js-stack')
{!! Asset::add(Theme::url('js/isotope.pkgd.min.js')) !!}
@endpush