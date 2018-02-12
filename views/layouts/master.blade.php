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

        <!-- Footer -->
        @include('partials.footer')
    </div>
</div>

@include('partials.scripts')

</body>
</html>