<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\Category;

// date_default_timezone_set('Asia/Ho_Chi_Minh');
class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {



        $categoryParent = Category::where('parent_id', 0)->get();
        return view('backend.page.category.list-category', [
            'categoryParent' => $categoryParent
        ]);
    }



    public function create()
    {
        $categoryParent = Category::where('parent_id', 0)->get();
        return view('backend.page.category.add-category', compact('categoryParent'));
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        return redirect()->route('admin.category.list');
    }


    public function show(Category $category)
    {
    }


    public function edit(Category $category, $id_category)
    {


        if ($id_category == null && !$id_category) {
            return redirect()->back()->with('error', 'Lỗi không tìm được id!!!');
        }
        $category = Category::find($id_category);
        if (!$category) {
            return redirect()->back()->with('error', 'Lỗi không tìm được id!!!');
        }
        $categoryParent = Category::where('status_category', 0)->where('parent_id', 0)->get();
        return view('backend.page.category.edit-category', compact(
            'categoryParent',
            'category',
        ));
    }


    public function update(Request $request, Category $category, $id_category)
    {
        if ($id_category == null && !$id_category) {
            return redirect()->back()->with('error', 'Lỗi không tìm được id!!!');
        }
        $category = Category::find($id_category);
        if (!$category) {
            return redirect()->back()->with('error', 'Lỗi không tìm được id!!!');
        }
        if ($category->id_category > $request->parent_id || $category->id_category < $request->parent_id) {
            $category->parent_id = $request->parent_id;
        } else {
            return redirect()->back()->with('error', 'Không thể làm cha của chính nó!!!');
        }

        $category->slug_category = Str::slug($request->name_category);

        $category->fill($request->all());
        $category->save();
        return redirect()->route('admin.category.list')->with('mes', 'Sửa thành công!!!');
    }


    public function destroy(Category $category, $id_category)
    {

        if ($id_category == null && !$id_category) {
            return redirect()->back()->with('error', 'Lỗi không tìm được id!!!');
        }
        $category = Category::find($id_category);
        if (!$category) {
            return redirect()->back()->with('error', 'Lỗi không tìm được id!!!');
        }

        if ($category->parent_id >= 0) {
            Category::where('parent_id', $category->id_category)->delete();
        }
        Category::destroy($id_category);
        return redirect()->back()->with('mes', 'Xóa thành công!!!');
    }


    public function destroyAll(Request $request, Category $category, $id_category)
    {
        // if (!empty($request->id_categorys)) {
        print_r($request->id_categorys);
        // }
        // die;
        // if ($id_category == null && !$id_category) {
        //     return redirect()->back()->with('error', 'Lỗi không tìm được id!!!');
        // }
        // $category = Category::find($id_category);
        // if (!$category) {
        //     return redirect()->back()->with('error', 'Lỗi không tìm được id!!!');
        // }

        // if ($category->parent_id >= 0) {
        //     Category::where('parent_id', $category->id_category)->delete();
        // }
        // Category::destroy($id_category);
        // return redirect()->back()->with('mes', 'Xóa thành công!!!');
    }
}