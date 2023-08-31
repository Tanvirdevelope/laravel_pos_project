<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{
    public Function __construct()
    {
        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu'] = 'Purchases';
    }

    public function index(Request $request)
    {
        $this->data['start_date'] = $request->get('start_date', date('Y-m-d'));
        $this->data['end_date'] = $request->get('end_date', date('Y-m-d'));

        $this->data['purchases'] = PurchaseItem::select(  'purchase_items.quantity', 'purchase_items.price', 'purchase_items.total', 'products.title', 'purchase_invoices.challan_no', 'purchase_invoices.date' )
        ->join('products', 'purchase_items.product_id', '=', 'products.id')
        ->join('purchase_invoices', 'purchase_items.purchase_invoice_id', '=', 'purchase_invoices.id')
        ->whereBetween('purchase_invoices.date', [$this->data['start_date'], $this->data['end_date']])
        ->get();

        return view('reports/purchases', $this->data);
    }
}
