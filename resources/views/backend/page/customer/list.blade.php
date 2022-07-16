@extends('backend.layout')
@section('admin-layout')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Danh sách người dùng</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableData" class="table table-hover table-responsive-sm">
                        <thead class="thead-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th style="width:130px">Ảnh</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $key => $customer)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="" alt="">
                                    </td>
                                    <td>{{ $customer->name_customer }}</td>
                                    <td>{{ $customer->email_customer }}</td>
                                    <td>{{ $customer->phone_customer }}</td>
                                    <td><a name="" id="" class="btn btn-danger" href="#" role="button">Khóa tài khoản</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
