@foreach ($products as $product)
    <li>
        <a
            href=" {{ route('web.product.detail', [$product->slug_product]) }}">{{ Str::words(strip_tags($product->name_product), 5) }}....</a>
    </li>
@endforeach
