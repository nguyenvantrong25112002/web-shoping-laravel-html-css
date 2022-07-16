@extends('backend.layout')
@section('admin-layout')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Thêm danh mục</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form id="add_category" action="{{ route('admin.category.addSave') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Tên danh mục</label>
                                        <input name="name_category" type="text" id="text_slug" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug danh mục</label>
                                        <input value="{{ old('slug_category') }}" readonly="true" value=""
                                            name="slug_category" type="text" id="text_slug_result" class=" form-control">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Thứ tự danh mục (lớn đến bé)</label>
                                        <input name="order_category" type="number" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-rounded btn-primary">Lưu</button>
                                    <button style="margin-left: 10px" type="reset"
                                        class="btn btn-rounded btn-outline-secondary">Reset</button>
                                    <a href="{{ route('admin.category.list') }}" style="margin-left: 10px" type="submit"
                                        class="btn btn-rounded btn-outline-dark">Quay lại</a>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Thuộc danh mục</label>
                                        <select name="parent_id" class="selectpicker">
                                            <option value="0">Không thuộc danh mục</option>


                                            @foreach ($categoryParent as $cateItemParent)
                                                @php
                                                    $dash = '';
                                                @endphp
                                                <option value="{{ $cateItemParent->id_category }}">

                                                    {{ $cateItemParent->name_category }}
                                                </option>
                                                @include(
                                                    'backend.page.category.include.Add_cateSelectChildrent',
                                                    ['cateItemParent' => $cateItemParent]
                                                )
                                            @endforeach



                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="status_category" class="selectpicker">
                                            <option value="0">Hiện</option>
                                            <option value="1">Ẩn</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascrip')
    <script>
        $(document).ready(function() {
            $("#add_category").validate({
                onkeyup: false,
                rules: {
                    name_category: {
                        required: true,
                        minlength: 1,
                    },
                    order_category: {
                        number: true,
                    },

                },
                messages: {
                    name_category: {
                        required: 'Bạn chưa điền tên danh mục !!!',
                    },
                    order_category: {
                        number: 'Phải là số !!!',
                    },

                }
            });
        });
    </script>
@endsection
