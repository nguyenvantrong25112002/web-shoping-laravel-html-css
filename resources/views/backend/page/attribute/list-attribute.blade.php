@extends('backend.layout')
@section('admin-layout'),
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-6">
                        <div class="card-header">
                            <h2>Danh sách thuộc tính sản phẩm</h2>
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
                                    <th scope="col">#</th>
                                    <th scope="col">Tên loại</th>
                                    <th scope="col">Thứ tự hiển thị</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Ngày thêm</th>
                                    <th scope="col">Ngày sửa</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attributes as $stt => $attribute)

                                    <tr>
                                        <th>{{ $stt++ }}</th>
                                        <td>{{ $attribute->name }} </td>
                                        <td>{{ $attribute->order }} </td>
                                        <td> {{ $attribute->status == 0 ? 'Hiện' : 'Ẩn' }} </td>
                                        <td>{{ date('d-m-Y H:i', strtotime($attribute->created_at)) }} </td>
                                        <td>{{ date('d-m-Y H:i', strtotime($attribute->updated_at)) }} </td>
                                        <td>
                                            <a href="{{ route('admin.attribute.editForm', ['proattr_id' => $attribute->proattr_id]) }}"
                                                class='badge badge-rounded badge-primary'>Sửa</a>
                                            <a href="{{ route('admin.attribute.delete', ['proattr_id' => $attribute->proattr_id]) }}"
                                                class='badge badge-rounded badge-danger'>Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('javascrip')

@endsection
