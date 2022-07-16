@extends('backend.layout')
@section('admin-layout')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">

                <div class="row">
                    <div class="col-6">
                        <div class="card-header">
                            <h2>Sửa danh mục</h2>
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
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.category.editSave', $category->id_category) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Tên danh mục</label>
                                        <input id="text_slug" value="{{ $category->name_category }}" name="name_category"
                                            type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug danh mục</label>
                                        <input id="text_slug_result" value="{{ $category->slug_category }}"
                                            readonly="true" value="" name="slug_category" type="text" id="text_slug_result"
                                            class=" form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thứ tự danh mục (lớn đến bé)</label>
                                        <input value="{{ $category->order_category }}" name="order_category" type="number"
                                            class="form-control">
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

                                        <select name="parent_id" class="form-control">

                                            <option {{ $category->parent_id == 0 ? 'selected' : '' }} value="0"
                                                class="form-control-lg">Không thuộc danh mục</option>
                                            @foreach ($categoryParent as $cateItemParent)
                                                @php
                                                    $dash = '';
                                                @endphp
                                                <option
                                                    {{ $category->parent_id === $cateItemParent->id_category ? 'selected' : '' }}
                                                    value="{{ $cateItemParent->id_category }}" class="form-control-lg">
                                                    {{ $cateItemParent->name_category }}
                                                </option>
                                                @include(
                                                    'backend.page.category.include.Edit_cateSelectChildrent',
                                                    [
                                                        'cateItemParent' => $cateItemParent,
                                                    ]
                                                )
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="status_category" class="form-control">
                                            <option {{ $category->status_category == 0 ? 'selected' : '' }} value="0"
                                                class="form-control-lg">Hiện</option>
                                            <option {{ $category->status_category == 1 ? 'selected' : '' }} value="1"
                                                class="form-control-lg">Ẩn</option>
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
