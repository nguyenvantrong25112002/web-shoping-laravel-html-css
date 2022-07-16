@extends('backend.layout')
@section('admin-layout')

    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Thêm thuộc tính sản phẩm</h1>
        </div>
        <div class=" card-body">
            <div class="basic-form">
                <form action="{{ route('admin.attribute_value.addSave') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Loại thuộc tính</label>
                                <select id="product_attribute_id" class="form-control" name="product_attribute_id" id="">
                                    <option data-type_attributes='' value="null">Chọn loại thuộc tính</option>
                                    @foreach ($productattributes as $productattribute)
                                        <option data-type_attributes='{{ $productattribute->type }}'
                                            value="{{ $productattribute->proattr_id }}">
                                            {{ $productattribute->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn  btn-primary mt-3">Thêm</button>
                                {{-- <a class="btn btn-pinterest mt-3" href="{{ route('admin.product.addForm') }}">Reset</a>
                                <a class="btn btn-google mt-3" href="{{ route('admin.product.list') }}">
                                    Quay lại
                                </a> --}}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="field-wrapper form-group">
                                <div class="field_wrapper">
                                    <div class="field_wrapper-item">
                                        <label class="col-form-label">Giá trị thuộc tính:</label>
                                        <input type="text" name="value[]" value="" class="form-control">
                                    </div>

                                    <a href="javascript:void(0);" class="add_button" title="Add field">
                                        <i class="icofont-ui-add"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .field_wrapper {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            box-shadow: 0px 2px 0px 0px black;
        }

        .field_wrapper a {
            margin-left: 10px;
            padding: 7px 10px;
            border-radius: 50%;
        }

        .field_wrapper a:hover {
            background-color: #2ecc71;
        }

    </style>
@endsection
@section('javascrip')
    <script>
        $('.field-wrapper').hide();
        $(document).ready(function() {
            $('#product_attribute_id').on("change", function() {
                var dataid = $("#product_attribute_id option:selected").attr('data-type_attributes');
                if (dataid != '') {
                    $("input[name='value[]']").attr('type', dataid);
                    $('.field-wrapper').show();
                } else {
                    $('.field-wrapper').hide();
                }
            });
        });
        $(document).ready(function() {
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field-wrapper'); //Input field wrapper
            var fieldHTML = '';
            fieldHTML += '<div class="field_wrapper">';
            fieldHTML += '<div class="field_wrapper-item">';
            fieldHTML += '<label class="col-form-label">Giá trị thuộc tính:</label>';
            fieldHTML += '<input type="text" name="value[]" value="" class="form-control">';
            fieldHTML += '</div>';
            fieldHTML += '<a href="javascript:void(0);" class="remove_button">';
            fieldHTML += ' <i class="icofont-ui-close"></i>';
            fieldHTML += ' </a>';
            fieldHTML += ' </div>';
            var x = 1; //Initial field counter is 1
            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
@endsection
