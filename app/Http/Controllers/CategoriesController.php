<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['categories'] = Category::all();

        return view('category.categories', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $this->data['headline'] = 'Add New Categories';
        $this->data['mode'] = 'create';
        return view('category.form' , $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $formdata =  $request->all();
        if(Category::create($formdata)){
            Session::flash('message','Category Add Successfully');
        }
        return redirect()->to('categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['category']     = Category::findOrFail($id);
        $this->data['mode']   = 'edit';
        $this->data['headline']   = 'Update Category';

        return view('category.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data           = $request->all();

        $category           = Category::find($id);
        $category->title = $data['title'];
               

        if($category->save()){
            Session::flash('message','Category Updated Successfully');
        }
        return redirect()->to('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Category::find($id)->delete()){
            Session::flash('message','Category Deleted Successfully');
        }
        return redirect()->to('categories');
    }
}
