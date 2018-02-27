<ul class="list-inline">
    @foreach(app(\Modules\Portfolio\Repositories\CategoryRepository::class)->all()->sortBy('ordering') as $cat)
        <li{!! Request::url() == $cat->url ? ' class="active"' : '' !!}><a class="text-uppercase text-bold l-cube-20" href="{{ $cat->url }}">{{ $cat->title }}</a></li>
    @endforeach
    <li{!! Request::url() == route('portfolio.index') ? ' class="active"' : '' !!}><a class="text-uppercase text-bold l-cube-20" href="{{ route('portfolio.index') }}">{{ trans('themes::theme.buttons.all') }}</a></li>
</ul>