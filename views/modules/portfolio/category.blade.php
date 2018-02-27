@extends('layouts.master')

@section('content')
    <div class="content boxed">
        <h1 class="title h-line m-bot-30">{{ $category->title }}</h1>
        <div class="project-categories p-top-bot-20">
            @include('portfolio::partials._categories')
        </div>
        <div class="projects m-bot-50">
            <div class="grid-items js-isotope js-grid-items">
                @foreach($portfolios as $portfolio)
                    @include('portfolio::partials._portfolio')
                @endforeach
            </div>
        </div>
    </div>

    {!! Widget::get('portfolio_brands', [20]) !!}
@endsection

@push('js-stack')
{!! Asset::add(Theme::url('js/isotope.pkgd.min.js')) !!}
@endpush