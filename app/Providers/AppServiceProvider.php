<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */


    public function boot()
    {
        // Blade::if('env', function ($environment) {
        //     return app()->environment($environment);
        // });



        Paginator::useBootstrap();
        Carbon::setLocale('vi');

        $cateProControllerParent = Category::where('status_category', 0)->where('parent_id', 0)->get();
        View::share('cateProControllerParent', $cateProControllerParent);


        $categoryProductControllerChild = Category::where('status_category', 0)->where('parent_id', '>', 0)
            ->get();
        View::share('categoryProductControllerChild', $categoryProductControllerChild);




        // product
        $count_product = Product::count();
        View::share('count_product', $count_product);
        $logo_web = asset('frontend/images/logo/logo.png');
        $URL_IMG_PRODUCT = 'image/product';
        $URL_IMG_GALLERY = 'image/gallery';
        $URL_IMG_BANNER = 'image/banner';
        $URL_IMG_USERS = 'image/users';
        View::share([
            'logo_web' => $logo_web,
            'URL_IMG_PRODUCT' => $URL_IMG_PRODUCT,
            'URL_IMG_GALLERY' => $URL_IMG_GALLERY,
            'URL_IMG_BANNER' => $URL_IMG_BANNER,
            'URL_IMG_USERS' => $URL_IMG_USERS,
        ]);
    }
}