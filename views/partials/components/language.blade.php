@foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
    @php
        switch (Request::route()->getName()) {
            case 'page' && isset($page):
            $url = $page->present()->url($locale);
            break;
            case 'news.slug' && isset($post):
            case 'blog.slug' && isset($post):
            $url = $post->present()->url($locale);
            break;
            case 'news.category' && isset($category):
            case 'blog.category' && isset($category):
            case 'store.category.slug' && isset($category):
            $url = $category->present()->url($locale);
            break;
            case 'store.product.slug' && isset($product):
            $url = $product->present()->url($locale);
            break;
            case 'employee.view' && isset($employee):
            $url = $employee->present()->url($locale);
            break;
            default:
            $url = null;
            break;
        }
        $localizedUrl = LaravelLocalization::getLocalizedURL($locale, $url);
    @endphp
    @if(isset($list_type))
        <li class="{{ $locale == locale() ? 'active' : '' }}">
    @endif
    <a rel="alternate" hreflang="{!! $locale !!}" href="{{ $localizedUrl }}" class="{{ $locale == locale() ? 'active' : '' }}">
        {{ strtoupper($locale) }}
    </a>
    @if(isset($list_type))
        </li>
    @endif
@endforeach