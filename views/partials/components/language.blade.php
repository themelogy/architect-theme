@foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
    @if(isset($list_type))
        <li class="{{ $locale == locale() ? 'active' : '' }}">
    @endif
    <a hreflang="{!! $locale !!}" href="{{ url($locale) }}" class="{{ $locale == locale() ? 'active' : '' }}">
        {{ strtoupper($locale) }}
    </a>
    @if(isset($list_type))
        </li>
    @endif
@endforeach