@php
    seo_helper()->meta()->addMeta('viewport', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no')
                ->addMeta('X-UA-Compatible', 'IE=edge,chrome=1');
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