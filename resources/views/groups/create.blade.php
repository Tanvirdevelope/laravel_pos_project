@extends('layout.main')

@section('main_content')
    <h2>Create New Group</h2>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Group</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('groups') }}">
                @csrf
                <div class="form-group">
                  <label for="title">User Group Title</label>
                  <input type="title" name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="User Group Title">
                  <small id="emailHelp" class="form-text text-muted">Title of User Groups.</small>
                </div>
             
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
@endsection