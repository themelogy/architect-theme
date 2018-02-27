@extends('layouts.master')

@section('content')
    <div class="content boxed">
        <h1 class="title h-line m-bot-30">{{ $category->name }}</h1>
        <div class="grid-items js-isotope js-grid-items p-top-bot-50 section-news">
            @foreach($posts as $post)
                @include('news::partials._post')
            @endforeach
        </div>
        {!! $posts->render('partials.components.pagination') !!}
    </div>
@endsection

@push('js-stack')
{!! Asset::add(Theme::url('js/isotope.pkgd.min.js')) !!}
@endpush