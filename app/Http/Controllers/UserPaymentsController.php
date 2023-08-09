<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserPaymentsController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu'] = 'payments';

    }


    public function index($id)
    {

        
        $this->data['user'] = User::findOrfail($id);

        return view('users.payments.payments' , $this->data);

    }

    public function store(PaymentRequest $request, $user_id) 
    {
        $fromdata = $request->all();
        $fromdata['user_id'] = $user_id;

        if(Payment::create($fromdata)){
            Session::flash('message','Payment Added Successfully');
        }
        return redirect()->route('user.payments', ['id'=>$user_id]);
    }

    public function destroy($user_id, $payment_id){

        if(Payment::destroy($payment_id)){
            Session::flash('message','Payment Deleted Successfully');
        }
        return redirect()->route('user.payments', ['id'=>$user_id]);
    }
}
