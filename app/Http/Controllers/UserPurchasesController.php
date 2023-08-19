<?php

namespace App\Http\Controllers;

use App\Models\PurchaseInvoice;
use Illuminate\Http\Request;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceProductRequest;
use App\Models\User;
use App\Models\Product;
use App\Models\PurchaseItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserPurchasesController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu'] = 'purchases';

    }


    public function index($id)
    {

        
        $this->data['user'] = User::findOrfail($id);

        return view('users.purchases.purchases' , $this->data);

    }

    public function destroy($user_id, $invoice_id)
    {
        if(PurchaseInvoice::destroy($invoice_id)){
            Session::flash('message','Purchase Deleted Successfully');
        }
        return redirect()->route('user.purchases', ['id'=>$user_id]);
    }

    public function createInvoice(InvoiceRequest $request, $user_id)
    {
        $fromdata = $request->all();
        $fromdata['user_id'] = $user_id;
        $fromdata['admin_id'] = Auth::id();

        $invoice = PurchaseInvoice::create($fromdata);

        return redirect()->route('user.purchases.invoice_details', ['id'=>$user_id , 'invoice_id' => $invoice->id]);

    }

    public function invoice($user_id, $invoice_id)
    {
        $this->data['user'] = User::findOrFail($user_id);
        $this->data['invoice'] = PurchaseInvoice::findOrFail($invoice_id);
        $this->data['products'] = Product::arrayForSelect();

        return view('users.purchases.invoice' , $this->data);
    }

    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id)
    {
        $fromdata = $request->all();
        $fromdata['purchase_invoice_id'] = $invoice_id;

        if(PurchaseItem::create($fromdata)){
            Session::flash('message','Item Added Successfully');
        }
        return redirect()->route('user.purchases.invoice_details', ['id'=>$user_id , 'invoice_id' => $invoice_id]);
    }

    public function destroy_item($user_id, $invoice_id, $item_id)
    {
        if(PurchaseItem::destroy($item_id) ){
            Session::flash('message','Purchase Item Deleted Successfully');
        }
        return redirect()->route('user.purchases.invoice_details', ['id'=>$user_id , 'invoice_id' => $invoice_id]);
    }
}
