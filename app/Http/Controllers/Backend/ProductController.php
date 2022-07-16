<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\ProductAttribute;

date_default_timezone_set('Asia/Ho_Chi_Minh');

class ProductController extends Controller
{
    private $URL_IMG_PRODUCT = 'image/product';
    private $URL_IMG_GALLERY = 'image/gallery';

    private function queryFilter()
    {
        // dd(is_numeric(request('limit')));
        $data = Product::orderBy('updated_at', 'desc')
            ->paginate(
                request('category') ?? 5

                // request('category') ?? (!is_numeric(request('category')) ? request('category')  : null)
            );
            // ->when(request()->has('category'), function ($q) {
            //     // return $q->whereHas('categorys', function ($q) {
            //     //     $q->contains(request('category'));
            //     // });
            //     return $q->categorys->contains(request('category'));
            //     // dd(request('category'));
            // })
        ;
        return $data;
    }
    public function index()
    {
        $categoryParent = Category::where('parent_id', 0)->get();

        $products = $this->queryFilter();
        // dd($product);
        return view('backend.page.product.list-product', compact(
            'products',
            'categoryParent'
        ));
    }

    public function create()
    {
        $categoryParent = Category::where('status_category', 0)->where('parent_id', 0)->get();
        return view('backend.page.product.add-product', compact(
            'categoryParent',
        ));
    }

    public function store(Request $request)

