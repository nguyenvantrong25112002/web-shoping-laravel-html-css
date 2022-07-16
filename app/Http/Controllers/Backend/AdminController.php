<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    private $URL_IMG_USERS = 'image/users';
    public function index()
    {
        return view('backend.auth.login_admin');
    }

    public function registerAdmin()
    {
        return view('backend.auth.register_admin');
    }

    public function loginAdmin(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_pass = $request->admin_pass;

        if (Auth::guard('admin')->attempt([
            'admin_email' => $admin_email,
            'password' => $admin_pass
        ])) {
            if (Auth::guard('admin')->check()) {
                return Redirect::route('admin.dashboard');
            } else {
                return back();
            }
        } else {
            return back();
        }
    }
    public function logoutAdmin()
    {
        if (Session()->has('impersonate')) {
            Session::forget('impersonate');
        }
        Auth::guard('admin')->logout();
        return Redirect::route('admin.auth.login');
    }


    //thêm admin đầu tiên
    public function create(Request $request)
    {

        $admin = new Admin();
        $admin->admin_name = $request->admin_name;
        $admin->admin_img = $request->admin_img;
        $admin->admin_email = $request->admin_email;
        $admin->admin_pass = Hash::make($request->admin_pass);
        $admin->admin_phone = $request->admin_phone;
        $admin->admin_rank = 0;
        $admin->admin_address = $request->admin_address;
        $admin->save();
        return Redirect::route('admin.page.login')->with('mes', 'Đăng kí thành công !!');
    }



    public function formAdd()
    {
        return view('backend.page.admin.add-admin');
    }


    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'admin_name' => 'required',
                'admin_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048',
                'admin_email' => 'required|email|unique:tbl_admin',
                'admin_pass' => 'required',
                'admin_phone' => 'required|numeric',
                'admin_address' => 'required',
            ],
            [
                'admin_name.required' => 'Chưa nhập trường này !!',
                'admin_img.required' => 'Chưa nhập trường này !!',
                'admin_img.image' => 'Sai định dạng ảnh !!',
                'admin_email.required' => 'Chưa nhập trường này !!',
                'admin_email.email' => 'Sai định dạng email !!',
                'admin_email.unique' => 'Email này đã tồn tại !!',
                'admin_pass.required' => 'Chưa nhập trường này !!',
                'admin_phone.required' => 'Chưa nhập trường này !!',
                'admin_phone.numeric' => 'Chưa nhập trường này !!',
                'admin_address.required' => 'Chưa nhập trường này !!',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $admin = new Admin();
        $admin->admin_name = $request->admin_name;
        $admin->admin_email = $request->admin_email;
        $admin->admin_pass = Hash::make($request->admin_pass);
        $admin->admin_phone = $request->admin_phone;
        $admin->admin_address = $request->admin_address;
        if ($request->hasFile('admin_img')) {
            $image = $request->file('admin_img');
            $filename = time() . '_' . rand(01, 99)  . '_img.' . $image->getClientOriginalExtension();
            $request->admin_img->move(public_path("$this->URL_IMG_USERS"), $filename);
            $admin->admin_img = $filename;
        }

        $admin->save();
        return Redirect::route('admin.admin.list');
    }

    public function list_admin()
    {
        $admins = Admin::with('roles')->get();
        return view('backend.page.admin.list-admin', compact(
            'admins',
        ));
    }

    public function show(Admin $admin)
    {
        //
    }


    public function edit(Admin $admin)
    {
        //
    }


    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function destroy(Admin $admin)
    {
        //
    }


    public function decentralize($id_admin)
    {
        // $admin = Admin::find($id_admin);
        // dd($admin);
        // dd(Auth::guard('admin')->user()->toArray());
        $user = Auth::guard('admin')->user();

        dd($user->roles()->get());
        // dd($user->hasRole(Role::findById(5)));
    }
    public function get_role(Request $request)
    {
        $id_admin = $request->id_admin;
        try {
            $roles = Role::all();
            $user =  Admin::find($id_admin);
            if ($user) {
                $roles_admin = $user->roles()->first();
                return view('backend.page.admin.include.list_role', compact('roles_admin', 'roles', 'id_admin'));
            }
        } catch (\Throwable $th) {
            echo 'Lỗi không tải được vai trò';
        }
    }
    public function get_permission(Request $request)
    {
        $id_admin = $request->id_admin;
        try {
            $permissions = Permission::all();
            $user =  Admin::find($id_admin);
            if ($user) {
                $name_roles = $user->roles()->get();
                $permissions_via_role = $user->getAllPermissions();
            }
            return view(
                'backend.page.admin.include.list_permission',
                compact('id_admin', 'permissions', 'permissions_via_role', 'name_roles')
            );
        } catch (\Throwable $th) {
            echo 'Lỗi không tải được nhánh quyền';
        }
    }
    public function impersonate_role($id_admin)
    {

        $admin = Admin::find($id_admin);
        if ($admin) {
            Session::put('impersonate', $admin->id_admin);
        }
        return Redirect::route('admin.dashboard');
    }
}