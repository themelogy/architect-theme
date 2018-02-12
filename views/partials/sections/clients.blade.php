{!! Widget::get('portfolio_brands', [20]) !!}

@push('js-stack')
{!! Asset::add(Theme::url('vendor/owl.carousel/dist/owl.carousel.min.js')) !!}
@endpush