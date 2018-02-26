@extends('layouts.master')

@section('content')
    <div class="content boxed">
        <h1 class="title h-line m-bot-30">{{ $category->title }}</h1>
        <div class="project-categories p-top-bot-20">
            <ul class="list-inline">
                @foreach(app(\Modules\Portfolio\Repositories\CategoryRepository::class)->all()->sortBy('ordering') as $cat)
                    <li><a class="text-uppercase text-bold l-cube-20" href="{{ $cat->url }}">{{ $cat->title }}</a></li>
                @endforeach
                    <li><a class="text-uppercase text-bold l-cube-20" href="{{ route('portfolio.index') }}">{{ trans('themes::theme.buttons.all') }}</a></li>
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