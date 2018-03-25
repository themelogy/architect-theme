@php
seo_helper()->setSiteName('');
@endphp

@extends('layouts.master')

@section('navbar')
    @include('partials.header.navbar', ['type'=>'light', 'template'=>'home'])
@endsection

@section('content')
    <main class="jumbotron">
        @themeSlide('anasayfa')
    </main>
    <div class="content boxed">
        @portfolioLatest()
        @include('partials.sections.portfolio-group')
        @newsLatestPosts()
    </div>
    @portfolioBrands(20)
@endsection