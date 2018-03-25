@extends('layouts.master')

@section('content')
    <div class="content boxed">
        <h1 class="title h-line m-top-20">{{ trans('themes::portfolio.settings.groups.'.Request::route('id')) }}</h1>
        <div class="project-categories p-top-bot-20">
            <ul class="list-inline">
                @foreach(trans('themes::portfolio.settings.groups') as $key => $group)
                <li><h2><a class="text-uppercase text-bold" href="{{ route('portfolio.group', $key) }}">{{ trans('themes::portfolio.settings.groups.'.$key) }}</a></h2></li>
                @endforeach
            </ul>
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