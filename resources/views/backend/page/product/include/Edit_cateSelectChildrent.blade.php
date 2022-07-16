@if ($cateItemParent->categoryChildrent->count())
    @php
        $dash .= '-- ';
    @endphp
    @foreach ($cateItemParent->categoryChildrent as $cateItemChild)

        <div class="form-check ">
            <input @foreach ($product->in_many_categorys as $id_cate)
            {{ $cateItemChild->id_category == $id_cate->id_category ? 'checked' : '' }}
    @endforeach
    type="checkbox" name="category_id[]" class="form-check-input" id="{{ $cateItemChild->id_category }}"
    value="{{ $cateItemChild->id_category }}">

    <label class="form-check-label" for="{{ $cateItemChild->id_category }}">
        {{ $dash }}
        {{ $cateItemChild->name_category }}</label>
    </div>

    @if ($cateItemChild->categoryChildrent->count())
        @include('backend.page.product.include.Add_cateSelectChildrent',['cateItemParent'=>$cateItemChild])
    @endif
@endforeach
@endif
