<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceProductRequest;
use App\Models\SaleInvoice;
use App\Models\User;
use App\Models\Product;
use App\Models\SaleItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserSalesController extends Controller
{

    public function __construct()
    {
        $this->data['tab_menu'] = 'sales';

    }


    public function index($id)
    {

        
        $this->data['user'] = User::findOrfail($id);

        return view('users.sales.sales' , $this->data);

    }

    public function destroy($user_id, $invoice_id)
    {
        if(SaleInvoice::destroy($invoice_id)){
            Session::flash('message','Invoice Deleted Successfully');
        }
        return redirect()->route('user.sales', ['id'=>$user_id]);
    }

    public function createInvoice(InvoiceRequest $request, $user_id)
    {
        $fromdata = $request->all();
        $fromdata['user_id'] = $user_id;
        $fromdata['admin_id'] = Auth::id();

        $invoice = SaleInvoice::create($fromdata);

        return redirect()->route('user.sales.invoice_details', ['id'=>$user_id , 'invoice_id' => $invoice->id]);

    }

    public function invoice($user_id, $invoice_id)
    {
        $this->data['user'] = User::findOrFail($user_id);
        $this->data['invoice'] = SaleInvoice::findOrFail($invoice_id);
        $this->data['products'] = Product::arrayForSelect();

        return view('users.sales.invoice' , $this->data);
    }

    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id)
    {
        $fromdata = $request->all();
        $fromdata['sale_invoice_id'] = $invoice_id;

        if(SaleItem::create($fromdata)){
            Session::flash('message','Item Added Successfully');
        }
        return redirect()->route('user.sales.invoice_details', ['id'=>$user_id , 'invoice_id' => $invoice_id]);
    }

    public function destroy_item($user_id, $invoice_id, $item_id)
    {
        if(SaleItem::destroy($item_id) ){
            Session::flash('message','User Deleted Successfully');
        }
        return redirect()->route('user.sales.invoice_details', ['id'=>$user_id , 'invoice_id' => $invoice_id]);
    }

}
