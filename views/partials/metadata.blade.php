{!! seo_helper()->render() !!}

<meta id="token" name="token" content="{{ csrf_token() }}" />
@if($currentUser)
<meta id="authorization" name="authorization" content="{{ $currentUser->getFirstApiKey() }}" />
@endif

<!-- Favicons -->
<link rel="shortcut icon" href="{{ Theme::url("images/favicon.png") }}">
<link rel="apple-touch-icon" href="{{ Theme::url("images/apple-touch-icon.png") }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ Theme::url("images/apple-touch-icon-72x72.png") }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ Theme::url("images/apple-touch-icon-114x114.png") }}">

<!-- Styles -->
{!! Theme::style('vendor/revolution/css/settings.css') !!}
{!! Theme::style('vendor/revolution/css/navigation.css') !!}
@stack('css-stack')
{!! Asset::css() !!}
{!! Theme::style('css/style.css?v=40') !!}