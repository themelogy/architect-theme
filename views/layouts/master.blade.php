@php
seo_helper()->meta()->addMeta('X-UA-Compatible', 'IE=edge,chrome=1');
view()->composer('partials.header',\Themes\Architect\Presenter\MenuModify::class);
@endphp
<!DOCTYPE HTML>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
    @include('partials.metadata')
</head>
<body>
<div class="">
    <div class="wrapper">

        @include('partials.header')

        @yield('content')

        @include('partials.footer')
    </div>
</div>

@include('partials.scripts')

</body>
</html>
