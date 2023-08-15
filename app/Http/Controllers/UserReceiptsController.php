<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReceiptRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Receipt;
use Illuminate\Support\Facades\Session;

class UserReceiptsController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu'] = 'receipts';

    }


    public function index($id)
    {

        
        $this->data['user'] = User::findOrfail($id);

        return view('users.receipts.receipts' , $this->data);

    }

    public function store(ReceiptRequest $request, $user_id, $invoice_id = null) 
    {
        $fromdata = $request->all();
        $fromdata['user_id'] = $user_id;
        $fromdata['admin_id'] = Auth::id();
        if($invoice_id) {
            $fromdata['sale_invoice_id'] = $invoice_id;
        }

        if(Receipt::create($fromdata)){
            Session::flash('message','Receipt Added Successfully');
        }
        if ($invoice_id) {
            return redirect()->route('user.sales.invoice_details', ['id'=>$user_id , 'invoice_id' => $invoice_id]);
        } else {
            return redirect()->route('user.receipts', ['id'=>$user_id]);
        }
        
        
    }

    public function destroy($user_id, $receipt_id){

        if(Receipt::destroy($receipt_id)){
            Session::flash('message','Receipt Deleted Successfully');
        }
        return redirect()->route('user.receipts', ['id'=>$user_id]);
    }
}
