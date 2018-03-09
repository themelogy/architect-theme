<ul class="list-inline">
    <li{!! Request::url() == route('portfolio.index') ? ' class="active"' : '' !!}><a class="text-uppercase text-bold" href="{{ route('portfolio.index') }}">{{ trans('themes::theme.buttons.all') }}</a></li>
    @foreach(app(\Modules\Portfolio\Repositories\CategoryRepository::class)->all()->sortBy('ordering') as $cat)
        <li{!! Request::url() == $cat->url ? ' class="active"' : '' !!}><h2><a class="text-uppercase text-bold" href="{{ $cat->url }}">{{ $cat->title }}</a></h2></li>
    @endforeach
</ul>