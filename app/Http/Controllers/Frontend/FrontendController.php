<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;

use App\Models\Gallery;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function homePage()
    {
        // dd(Carbon::now()->year);
        // // inRandomOrder()
        $productHome = Product::where('status_product', 0)
            ->orderBy('id_product', 'DESC')->limit(8)
            ->get();
        $productHomeSale = Product::where('status_product', 0)->where('saleoff_product', '>', 0)->orderBy('saleoff_product', 'DESC')->take(10)
            ->get();

        $productAttributes = ProductAttribute::where('status', 1)->orderBy('order', 'ASC')->get();
        $bannerHome = Banner::where('status_banner', 0)->orderBy('id_banner', 'desc')->get();
        // dump($productAttributes);
        // dump($bannerHome);
        // dump($productHomeSale);
        // dd($productHome);
        return view('frontend.page.home', compact(
            'productHome',
            'productHomeSale',
            'bannerHome',
            'productAttributes',
        ));
    }

    public function productCate($id_category)
    {
        $productCate = Category::find($id_category);
        $productAttributes = ProductAttribute::where('status', 1)->orderBy('order', 'ASC')->get();
        $attributes = ProductAttribute::orderBy('order', 'ASC')->get();
        return view('frontend.page.product-listing', compact(
            'productCate',
            'productAttributes',
            'attributes'
        ));
    }

    public function productDetail($slug_product,)
    {
        $productDetai = Product::where('slug_product', $slug_product)->first();
        $productAttributes = ProductAttribute::where('status', 1)->get();
        // inRandomOrder
        $products = Product::all();
        return view('frontend.page.product-detail', compact(
            'productDetai',
            'productAttributes',
            'products'
        ));
    }
    public function contactUs()
    {
        return view('frontend.page.contact-us');
    }



    public function search_ajax(Request $request)
    {
        $key = $request->key_search;
        $products = Product::where('name_product', 'like', '%' . $key . '%')
            ->take(5)
            ->get();
        return view('frontend.include.search-result', compact('products'));
    }
}