@if (Session::has('success'))
    @php
        $alert_title   = 'Başarılı!';
        $alert_type    = 'success';
        $alert_message = Session::get('success');
    @endphp
@endif

@if (Session::has('error'))
    @php
        $alert_title   = 'Hata!';
        $alert_type    = 'error';
        $alert_message = Session::get('error');
    @endphp
@endif

@if (Session::has('warning'))
    @php
        $alert_title   = 'Dikkat!';
        $alert_type    = 'warning';
        $alert_message = Session::get('warning');
    @endphp
@endif

{!! Theme::style('vendor/pnotify/pnotify.css') !!}
{!! Theme::script('vendor/pnotify//pnotify.js') !!}

@if(Session::has('success') || Session::has('error') || Session::has('warning'))
    <script>
        PNotify.prototype.options.delay += 1000;
        PNotify.prototype.options.styling = "bootstrap3";
        new PNotify({
            title: '{{ $alert_title }}',
            text: '{{ $alert_message }}',
            type: '{{ $alert_type }}'
        });
    </script>
@endif