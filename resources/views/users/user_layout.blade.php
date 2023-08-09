@extends('layout.main')

@section('main_content')
      <div class="row clearfix page_header">
        <div class="col-md-3">
            <a href="{{ route('users.index') }}" class="btn btn-info back_btn"> <-Back</a>
        </div>
        <div class="col-md-9 text-right">
            <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Sale</a>
            <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Purchase</a>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment"><i class="fa fa-plus"></i>
                New Payment
            </button>
            <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Receipt</a>
        </div>
    </div>

    <div class="row clearfix mt-5">
        <div class="col-md-2">
            <div class="nav flex-column nav-pills">
                <a class="nav-link @if($tab_menu == 'user_info') active @endif"  href="{{ route('users.show', $user->id) }}">User Info</a>
                <a class="nav-link @if($tab_menu == 'sales') active @endif"  href="{{ route('user.sales', $user->id) }}">Sales</a>
                <a class="nav-link @if($tab_menu == 'purchases') active @endif" href="{{ route('user.purchases', $user->id) }}">Purchases</a>
                <a class="nav-link @if($tab_menu == 'payments') active @endif" href="{{ route('user.payments', $user->id) }}">Payment</a>
                <a class="nav-link @if($tab_menu == 'receipts') active @endif" href="{{ route('user.receipts', $user->id) }}">Receipt</a>
              </div>
        </div>
  <div class="col-md-10">
          
    @yield('user_content')            
    
</div>   
<!-- DataTales Example -->
    
@endsection