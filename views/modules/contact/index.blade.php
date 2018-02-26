@extends('layouts.master')

@section('content')
    <main class="md-p-bot-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <h1 class="h-line">{{ trans('themes::contact.title') }}</h1>
                </div>
            </div>
        </div>
    </main>

    <div class="content">
        <div class="page-inner">
            <section class="p-top-20 p-bot-40">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info m-bot-20">
                                <h3 class="contact-title contact-top">{{ setting('theme::company-name') }}</h3>
                                <p class="contact-address m-bot-5 text-muted">{!! setting('theme::address') !!}</p>
                                <p class="phone-sm m-bot-5 text-muted">{{ setting('theme::phone') }} / {{ setting('theme::phone2') }}</p>
                                <p class="contact-row text-muted email-sm">{!! Html::email(setting('theme::email')) !!}</p>
                                <div class="text-muted m-top-30"><strong>{{ trans('themes::contact.follow us') }}</strong><br>
                                    <div class="contact-social social-list">
                                        @include('partials.components.social')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="google-map" style="height: 300px;">
                                <div style="height:150px; width: 100%;" class="m-bot-50 border light-gray">
                                    @gmap('150px', '15', 'images/favicon.png', true)
                                </div>
                            </div>
                            <div class="directions">
                                <a target="_blank" href="https://www.google.com/maps/dir/Current+Location/{!! urlencode(strip_tags(setting('theme::address'))) !!}" class="btn btn-block text-uppercase"><i class="fa fa-compass m-rgt-5"></i> {{ trans('themes::contact.directions') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection