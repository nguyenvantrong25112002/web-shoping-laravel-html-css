@if ($cateItemParent->categoryChildrent->count())
    @php
        $dash .= '-- ';
    @endphp

    @foreach ($cateItemParent->categoryChildrent as $cateItemChild)
        <option {{ $category->parent_id === $cateItemChild->id_category ? 'selected' : '' }}
            value="{{ $cateItemChild->id_category }}" class="form-control-lg">
            {{ $dash }} {{ $cateItemChild->name_category }}
        </option>
        @if ($cateItemChild->categoryChildrent->count())
            @include(
                'backend.page.category.include.Edit_cateSelectChildrent',
                ['cateItemParent' => $cateItemChild]
            )
        @endif
    @endforeach
@endif
