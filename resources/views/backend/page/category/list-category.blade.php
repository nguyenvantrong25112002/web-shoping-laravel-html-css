@extends('backend.layout')
@section('admin-layout')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-6">
                        <div class="card-header">
                            <h2>Danh sách danh mục sản phẩm</h2>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div style="margin-top: 25px;">
                            <?php 
                            $mes = Session::get('mes');
                            $error = Session::get('error');
                            if ($mes) :?>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong><?= $mes ?></strong>
                                <?php Session::put('mes', null); ?>
                            </div>
                            <?php elseif ($error) :?>
                            <div style="margin: 0;" class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong><?= $error ?></strong>
                                <?php Session::put('error', null); ?>
                            </div>
                            <?php endif?>
                            <script>
                                $(".alert").alert();
                            </script>
                        </div>

                    </div>

                </div>
                <div style="padding: 0 20px" class="row">
                    <div class="col-2">
                        <a href="#" id="deleteAllCateSelect" class='badge badge-rounded badge-danger'>Xóa nhiều</a>
                    </div>
                </div>
                <div class=" card-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table table-hover table-responsive-sm">
                            <thead class="thead-primary">
                                <tr>
                                    <th><input type="checkbox" name="" id="checkAllCate"></th>
                                    <th>Tên danh mục</th>
                                    <th>Thứ tự hiển thị</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày thêm</th>
                                    <th>Ngày sửa</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categoryParent as $cateItemParent)
                                    @php
                                        $dash = '';
                                    @endphp
                                    <tr>

                                        <td>
                                            <input name='id_categorys' value=" $cateItemParent->id_category . "
                                                type='checkbox' class='checkBoxClass'>
                                        </td>
                                        <td>{{ $cateItemParent->name_category }} </td>
                                        <td>{{ $cateItemParent->order_category }} </td>
                                        <td> {{ $cateItemParent->status_category == 0 ? 'Hiện' : 'Ẩn' }} </td>
                                        <td>{{ date('d-m-Y H:i', strtotime($cateItemParent->created_at)) }} </td>
                                        <td>{{ date('d-m-Y H:i', strtotime($cateItemParent->updated_at)) }} </td>
                                        <td>
                                            <a href="{{ route('admin.category.editForm', $cateItemParent->id_category) }} "
                                                class='badge badge-rounded badge-primary'>Sửa</a>
                                            <a onclick="return Delete('{{ $cateItemParent->name_category }} ')"
                                                href=" {{ route('admin.category.delete', $cateItemParent->id_category) }} "
                                                class='badge badge-rounded badge-danger'>Xóa</a>
                                        </td>
                                    </tr>
                                    @include(
                                        'backend.page.category.include.List_cateSelectChildrent',
                                        ['cateItemParent' => $cateItemParent]
                                    )
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function Delete(name_category) {
                return confirm('Bạn có chắc chắn muốn xóa danh mục sản phẩm:   "' + name_category +
                    '"   kèm xóa những danh mục con nếu có ?');
            }
        </script>
    </div>
@endsection
@section('javascrip')
    <script>
        $(function(e) {
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            $('#checkAllCate').click(function() {
                $('.checkBoxClass').prop('checked', $(this).prop('checked'));
            });
            // $('#deleteAllCateSelect').click(function(e) {
            //     e.preventDefaut();
            //     var allid_cates = [];
            //     $('input:checkbox[name:id_categorys]:checked').each(function() {
            //         allid_cates.push($(this).val());
            //     });
            //     alert('â');
            //     $.ajax({
            //         url: "{{ route('admin.category.deleteall') }}",
            //         type: "DELETE",
            //         data: {
            //             id_categorys: allid_cates
            //         },
            //         success: function(response) {
            //             $.each(allid_cates, function(key, val) {
            //                 $('#sid_category' + val).remove();
            //             });
            //         }
            //     });
            // });


        });
    </script>
@endsection
