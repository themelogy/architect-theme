@extends('layouts.master')

@php
    if(isset($page)) {
        if(!$coverImage = $page->present()->coverImage(1920,800,'fit',80)) {
            $coverImage = null;
        }
    }
@endphp

@section('content')
    <main class="p-top-120 p-bot-100">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="title-hr"></div>
                </div>
                <div class="col-md-8 col-lg-6">
                    <h1>{{ $page->title }}</h1>
                </div>
            </div>
        </div>
    </main>

    <div class="content">
        <div class="content-entry-image" style="background: url({{ $coverImage }}) no-repeat center center fixed"></div>
        <div class="page-inner md-p-top-bot-40">
            <section class="section about-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-display-1">
                                {!! $page->body !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    @include('partials.sections.clients')
@stop
