@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('inc.sidemenu')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Customers</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Midldlename</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                  @if($user->roles->first()->name === 'HR staff')
                                  <tr>
                                  <th scope="row">{{ $user->id }}</th>
                                  <td>{{ $user->firstname }}</td>
                                  <td>{{ $user->lastname }}</td>
                                  <td>{{ $user->middlename }}</td>
                                  <td>{{ $user->roles->first()->name }}</td>
                                  <td><a role="button" href="{{url('/fw/users/edit/'.$user->id) }}" class="btn btn-primary">Edit</a> <a role="button" class="btn btn-danger">Delete</a></td>
                                </tr>
                                  @endif
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
