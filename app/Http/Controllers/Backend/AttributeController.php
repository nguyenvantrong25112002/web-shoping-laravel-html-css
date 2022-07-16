<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = ProductAttribute::orderBy('updated_at', 'desc')->get();
        return view('backend.page.attribute.list-attribute', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.attribute.add-attribute');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $attribute = new ProductAttribute();
        $attribute->name = $request->name;
        $attribute->order = $request->order;
        $attribute->type = $request->type;
        $attribute->status = $request->status;
        $attribute->save();
        return Redirect::route('admin.attribute.list')->with('mes', 'Thêm thuộc tính thành công !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttribute $productAttribute)
    {
        if (isset($_GET['proattr_id'])) {
            $proattr_id = $_GET['proattr_id'];
            $attribute = ProductAttribute::find($proattr_id);
            return view('backend.page.attribute.edit-attribute', compact('attribute'));
        } else {
            return Redirect::back()->with('error', 'Lỗi không tìm thấy id thuộc tính !!!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttribute $productAttribute)
    {
        if (isset($_GET['proattr_id'])) {
            $proattr_id = $_GET['proattr_id'];
            $attribute = ProductAttribute::find($proattr_id);
            $attribute->name = $request->name;
            $attribute->order = $request->order;
            $attribute->type = $request->type;
            $attribute->status = $request->status;
            $attribute->save();
            return Redirect::route('admin.attribute.list')->with('mes', 'Sửa thuộc tính thành công !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $productAttribute)
    {
        if (isset($_GET['proattr_id'])) {
            $proattr_id = $_GET['proattr_id'];
            ProductAttribute::destroy($proattr_id);
            return Redirect::route('admin.attribute.list')->with('mes', 'Xóa thuộc tính thành công !!!');
        }
    }
}