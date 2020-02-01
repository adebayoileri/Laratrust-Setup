@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('inc.sidemenu')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of roles</div>

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
                            <th scope="col">Role name</th>
                            <th scope="col">Permissions</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id }}</th>
                                  <td>{{ $role->name }}</td>
                                  <td>
                                      @foreach ($role->permission as $permission)
                                          {{ $permission->name }}
                                      @endforeach
                                  </td>
                                  <td><button class="btn btn-primary">Edit</button> <button class="btn btn-danger">Delete</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
