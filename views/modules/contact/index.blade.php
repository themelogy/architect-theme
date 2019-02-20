@extends('layouts.master')

@section('content')
    <main class="m-top-20 m-bot-10">
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

                                @locations('locations')

                                <div class="ik-form m-top-20">
                                    <a class="btn btn-default btn-bordered" href="{{ route('hr.application.form') }}"><i class="fa fa-users m-rgt-5"></i> {{ trans('themes::contact.ik form') }}</a>
                                </div>

                                <div class="text-muted m-top-10"><strong>{{ trans('themes::contact.follow us') }}</strong><br>
                                    <div class="contact-social social-list">
                                        @include('partials.components.social')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="google-map" style="height: 300px;">
                                <div style="height:150px; width: 100%;" class="m-bot-50 border light-gray">
                                    @include('contact::map')
                                </div>
                            </div>
                            <div class="directions">
                                <a target="_blank" href="https://www.google.com/maps/dir/Current+Location/{!! urlencode(strip_tags(setting('theme::address'))) !!}" class="btn btn-block text-uppercase btn-bordered"><i class="fa fa-compass m-rgt-5"></i> {{ trans('themes::contact.directions') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
