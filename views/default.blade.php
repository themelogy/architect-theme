@extends('layouts.master')

@php
    if(isset($page)) {
        if(!$coverImage = $page->present()->coverImage(1920,800,'fit',80)) {
            $coverImage = null;
        }
    }
@endphp

@section('content')
    <main class="section-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title h-line">{{ $page->title }}</h1>
                </div>
            </div>
        </div>
    </main>

    <div class="content m-bot-50">
        <div class="page-inner">
            <section class="section section-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            {!! $page->body !!}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    {!! Widget::get('portfolio_brands', [20]) !!}
@stop
