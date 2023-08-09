@extends('layout.main')

@section('main_content')
      <div class="row clearfix page_header">
        <div class="col-md-6">
            <a href="{{ route('products.index') }}" class="btn btn-primary"> <-Back</a>
        </div>
        
    </div>
<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">{{ $product->title }}</h2>
    </div>
         <div class="card-body">

            <div class="row clearfix justify-content-md-center">
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tr>
                         <th class="text-right">Category : </th>
                         <th>{{ $product->category->title }}</th>
                        </tr>
                        <tr>
                         <th class="text-right">Title : </th>
                         <th>{{ $product->title }}</th>
                        </tr>
                        <tr>
                         <th class="text-right">Description : </th>
                         <th>{{ $product->description }}</th>
                        </tr>
                        <tr>
                         <th class="text-right">Cost Price : </th>
                         <th>{{ $product->cost_price }}</th>
                        </tr>
                        <tr>
                         <th class="text-right">Sale Price : </th>
                         <th>{{ $product->price }}</th>
                        </tr>
                     </table> 
                </div>
            </div>
            
        </div>
    </div>
    
@endsection