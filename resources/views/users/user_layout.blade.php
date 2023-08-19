@extends('layout.main')



@section('main_content')




      <div class="row clearfix page_header">
        <div class="col-md-3">
            <a href="{{ route('users.index') }}" class="btn btn-info back_btn"> <-Back</a>
        </div>
        <div class="col-md-9 text-right">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSale"><i class="fa fa-plus"></i>
              New Sale
          </button>
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment"><i class="fa fa-plus"></i>
            New Payment
        </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase"><i class="fa fa-plus"></i>
              New Purchase
          </button>
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt"><i class="fa fa-plus"></i>
                New Receipt
            </button>
           
           
        
        </div>
    </div>

    @yield('user_card')

    @include('users.user_layout_content')
    

    <!-- Modal for add new payment -->
<div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    
         
    {!! Form::open(['route' => ['user.payments.store', $user->id] , 'method' => 'post']) !!}
    
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPaymentModalLabel">New Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
    
          
         
              <div class="form-group row">
                  <label for="date" class="col-sm-2 col-form-label">Date :<span class="text-danger">*</span></label>
                  <div class="col-sm-10">            
                  {{ Form::date('date', NULL, ['class'=>'form-control', 'id' => 'date' ,'required', 'placeholder' => 'Date']) }}
                  </div>
                </div>
    
              <div class="form-group row">
                  <label for="amount" class="col-sm-2 col-form-label">Amount :<span class="text-danger">*</span></label>
                  <div class="col-sm-10">            
                  {{ Form::text('amount', NULL, ['class'=>'form-control', 'id' => 'amount' , 'required', 'placeholder' => 'Amount']) }}
                  </div>
                </div>
    
              
              <div class="form-group row">
                  <label for="note" class="col-sm-2 col-form-label">Note :</label>
                  <div class="col-sm-10">            
                  {{ Form::textarea('note', NULL, ['class'=>'form-control', 'rows' => '3' ,'id' => 'note' , 'placeholder' => 'Note']) }}
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
    
    <!-- Modal for new receipt -->
    <div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    
         
    {!! Form::open(['route' => ['user.receipts.store', $user->id] , 'method' => 'post']) !!}
    
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newReceiptModalLabel">New Receipt</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
    
          
         
              <div class="form-group row">
                  <label for="date" class="col-sm-2 col-form-label">Date :<span class="text-danger">*</span></label>
                  <div class="col-sm-10">            
                  {{ Form::date('date', NULL, ['class'=>'form-control', 'id' => 'date' ,'required', 'placeholder' => 'Date']) }}
                  </div>
                </div>
    
              <div class="form-group row">
                  <label for="amount" class="col-sm-2 col-form-label">Amount :<span class="text-danger">*</span></label>
                  <div class="col-sm-10">            
                  {{ Form::text('amount', NULL, ['class'=>'form-control', 'id' => 'amount' , 'required', 'placeholder' => 'Amount']) }}
                  </div>
                </div>
    
              
              <div class="form-group row">
                  <label for="note" class="col-sm-2 col-form-label">Note :</label>
                  <div class="col-sm-10">            
                  {{ Form::textarea('note', NULL, ['class'=>'form-control', 'rows' => '3' ,'id' => 'note' , 'placeholder' => 'Note']) }}
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
    
    
    <!-- Modal for new sales -->
    <div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSaleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    
       
    {!! Form::open(['route' => ['user.sales.store', $user->id] , 'method' => 'post']) !!}
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSaleModalLabel">New Sale Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
        
       
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Date :<span class="text-danger">*</span></label>
                <div class="col-sm-10">            
                {{ Form::date('date', NULL, ['class'=>'form-control', 'id' => 'date' ,'required', 'placeholder' => 'Date']) }}
                </div>
              </div>
    
            <div class="form-group row">
                <label for="challan_no" class="col-sm-2 col-form-label">Challan Number :</label>
                <div class="col-sm-10">            
                {{ Form::text('challan_no', NULL, ['class'=>'form-control', 'id' => 'challan_no' , 'placeholder' => 'Challan Number']) }}
                </div>
              </div>
    
            
            <div class="form-group row">
                <label for="note" class="col-sm-2 col-form-label">Note :</label>
                <div class="col-sm-10">            
                {{ Form::textarea('note', NULL, ['class'=>'form-control', 'rows' => '3' ,'id' => 'note' , 'placeholder' => 'Note']) }}
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

    <!-- Modal for new purchase -->
    <div class="modal fade" id="newPurchase" tabindex="-1" role="dialog" aria-labelledby="newPurchaseModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
      
         
      {!! Form::open(['route' => ['user.purchases.store', $user->id] , 'method' => 'post']) !!}
      
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPurchaseModalLabel">New Purchase Invoice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      
          
         
              <div class="form-group row">
                  <label for="date" class="col-sm-2 col-form-label">Date :<span class="text-danger">*</span></label>
                  <div class="col-sm-10">            
                  {{ Form::date('date', NULL, ['class'=>'form-control', 'id' => 'date' ,'required', 'placeholder' => 'Date']) }}
                  </div>
                </div>
      
              <div class="form-group row">
                  <label for="challan_no" class="col-sm-2 col-form-label">Challan Number :</label>
                  <div class="col-sm-10">            
                  {{ Form::text('challan_no', NULL, ['class'=>'form-control', 'id' => 'challan_no' , 'placeholder' => 'Challan Number']) }}
                  </div>
                </div>
      
              
              <div class="form-group row">
                  <label for="note" class="col-sm-2 col-form-label">Note :</label>
                  <div class="col-sm-10">            
                  {{ Form::textarea('note', NULL, ['class'=>'form-control', 'rows' => '3' ,'id' => 'note' , 'placeholder' => 'Note']) }}
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