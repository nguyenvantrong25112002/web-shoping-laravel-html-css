<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderBillController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\DecentralizeController;
use App\Http\Controllers\Backend\AttributeValueController;
use App\Http\Controllers\Frontend\Payment\PayPalController;
use App\Http\Controllers\Frontend\Socialite\LoginGoogleController;

//front-end
Route::prefix('/')->group(function () {
    Route::get('/', [FrontendController::class, 'homePage'])->name('web.home');
    Route::get('/product-detail/{slug_product}.html', [FrontendController::class, 'productDetail'])->name('web.product.detail');
    Route::get('/search-ajax', [FrontendController::class, 'search_ajax'])->name('web.search_ajax');
    Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('web.contactus');
    Route::get('/product-listing/{id_category}', [FrontendController::class, 'productCate'])->name('web.product.listing');



    Route::prefix('customer')->group(function () {
        Route::post('register_customer', [CustomerController::class, 'store'])->name('web.saveadd.customer');
        Route::get('update-status', [CustomerController::class, 'updateStatus'])->name('web.customer.updateStatus');
        Route::post('login-customer', [CustomerController::class, 'loginCustomer'])->name('web.loginCustomer.customer');
        Route::get('logout-customer', [CustomerController::class, 'logoutCustomer'])->name('web.logoutCustomer.customer');
        Route::get('form-sign-in-customer', [CustomerController::class, 'form_sign_in'])->name('web.form_sign_in.customer');
        Route::get('form-sign-up-customer', [CustomerController::class, 'form_sign_up'])->name('web.form_sign_up.customer');


        //login gg
        Route::get('/login-google', [LoginGoogleController::class, 'login_google'])->name('web.customer.login_google');
        Route::get('/google/callback', [LoginGoogleController::class, 'callback_google'])->name('web.customer.callback_google');
    });
    Route::prefix('cart')->group(function () {
        Route::post('add', [CartController::class, 'add_cart'])->name('web.cart_product.add');
        Route::get('list-cart-home', [CartController::class, 'list_cart_home'])->name('web.cart_product.list_cart_home');
        Route::get('cart', [CartController::class, 'cart'])->name('web.cart_product.cart');
        Route::get('list-cart', [CartController::class, 'list_cart'])->name('web.cart_product.list_cart');
        Route::post('remove-cart', [CartController::class, 'remove_cart'])->name('web.cart_product.remove_cart');
        Route::post('update-cart', [CartController::class, 'update_cart'])->name('web.cart_product.update_cart');
        Route::post('update-cart-size', [CartController::class, 'update_cart_size'])->name('web.cart_product.update_cart_size');
        Route::get('remove-cart_all', [CartController::class, 'remove_cart_all'])->name('web.cart_product.remove_cart_all');
    });
    Route::middleware(['checkLoginCustomer'])->group(function () {
        Route::prefix('checkout')->group(function () {
            Route::get('checkout-cart', [CheckoutController::class, 'checkout_cart'])->name('web.cart_product.checkout_cart');
            Route::post('checkout-add', [CheckoutController::class, 'add_bill_order'])->name('web.cart_product.add_bill_order');
            Route::get('checkout/bill/token', [CheckoutController::class, 'check_token'])->name('web.cart_product.check_token');
            Route::get('list-bill', [CheckoutController::class, 'list_bill'])->name('web.cart_product.list_bill');
        });
        Route::prefix('address')->group(function () {
            Route::post('get_district', [AddressController::class, 'get_district'])->name('web.address.get_district');
            Route::post('add', [AddressController::class, 'addAddresCustomer'])->name('web.address.add_bill');
            Route::post('add-modal', [AddressController::class, 'addAddresCustomerModal'])->name('web.address.add_bill_modal');
            Route::get('list-addres-customer', [AddressController::class, 'getAddresCustomer'])->name('web.address.list_bill');
            Route::get('default-addres-customer', [AddressController::class, 'getAddresCustomerDefault'])->name('web.address.default_bill');
            Route::post('set-default-addres-customer', [AddressController::class, 'setAddresCustomerDefault'])->name('web.address.setdefault_bill');
            Route::get('remove', [AddressController::class, 'destroy'])->name('web.address.destroy');
        });
        // Route::prefix('paypal')->group(function () {

        //     Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
        //     Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
        //     Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
        //     Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
        // });
    });
});


