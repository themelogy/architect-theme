@extends('layouts.master')

@section('content')
    <main class="p-bot-50">
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
                            <h3 class="contact-title contact-top">{{ setting('theme::company-name') }}</h3>
                            <p class="contact-address m-bot-5 text-muted">{!! setting('theme::address') !!}</p>
                            <p class="phone-sm m-bot-5 text-muted">{{ setting('theme::phone') }} / {{ setting('theme::phone2') }}</p>
                            <p class="contact-row text-muted email-sm">{!! Html::email(setting('theme::email')) !!}</p>

                            <div class="text-muted m-top-30"><strong>{{ trans('themes::contact.follow us') }}</strong><br>
                                <div class="contact-social social-list">
                                    @include('partials.components.social')
                                </div>
                            </div>

                            <div style="height:200px; width: 95%;" class="m-top-50 m-bot-50 border light-gray">
                                @gmap('200px', '16', 'images/favicon.png')
                            </div>

                        </div>
                        <div class="col-md-6">
                            @include('contact::form')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection