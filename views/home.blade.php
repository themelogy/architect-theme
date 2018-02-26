@extends('layouts.master')

@section('navbar')
    @include('partials.header.navbar', ['type'=>'light', 'template'=>'home'])
@endsection

@section('content')
    <main class="jumbotron">
        {!! Widget::get('themeSlide', ['anasayfa']) !!}
    </main>

    <div class="content boxed">

        {!! Widget::get('portfolio_latest') !!}

        {!! Widget::get('news_latest') !!}

    </div>


    {!! Widget::get('portfolio_brands', [20]) !!}

@endsection