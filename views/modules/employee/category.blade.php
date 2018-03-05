@extends('layouts.master')

@section('content')
    <div class="content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title h-line m-top-20">{{ $category->name }}</h1>
                        <ul class="team-holder">
                            @foreach($category->employees as $employee)
                                @include('employee::_employee')
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection