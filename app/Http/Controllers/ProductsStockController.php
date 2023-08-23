<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsStockController extends Controller
{
    public function index()
    {
        $this->data['products'] = Product::all();

        return view('products.stocks', $this->data);
    }
}
