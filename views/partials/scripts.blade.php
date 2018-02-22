@stack('css-stack')
{!! Asset::css() !!}

<!-- jQuery -->
{!! Theme::script('js/jquery.min.js') !!}
{!! Theme::script('js/bootstrap.min.js') !!}

{!! Theme::script('js/jquery.validate.min.js') !!}
{!! Theme::script('js/wow.min.js') !!}
{!! Theme::script('js/jquery.stellar.min.js') !!}
{!! Theme::script('js/jquery.magnific-popup.min.js') !!}
{!! Theme::script('js/isotope.pkgd.min.js') !!}
{!! Theme::script('js/imagesloaded.pkgd.min.js') !!}
{!! Theme::script('js/plugins.js') !!}
{!! Theme::script('js/sly.min.js') !!}
{!! Asset::add(Theme::url('vendor/skrollr/dist/skrollr.min.js')) !!}

{!! Theme::script('vendor/jquery.nicescroll/jquery.nicescroll.min.js') !!}

@stack('js-stack')
{!! Asset::js() !!}

<!-- Scripts -->
{!! Theme::script('js/scripts.js') !!}


@stack('css-inline')
@stack('js-inline')

<script type="text/javascript"> WebFontConfig = {
        google: {
            families: [
                'Playfair Display:400,400i,500,600,700:latin-ext',
                'Poppins:300,400,500,600,700:latin-ext'
            ]
        }
    };
    (function () {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>

@include('partials.analytics')