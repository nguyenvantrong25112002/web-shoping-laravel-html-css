<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $countCustomer = count(Customer::all());
        $countAdmin = count(Admin::all());
        $countProduct = count(Product::all());
        $countBill = count(Bill::all());
        return view('backend.page.dashboard', compact(
            'countCustomer',
            'countAdmin',
            'countProduct',
            'countBill',
        ));
    }
}