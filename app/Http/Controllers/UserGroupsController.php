<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserGroupsController extends Controller
{
    public function index()
    {
        $this->data['groups'] = Group::all();
        return view('groups.groups', $this->data);
    }

    public function create(){
        return view('groups.create');
    }

    public function store(Request $request){
        $fromdata = $request->all();
        if(Group::create($fromdata)){
            Session::flash('message','Group Created Successfully');
        }
        return redirect()->to('groups');
    }

    public function distroy($id){

        if(Group::find($id)->delete()){
            Session::flash('message','Group Deleted Successfully');
        }
        return redirect()->to('groups');
    }
}
