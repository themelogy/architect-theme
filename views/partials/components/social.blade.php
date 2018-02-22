@foreach(['facebook', 'twitter', 'instagram', 'google', 'linkedin', 'youtube', 'vimeo'] as $social)
@if(setting('theme::'.$social))<a target="_blank" href="{{ setting('theme::'.$social) }}"><i class="fa fa-{{ $social }}"></i></a>@endif
@endforeach