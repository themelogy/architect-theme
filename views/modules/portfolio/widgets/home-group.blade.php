@if(count($groups)>0)
    @foreach(trans('themes::portfolio.settings.groups') as $key => $group)
    <div class="col-md-3 lg-m-bot-0 m-bot-20">
        @php
            if(isset($groups[$key][0])) {
                $devImage = $groups[$key][0]->present()->firstImage(400,600,'fit',80);
            }
        @endphp
        <div class="develop-project" style="background-image: url({{ @$devImage }})">
            <div class="overlay"></div>
            <h4><a href="{{ route('portfolio.group', $key) }}">{!! wordwrap($group, 10, '<br/>') !!} <i class="fa fa-angle-right"></i></a></h4>
        </div>
    </div>
    @endforeach
@endif