@extends('layout.main')

@section('main_content')
      <div class="row clearfix page_header">
        <div class="col-md-6">
            <h2>Categories</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('categories.create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Category</a>
        </div>
    </div>
<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">

                   

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                           
                            <th class="text-right">Action</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                         
                            <th class="text-right">Action</th>
                            
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                            
                        
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                          
                            <td class="text-right">
                                
                                <form method="POST" action="{{ route('categories.destroy', ['category' => $category->id]) }}">


                                    <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', ['category'=>$category->id]) }}"><i class="fa fa-edit"></i></a>

                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm ('Are you Sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                
                                </form>
                            </td>   
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection