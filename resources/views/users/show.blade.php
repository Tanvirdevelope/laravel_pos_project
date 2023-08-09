@extends('users.user_layout')

@section('user_content')

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