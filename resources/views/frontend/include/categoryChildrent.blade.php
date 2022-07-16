@if ($cateParent->categoryChildrent->count())
    <ul class="sub-menu">
        @foreach ($cateParent->categoryChildrent as $categoryChild)
            <li class=" menu-item-has-children dropdown">
                <a
                    href="{{ route('web.product.listing', $categoryChild->id_category) }}">{{ $categoryChild->name_category }}</a>
                @if ($categoryChild->categoryChildrent->count())
                    @include('frontend.include.categoryChildrent',['cateParent'=>$categoryChild])
                @endif
            </li>
        @endforeach
    </ul>
@endif
