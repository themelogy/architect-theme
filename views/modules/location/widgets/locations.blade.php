@foreach($locations as $location)
    <h4 class="contact-title m-top-20 m-bot-5">{{ $location->name }}</h4>
    <p class="contact-address m-bot-5 text-muted">{{ $location->address }}</p>
    @isset($location->phone)
    <p class="phone-sm m-bot-5 text-muted">T: {{ $location->phone }}</p>
    @endisset
    @isset($location->fax)
    <p class="phone-sm m-bot-5 text-muted">F: {{ $location->fax }}</p>
    @endisset
    @isset($location->email)
    <p class="contact-row text-muted email-sm">{!! Html::email($location->email) !!}</p>
    @endisset
    @if(!$loop->last)
    <hr/>
    @endif
@endforeach
