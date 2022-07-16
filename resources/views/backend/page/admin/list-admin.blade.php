@extends('backend.layout')
@section('admin-layout')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Danh sách admin</h1>
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
                                <th>Vai trò(Role)</th>
                                {{-- <th>Quyền(Permisstion)</th> --}}
                                @role('admin', 'admin')
                                    <th>Thao tác</th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>
                                        {{ $stt++ }}
                                    </td>
                                    <td>
                                        <img style="max-width:100%" src="{{ asset("$URL_IMG_USERS/$admin->admin_img") }}"
                                            alt="">
                                    </td>
                                    <td>
                                        {{ $admin->admin_name }}
                                    </td>
                                    <td>{{ $admin->admin_email }} </td>
                                    <td>
                                        @foreach ($admin->roles as $role_ad)
                                            {{ $role_ad->name }}
                                        @endforeach
                                    </td>
                                    {{-- <td></td> --}}
                                    @role('admin', 'admin')
                                        <td>
                                            <div class="btn-group dropleft mb-3">
                                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Thao tác
                                                </button>
                                                <div class="dropdown-menu">
                                                    {{-- <a href="{{ route('admin.admin.decentralize', ['id_admin' => $admin->id_admin]) }}"
                                                    class="ml-2 badge badge-rounded badge-primary mb-2">
                                                    <i class="icofont-ui-edit"></i>
                                                    Phân quyền
                                                </a> --}}
                                                    <button type="button"
                                                        class="sub-decentralization ml-2 mb-2 btn btn-primary btn-lg"
                                                        data-id_admin=" {{ $admin->id_admin }}" data-toggle="modal"
                                                        data-target="#modaPermission">
                                                        Phân quyền phụ
                                                    </button>
                                                    <button type="button" class="role-assignment btn btn-primary ml-2 mb-2"
                                                        data-toggle="modal" data-id_admin=" {{ $admin->id_admin }}"
                                                        data-target="#exampModaRole">
                                                        Phân vai trò
                                                    </button>
                                                    <a href="#" class="ml-2 badge badge-rounded badge-danger mb-2">
                                                        <i class="icofont-bin"></i>
                                                        Gỡ
                                                    </a>
                                                </div>
                                            </div>
                                            <br>
                                            <a href="{{ route('admin.auth.impersonate_role', ['id_admin' => $admin->id_admin]) }}"
                                                class="ml-2 badge badge-rounded badge-primary mb-2">
                                                <i class="icofont-ui-edit"></i>
                                                Chuyển quyền nhanh
                                            </a>
                                        </td>
                                    @endrole
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- modaRole -->
    @role('admin', 'admin')
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampModaRole" tabindex="-1" role="dialog"
            aria-labelledby="Danh sách vai trò" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Danh sách vai trò</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form_role_admin">
                        @csrf
                        <div class="modal-body">
                            <div id="result_role">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Cập nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modaPermission -->
        <div class="modal fade" id="modaPermission" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Danh sách quyền phụ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form_permission_admin">
                        @csrf
                        <div class="modal-body">

                            <div id="result_permission">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endrole
@endsection
@section('javascrip')
    <script>
        //permission
        $('.sub-decentralization').on('click', function(e) {
            let id_admin = $(this).attr('data-id_admin');
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "{{ route('admin.admin.get_permission') }}",
                data: {
                    id_admin: id_admin
                },
                success: function(response) {
                    $('#result_permission').html(response);
                    form_permission_admin();
                }
            });
        });

        function form_permission_admin() {
            $('#form_permission_admin').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var data = form.serialize();
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.permission.add') }}",
                    data: data,
                    success: function(response) {
                        $('#modaPermission').modal('hide')

                    },
                });
            });
        }

        //role

        $('.role-assignment').on('click', function(e) {
            let id_admin = $(this).attr('data-id_admin');
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "{{ route('admin.admin.get_role') }}",
                data: {
                    id_admin: id_admin
                },
                success: function(response) {
                    $('#result_role').html(response);
                    form_role_admin();
                }
            });
        });

        function form_role_admin() {
            $('#form_role_admin').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var data = form.serialize();
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.role.add') }}",
                    data: data,
                    success: function(response) {
                        $('#exampModaRole').modal('hide');
                    },
                });
            });
        }
    </script>
@endsection
