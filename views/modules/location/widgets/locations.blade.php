@foreach($locations as $location)
    <h4 class="contact-title m-top-20 m-bot-5">{{ $location->name }}</h4>
    <p class="contact-address m-bot-5 text-muted">{{ $location->present()->address }}</p>
    @if(!empty($location->phone1))
    <p class="phone-sm m-bot-5 text-muted">T: {{ $location->phone1 }} @if(!empty($location->phone2)) / {{ $location->phone2 }} @endif</p>
    @endif
    @if(!empty($location->fax))
    <p class="phone-sm m-bot-5 text-muted">F: {{ $location->fax }}</p>
    @endif
    @if(!empty($location->email))
    <p class="contact-row text-muted email-sm">{!! Html::email($location->email) !!}</p>
    @endif
    @if(!$loop->last)
    <hr/>
    @endif
@endforeach
