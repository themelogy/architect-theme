@if(count($groups)>0)
<div class="row m-top-30">
    @foreach(trans('themes::portfolio.settings.groups') as $key => $group)
    <div class="col-md-3">
        <h5 class="m-bot-10"><a href="{{ route('portfolio.group', $key) }}">{{ $group }}</a></h5>
        @if(isset($groups[$key]))
        <ul class="list-unstyled">
            @foreach($groups[$key] as $portfolio)
                <li><a href="{{ $portfolio->url }}">{{ $portfolio->title }}</a></li>
            @endforeach
        </ul>
        @endif
    </div>
    @endforeach
</div>
@endif