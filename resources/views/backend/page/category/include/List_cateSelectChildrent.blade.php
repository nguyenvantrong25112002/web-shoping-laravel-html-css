@if ($cateItemParent->categoryChildrent->count())
    @php
        $dash .= '-- ';
    @endphp
    @foreach ($cateItemParent->categoryChildrent as $cateItemChild)
        <tr>
            <td>
                <input name='id_categorys' value=" . $cateItemParent->id_category . " type='checkbox'
                    class='checkBoxClass'>
            </td>
            <td>{{ $dash . $cateItemChild->name_category }} </td>
            <td>{{ $cateItemChild->order_category }} </td>
            <td> {{ $cateItemChild->status_category == 0 ? 'Hiện' : 'Ẩn' }} </td>
            <td>{{ date('d-m-Y H:i', strtotime($cateItemChild->created_at)) }} </td>
            <td>{{ date('d-m-Y H:i', strtotime($cateItemChild->updated_at)) }} </td>
            <td>
                <a href="{{ route('admin.category.editForm', $cateItemChild->id_category) }} "
                    class='badge badge-rounded badge-primary'>Sửa</a>
                <a onclick="return Delete('{{ $cateItemChild->name_category }} ')"
                    href=" {{ route('admin.category.delete', $cateItemChild->id_category) }} "
                    class='badge badge-rounded badge-danger'>Xóa</a>
            </td>
        </tr>
        @if ($cateItemChild->categoryChildrent->count())
            @include(
                'backend.page.category.include.List_cateSelectChildrent',
                ['cateItemParent' => $cateItemChild]
            )
        @endif
    @endforeach
@endif
