<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function showAddProductForm()
    {
        return view('/sellers/add_product');
    }
}