// Auth::guard('admin')->user();
//back-end
Route::prefix('admin')->group(function () {


    Route::get('/', [AdminController::class, 'index'])->name('admin.auth.login');
    Route::post('/login', [AdminController::class, 'loginAdmin'])->name('admin.auth.loginCheck');


    // 'role:admin|editer|writer|publisher'
    // Route::middleware('CheckLoginAdmin')->group(function () {
    Route::group(['middleware' => ['CheckLoginAdmin', 'impersonate']], function () {

        Route::get('/register', [AdminController::class, 'registerAdmin'])->name('admin.auth.register');
        Route::post('/register-save', [AdminController::class, 'create'])->name('admin.auth.registerSave');
        Route::get('/logout', [AdminController::class, 'logoutAdmin'])->name('admin.auth.logoutAdmin');
        Route::get('impersonate-role/{id_admin}/admin', [AdminController::class, 'impersonate_role'])->name('admin.auth.impersonate_role');

        Route::prefix('dashboard')->group(function () {
            Route::get('', [DashboardController::class, 'index'])->name('admin.dashboard');
        });
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.list');
            Route::get('/add', [CategoryController::class, 'create'])->name('admin.category.addForm');
            Route::post('/add-save', [CategoryController::class, 'store'])->name('admin.category.addSave');
            Route::get('/edit-form/{id_category}', [CategoryController::class, 'edit'])->name('admin.category.editForm');
            Route::post('/edit-save/{id_category}', [CategoryController::class, 'update'])->name('admin.category.editSave');
            Route::get('/delete/{id_category}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
            Route::get('/delete-all', [CategoryController::class, 'destroyAll'])->name('admin.category.deleteall');
        });

        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.product.list');
            Route::get('/add', [ProductController::class, 'create'])->name('admin.product.addForm');
            Route::post('/add-save', [ProductController::class, 'store'])->name('admin.product.addSave');
            // Route::get('/delete/{id_product}', [ProductController::class, 'destroy'])->name('admin.product.delete');
            Route::get('/delete', [ProductController::class, 'destroy'])->name('admin.product.delete');
            Route::get('/edit-form/{id_product}', [ProductController::class, 'edit'])->name('admin.product.editForm');
            Route::post('/edit-save/{id_product}', [ProductController::class, 'update'])->name('admin.product.editSave');

            // ajax
            Route::get('/update-status', [ProductController::class, 'updateStatusAjax'])->name('admin.product.updateStatusAjax');
            Route::POST('/add-product-attributes', [ProductController::class, 'add_productAttributes'])->name('admin.product.add_productAttributes');
            Route::post('/product-attributes', [ProductController::class, 'productAttributes'])->name('admin.product.productAttributes');
            Route::get('/edit-product-attributes', [ProductController::class, 'edit_productAttributes'])->name('admin.product.edit_productAttributes');
        });

        Route::prefix('gallery')->group(function () {
            Route::post('/delete-gallery', [GalleryController::class, 'destroy'])->name('admin.gallery.delete');
        });

        Route::prefix('banner')->group(function () {
            Route::get('/', [BannerController::class, 'index'])->name('admin.banner.list');
            Route::get('/add', [BannerController::class, 'create'])->name('admin.banner.addForm');
            Route::post('/add-save', [BannerController::class, 'store'])->name('admin.banner.addSave');
            Route::get('/edit-form/{id_banner}', [BannerController::class, 'edit'])->name('admin.banner.editForm');
            Route::post('/edit-save/{id_banner}', [BannerController::class, 'update'])->name('admin.banner.editSave');
            Route::get('/delete/{id_banner}', [BannerController::class, 'destroy'])->name('admin.banner.delete');
        });


        Route::prefix('product_attribute')->group(function () {
            Route::get('/', [AttributeController::class, 'index'])->name('admin.attribute.list');
            Route::get('/add', [AttributeController::class, 'create'])->name('admin.attribute.addForm');
            Route::post('/add-save', [AttributeController::class, 'store'])->name('admin.attribute.addSave');
            Route::get('/edit-form', [AttributeController::class, 'edit'])->name('admin.attribute.editForm');
            Route::post('/edit-save', [AttributeController::class, 'update'])->name('admin.attribute.editSave');
            Route::get('/delete', [AttributeController::class, 'destroy'])->name('admin.attribute.delete');
        });
        Route::prefix('attribute_value')->group(function () {
            Route::get('/', [AttributeValueController::class, 'index'])->name('admin.attribute_value.list');
            Route::get('/add', [AttributeValueController::class, 'create'])->name('admin.attribute_value.addForm');
            Route::post('/add-save', [AttributeValueController::class, 'store'])->name('admin.attribute_value.addSave');
            Route::get('/edit-form', [AttributeValueController::class, 'edit'])->name('admin.attribute_value.editForm');
            Route::post('/edit-save', [AttributeValueController::class, 'update'])->name('admin.attribute_value.editSave');
            Route::get('/delete', [AttributeValueController::class, 'destroy'])->name('admin.attribute_value.delete');
        });
        Route::prefix('order/bill')->group(function () {
            Route::get('list', [OrderBillController::class, 'index'])
                ->name('admin.order_bill.list');
            Route::get('view-detail', [OrderBillController::class, 'view_detail_bill'])
                ->name('admin.order_bill.view_detail_bill');
            Route::post('update-status-bill', [OrderBillController::class, 'update_status_bill'])
                ->name('admin.order_bill.update_status_bill');
            Route::get('delete-bill', [OrderBillController::class, 'destroy'])
                ->name('admin.order_bill.destroy');
        });


        Route::prefix('manager')->name('admin.admin.')->group(function () {
            Route::get('add/', [AdminController::class, 'formAdd'])->name('formAdd');
            Route::get('list/', [AdminController::class, 'list_admin'])->name('list');
            Route::post('/add-save', [AdminController::class, 'store'])->name('addSave');
            Route::get('decentralize/{id_admin}', [AdminController::class, 'decentralize'])->name('decentralize');
            Route::post('get-permission', [AdminController::class, 'get_permission'])->name('get_permission');
            Route::post('get-role', [AdminController::class, 'get_role'])->name('get_role');
            // impersonate
        });
        Route::prefix('roles')->group(function () {
            Route::get('index', [DecentralizeController::class, 'index'])->name('admin.roles.index');
            Route::post('admin-permission-add', [DecentralizeController::class, 'adminPermissionAdd'])->name('admin.permission.add');
            Route::post('admin-role-add', [DecentralizeController::class, 'adminRoleAdd'])->name('admin.role.add');
        });
        Route::prefix('user')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('admin.user.list');
        });
    });
});