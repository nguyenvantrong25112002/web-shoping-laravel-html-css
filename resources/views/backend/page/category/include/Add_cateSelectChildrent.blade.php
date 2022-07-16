@if ($cateItemParent->categoryChildrent->count())
    @php
        $dash .= '-- ';
    @endphp
    @foreach ($cateItemParent->categoryChildrent as $cateItemChild)
        <option value="{{ $cateItemChild->id_category }}">
            {{ $dash }} {{ $cateItemChild->name_category }}
        </option>
        @if ($cateItemChild->categoryChildrent->count())
            @include(
                'backend.page.category.include.Add_cateSelectChildrent',
                ['cateItemParent' => $cateItemChild]
            )
        @endif
    @endforeach
@endif
