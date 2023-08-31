<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsStockController extends Controller
{
    public Function __construct()
    {
        parent::__construct();
        $this->data['main_menu'] = 'Products';
        $this->data['sub_menu'] = 'stocks';
    }

    public function index()
    {
        $this->data['products'] = Product::all();

        return view('products.stocks', $this->data);
    }
}
