@foreach(trans('themes::portfolio.settings.groups') as $key => $group)
    <div class="col-md-4 lg-m-bot-0 m-bot-20">
        <div class="develop-project">
            <div class="overlay"></div>
            <h4><a href="{{ route('portfolio.group', $key) }}">{!! wordwrap($group, 10, '<br/>') !!} <i class="fa fa-angle-right"></i></a></h4>
        </div>
    </div>
@endforeach