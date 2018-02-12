@extends('layouts.master')

@section('content')
    <main class="p-top-120 p-bot-100">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="title-hr"></div>
                </div>
                <div class="col-md-8 col-lg-6"><h1>İletişim</h1></div>
            </div>
        </div>
    </main>

    <div class="content">
        <div class="map m-bot-100">
            @gmap('300px', '16', 'images/favicon.png')
        </div>
        <div class="page-inner">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="section-info">
                                <div class="title-hr"></div>
                                <div class="info-title">Bizimle Kalın</div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row-contact row">
                                <div class="col-contact col-lg-4">
                                    <h3 class="contact-title contact-top">{{ setting('theme::company-name') }}</h3>
                                    <p class="contact-address text-muted"><strong>{!! setting('theme::address') !!}</strong></p>
                                    <p class="contact-row"><strong class="text-white">E-Posta:</strong> {!! Html::email(setting('theme::email')) !!}</p>
                                </div>
                                <div class="col-contact col-lg-8">
                                    <p class="contact-top"><strong class="text-muted">Telefon:</strong></p>
                                    <p class="phone-lg text-white">{{ setting('theme::phone') }} / {{ setting('theme::phone2') }}</p>
                                    <p class="text-muted"><strong class="text-white">Çalışma Saatleri</strong><br>
                                        Pazartesi - Cuma : 09:00 - 18:00 <br>
                                        Cumartesi: 09:00 - 14:00</p>
                                    <div class="text-muted"><strong class="text-white">Bizi Takip Edin</strong><br>
                                        <div class="contact-social social-list">
                                            @include('partials.components.social')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-message section p-bot-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="section-info">
                                <div class="title-hr"></div>
                                <div class="info-title">Sorunuz mu var?</div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <form class="js-form">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-lg-4">
                                        <input class="input-gray" type="text" name="name" required placeholder="Adınız">
                                    </div>
                                    <div class="form-group col-sm-6 col-lg-4">
                                        <input class="input-gray" type="email" name="email" placeholder="E-Posta">
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <input class="input-gray" type="text" name="subject" placeholder="Konu">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <textarea class="input-gray" name="message"  required  placeholder="Mesaj"></textarea>
                                    </div>
                                    <div class="col-sm-12"><button type="submit" class="btn-upper btn-yellow btn">Gönder</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection