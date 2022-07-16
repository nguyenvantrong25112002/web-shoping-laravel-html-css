@if ($cateItemParent->categoryChildrent->count())
    @php
        $dash .= '-- ';
    @endphp
    @foreach ($cateItemParent->categoryChildrent as $cateItemChild)
        {{-- <option value="{{ $cateItemChild->id_category }}" class="form-control-lg">
            {{ $dash }} {{ $cateItemChild->name_category }}
        </option> --}}


        <div class="form-check ">
            <input type="checkbox" name="category_id[]" class="form-check-input" id="{{ $cateItemChild->id_category }}"
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
