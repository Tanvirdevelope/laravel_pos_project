<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
