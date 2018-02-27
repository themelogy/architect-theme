@if(count($brands)>0)
    <section class="section-clients bg-dots light p-top-bot-20 boxed">
        <div class="container-fluid  ">
            <div class="partner-carousel owl-carousel">
                @foreach($brands as $brand)
                    <div class="partner-carousel-item">
                        @if(!empty($brand->website))
                        <a target="_blank" href="{{ $brand->website }}">
                            <img src="{{ $brand->present()->firstImage(null, 50, 'resize', 70) }}"
                                 alt="{{ $brand->title }}">
                        </a>
                        @else
                            <img src="{{ $brand->present()->firstImage(null, 50, 'resize', 70) }}"
                                 alt="{{ $brand->title }}">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @push('js-stack')
    {!! Asset::add(Theme::url('vendor/owl.carousel/dist/owl.carousel.min.js')) !!}
    @endpush
@endif