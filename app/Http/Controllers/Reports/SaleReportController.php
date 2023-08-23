<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleReportController extends Controller
{
    public function index()
    {
        $this->data['sales'] = SaleItem::all();

        return view('reports/sales', $this->data);
    }
}
