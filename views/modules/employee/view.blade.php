@extends('layouts.master')

@section('content')

    <div class="content p-top-bot-50">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $employee->present()->firstImage(370,450,'fit',80) }}" alt="{{ $employee->fullname }}" class="z-depth-20 effect effect-gray effect-size respimg">
                    </div>
                    <div class="col-md-8">
                        <h1 class="title p-top-bot-0 m-top-0 m-bot-0">{{ $employee->fullname }}</h1>
                        <h3 class="sub-title m-top-0 m-bot-20 dt-color">{{ $employee->position }}</h3>
                        <hr/>
                        <div class="information">
                            {!! $employee->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection