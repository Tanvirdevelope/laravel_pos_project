@extends('users.user_layout')

@section('user_content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">Sales Invoice Details</h2>
</div>
     <div class="card-body">

        <div class="row clearfix justify-content-md-center">
            <div class="col-md-6">
               <h5><strong>Customer:</strong> {{ $user->name }}</h5> 
               <h5><strong>Eamil:</strong> {{ $user->email }}</h5> 
               <h5><strong>Phone: </strong>{{ $user->phone }}</h5> 
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <h5><strong>Date: </strong>{{ $invoice->date }}</h5>
                <h5><strong>Challan No: </strong>{{ $invoice->challan_no }}</h5>
            </div>
        </div>
        <div class="invoice_items">
            <table class="table table-borderless table-striped">
                <thead>
                    <th>SL</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th class="text-right">-</th>
                </thead>
                <tbody>
                    @foreach ($invoice->items as $key=> $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->product->title }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->total }}</td>
                        <td class="text-right">
                            <form method="POST" action="{{ route('user.sales.invoices.delete_item', ['id' => $user->id , 'invoice_id' => $invoice->id , 'item_id' => $item->id]) }}">

                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm ('Are you Sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th></th>
                    <th>
                        <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#newProduct">
                            <i class="fa fa-plus"></i>Add Product
                        </button>
                    </th>
                    <th colspan="2" class="text-right">Total:</th>
                    <th>{{ $invoice->items()->sum('total') }}</th>
                    <th></th>
                </tfoot>
            </table>        
    </div>
</div>

 <!-- Modal for add new Product -->
 <div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
  
         
    {!! Form::open(['route' => ['user.sales.invoices.add_item', ['id'=>$user->id, 'invoice_id'=>$invoice->id]] , 'method' => 'post']) !!}
  
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newProductModalLabel">New Product Invoice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label text-right">Product : <span class="text-danger">*</span></label>
                <div class="col-sm-10">            
                {{ Form::select('product_id', $products, NULL, ['class'=>'form-control', 'id' => 'product' , 'placeholder' => 'Select Product','required']) }}
                </div>
              </div>          
         
              <div class="form-group row">
                  <label for="date" class="col-sm-2 col-form-label text-right">Date :<span class="text-danger">*</span></label>
                  <div class="col-sm-10">            
                  {{ Form::date('date', NULL, ['class'=>'form-control', 'id' => 'date' ,'required', 'placeholder' => 'Date','required']) }}
                  </div>
                </div>
  
              <div class="form-group row">
                  <label for="price" class="col-sm-2 col-form-label text-right">Unit Price :<span class="text-danger">*</span></label>
                  <div class="col-sm-10">            
                  {{ Form::text('price', NULL, ['class'=>'form-control', 'id' => 'price' , 'placeholder' => 'Price','required']) }}
                  </div>
                </div>
  
                <div class="form-group row">
                    <label for="quantity" class="col-sm-2 col-form-label text-right">Quantity :<span class="text-danger">*</span></label>
                    <div class="col-sm-10">            
                    {{ Form::text('quantity', NULL, ['class'=>'form-control', 'id' => 'quantity' , 'placeholder' => 'Quantity','required']) }}
                    </div>
                  </div>

                <div class="form-group row">
                    <label for="total" class="col-sm-2 col-form-label text-right">Total :<span class="text-danger">*</span></label>
                    <div class="col-sm-10">            
                    {{ Form::text('total', NULL, ['class'=>'form-control', 'id' => 'total' , 'placeholder' => 'Total','required']) }}
                    </div>
                  </div>
              
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
    
@endsection