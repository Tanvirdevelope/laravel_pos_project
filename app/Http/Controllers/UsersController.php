<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['users'] = User::all();
        return view('users/users', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $this->data['groups'] = Group::arrayForSelect();
       
        return view('users.form' , $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $formdata =  $request->all();
        if(User::create($formdata)){
            Session::flash('message','User Created Successfully');
        }
        return redirect()->to('users');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['user'] = User::find($id);
        $this->data['tab_menu'] = 'user_info';

        return view('users.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $this->data['user']     = User::findOrFail($id);
        $this->data['groups']   = Group::arrayForSelect();

        return view('users.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $data           = $request->all();

        $user           = User::find($id);
        $user->group_id = $data['group_id'];
        $user->name     = $data['name'];
        $user->email    = $data['email'];
        $user->phone    = $data['phone'];
        $user->address  = $data['address'];
        

        if($user->save()){
            Session::flash('message','User Updated Successfully');
        }
        return redirect()->to('users');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(User::find($id)->delete()){
            Session::flash('message','User Deleted Successfully');
        }
        return redirect()->to('users');
    }
}
