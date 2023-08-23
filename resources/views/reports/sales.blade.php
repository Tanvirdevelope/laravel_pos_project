@extends('layout.main')

@section('main_content')
      <div class="row clearfix page_header">
        <div class="col-md-6">
            <h2>Products</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('products.create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Product</a>
        </div>
    </div>
<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">

                   

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Cost Price</th>
                            <th>Sale Price</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Cost Price</th>
                            <th>Sale Price</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                            
                        
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->cost_price }}</td>
                            <td>{{ $product->price }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection