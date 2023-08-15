@extends('users.user_layout')

@section('user_content')

<div class="row">
     <!-- Earnings (Monthly) Card Example -->
     
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Sales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @php
                                $total = 0;
                                foreach ($user->sales as $sale) {
                                    $total += $sale->items()->sum('total');
                                }
                                echo $total;  
                            @endphp
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Purchase</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @php
                            $total = 0;
                            foreach ($user->purchases as $purchase) {
                                $total += $purchase->items()->sum('total');
                            }
                            echo $total;  
                        @endphp
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Receipt</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->receipts()->sum('amount') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Payment</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->payments()->sum('amount') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">{{ $user->name }}</h2>
</div>
     <div class="card-body">

        <div class="row clearfix justify-content-md-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <tr>
                     <th class="text-right">Group : </th>
                     <th>{{ $user->group->title }}</th>
                    </tr>
                    <tr>
                     <th class="text-right">Name : </th>
                     <th>{{ $user->name }}</th>
                    </tr>
                    <tr>
                     <th class="text-right">Email : </th>
                     <th>{{ $user->email }}</th>
                    </tr>
                    <tr>
                     <th class="text-right">Phone : </th>
                     <th>{{ $user->phone }}</th>
                    </tr>
                    <tr>
                     <th class="text-right">Address : </th>
                     <th>{{ $user->address }}</th>
                    </tr>
                 </table> 
            </div>
        </div>
        
    </div>
</div>
    
@endsection