    {
        // dd($request->category_id);
        $validator = Validator::make(
            $request->all(),
            [
                'img_gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:4048',
                'img_product' => "required|image|mimes:jpeg,png,jpg,gif|max:4048",
                'name_product' => 'required',
                'slug_product' => 'required',
                'category_id' => 'required',
                'price_product' => "required|numeric|min:0|not_in:0",
                'saleoff_product' => 'nullable|integer',
                'quantity_product' => 'required|integer',
                'details_product' => 'required',
            ],
            [
                'img_gallery.max' => 'Ảnh vượt quá 2MB !!',
                'img_gallery.mimes' => 'Sai định dạnh ảnh !!',
                'img_product.required' => 'Chưa thêm ảnh !!',
                'img_product.max' => 'Ảnh vượt quá 2MB !!',
                'img_product.image' => 'Sai định dạnh ảnh !!',
                'name_product.required' => 'Chưa nhập tên sản phẩm !!',
                'slug_product.required' => 'Chưa slug sản phẩm !!',
                'category_id.required' => 'Chưa chọn danh mục !!',
                'price_product.required' => 'Chưa nhập giá !!',
                'price_product.numeric' => 'Phải là số',
                'price_product.min' => 'Giá phải lớn hơn 0 !!',
                'price_product.not_in' => 'Giá bằng 0 ??',
                'saleoff_product.integer' => 'Giá phải là số !!',
                'quantity_product.integer' => 'Số lượng phải là số !!',
                'quantity_product.required' => 'Chưa nhập số lượng !!',
                'details_product.required' => 'Bạn chưa nhập chi tiết',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        if ($request->hasFile('img_product')) {
            $image = $request->file('img_product');
            $filename = time() . '_' . rand(01, 99) . '_img.' . $image->getClientOriginalExtension();
            $request->img_product->move(public_path("$this->URL_IMG_PRODUCT"), $filename);
            $img_product = $filename;
        }
        if (empty($request->pricesale_product)) {
            $request->pricesale = ((($request->price_product) * ($request->saleoff_product)) / 100);
            $request->pricesale_product = (($request->price_product) - ($request->pricesale));
            $pricesale_product = $request->pricesale_product;
        } else {
            $pricesale_product = $request->pricesale_product;
        }

        $product = Product::create([
            'name_product' => $request->name_product,
            'slug_product' => $request->slug_product,
            'price_product' => $request->price_product,
            'saleoff_product' => $request->saleoff_product,
            'quantity_product' => $request->quantity_product,
            'description_product' => $request->description_product,
            'details_product' => $request->details_product,
            'status_product' => $request->status_product,
            'pricesale_product' => $pricesale_product,
            'img_product' => $img_product,
        ]);
        $category_id = $request->category_id;

        // $product->in_many_categorys()->attach($category_id);

        $product->in_many_categorys()->sync($category_id);
        if ($product) {
            $id_product = $product->id_product;
        }

        if ($request->hasFile('img_gallery')) {

            $get_image = $request->file('img_gallery');
            if ($get_image) {
                foreach ($get_image as $file_gallery) {
                    $filename_gallery = time() . '_' . rand(01, 99) . '_gallery_img.' . $file_gallery->getClientOriginalExtension();
                    $file_gallery->move(public_path("$this->URL_IMG_GALLERY"), $filename_gallery);
                    $gallery = new Gallery();
                    $gallery->product_id = $id_product;
                    $gallery->order_gallery = 0;
                    $gallery->img_gallery = $filename_gallery;
                    $gallery->save();
                }
            }
        }
        return Redirect::route('admin.product.list')->with('mes', 'Thêm sản phẩm thành công !!');
    }
    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product, $id_product)
    {
        $product = Product::find($id_product);

        $gallery_count = Gallery::where('product_id', $id_product)->count();
        $categoryParent = Category::where('status_category', 0)->where('parent_id', 0)->get();
        return view('backend.page.product.edit-product', compact(
            'product',
            'categoryParent',
            'gallery_count',
        ));
    }

    public function update(Request $request, $id_product)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'img_gallery.*' => "mimes:jpeg,png,jpg,gif,svg,webp,jfif|max:4048",
                'img_product' => "mimes:jpeg,png,jpg,gif,svg,webp,jfif|max:4048",
                'name_product' => 'required',
                'category_id' => 'required',
                'price_product' => 'required|integer',
                'saleoff_product' => 'nullable|integer',
                'quantity_product' => 'required|integer',
                'details_product' => 'required',
            ],
            [
                'img_gallery.mimes' => 'Sai định dạng ảnh !!',
                'img_gallery.max' => 'Ảnh không vượt quá 2MB !!',
                'img_product.mimes' => 'Sai định dạng ảnh !!',
                'img_product.max' => 'Ảnh không vượt quá 2MB !!!',
                'name_product.required' => 'Bạn chưa nhập tên sản phẩm !!',
                'category_id.required' => 'Bạn chưa chọn danh mục !!!',
                'price_product.required' => 'Bạn chưa nhập giá !!',
                'price_product.integer' => 'Phải là số !!',
                'saleoff_product.integer' => 'Phải là số !!',
                'quantity_product.integer' => 'Phải là số !!',
                'quantity_product.required' => 'Bạn chưa nhập số lượng !!',
                'details_product.required' => 'Bạn chưa nhập chi tiết !!',
            ]
        );

        // dd($validator->errors()->toArray());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $model = Product::find($id_product);
        $category_id = $request->category_id;
        $model->in_many_categorys()->sync($category_id);
        // $model->in_many_categorys()->attach($category_id);
        $model->name_product = $request->name_product;
        $model->slug_product = $request->slug_product;
        $model->price_product = $request->price_product;
        $model->quantity_product = $request->quantity_product;
        $model->description_product = $request->description_product;
        $model->details_product = $request->details_product;
        $model->saleoff_product = $request->saleoff_product;
        $model->status_product = $request->status_product;
        if (empty($request->pricesale_product)) {
            $request->pricesale = ((($request->price_product) * ($request->saleoff_product)) / 100);
            $request->pricesale_product = (($request->price_product) - ($request->pricesale));

            $model->pricesale_product = $request->pricesale_product;
        } else {
            $model->pricesale_product = $request->pricesale_product;
        }

        if ($request->hasFile('img_product')) {
            $oldFilename = $model->img_product;
            if (File::exists(public_path("$this->URL_IMG_PRODUCT/$oldFilename"))) {
                File::delete(public_path("$this->URL_IMG_PRODUCT/$oldFilename"));
            }
            $image = $request->file('img_product');
            $filename = time() . '_' . rand(01, 99) . '_img.' . $image->getClientOriginalExtension();
            $request->img_product->move(public_path("$this->URL_IMG_PRODUCT"), $filename);
            $model->img_product = $filename;
        }

        $model->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $model->save();
        if ($request->hasFile('img_gallery')) {
            $get_image = $request->file('img_gallery');
            if ($get_image) {
                foreach ($get_image as $file_gallery) {
                    $filename_gallery = time() . '_' . rand(01, 99) . '_gallery_img.' . $file_gallery->getClientOriginalExtension();
                    $file_gallery->move(public_path("$this->URL_IMG_GALLERY"), $filename_gallery);
                    $gallery = new Gallery();
                    $gallery->product_id = $id_product;
                    $gallery->order_gallery = 0;
                    $gallery->img_gallery = $filename_gallery;
                    $gallery->save();
                }
            }
        }
        return Redirect::route('admin.product.list')->with('mes', 'Cập nhật thành công !!');
    }

    public function destroy(Product $product)
    {
        if (isset($_GET['id_product'])) {
            $id_product = $_GET['id_product'];
            $pro = Product::find($id_product);
            $gallery = Gallery::where('product_id', $id_product)->get();
            if ($pro) {
                $pro->in_many_categorys()->detach();
                $pro->in_many_attr()->detach();
                if (File::exists(public_path("$this->URL_IMG_PRODUCT/$pro->img_product"))) {
                    File::delete(public_path("$this->URL_IMG_PRODUCT/$pro->img_product"));
                }
                Product::destroy($id_product);
                if ($gallery) {
                    foreach ($gallery as $imggallery) {
                        if (File::exists(public_path("$this->URL_IMG_GALLERY/$imggallery->img_gallery"))) {
                            File::delete(public_path("$this->URL_IMG_GALLERY/$imggallery->img_gallery"));
                        }
                        Gallery::where('product_id', $id_product)->delete();
                    }
                }
            }
            return Redirect::route('admin.product.list')->with('mes', 'Xóa thành công!!');
        }
    }

    public function updateStatusAjax()
    {
        if (isset($_GET['id_product'])) {
            if (isset($_GET['status_product'])) {
                $status_product = $_GET['status_product'];
                if ($status_product  == 0) {
                    $status_product = 1;
                } else {
                    $status_product = 0;
                }
            }
            $id_product = $_GET['id_product'];
            $pro = Product::find($id_product)->update([
                'status_product' =>  $status_product,
            ]);
        }
    }
    public function add_productAttributes()
    {
        $productAttributes = ProductAttribute::all();
        // dd($productAttributes);
        return view('backend.page.product.include.add_modal_list', compact(
            'productAttributes',
        ));
    }
    public function productAttributes(Request $request)
    {
        $attrval_id = $request->attrval_id;
        // dd($attrval_id);

        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $product->in_many_attr()->sync($attrval_id);
        $product->save();
        return Redirect::back();
    }
    public function edit_productAttributes()
    {
        $product_id = $_GET['id_pro'];
        $product = Product::find($product_id);
        $productAttributes = ProductAttribute::all();
        return view('backend.page.product.include.edit_modal_list', compact(
            'product',
            'productAttributes'
        ));
    }
}