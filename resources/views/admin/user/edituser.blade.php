@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('inc.sidemenu')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>Edit user with id:{{$user->id}}</div>
                    <form action="{{ url('/fw/users/edit/'.$user->id) }}" method="post">
                        @csrf
                    <input type="text" name="firstname" value="{{ $user->firstname }}">
                    <input type="text" name="lastname" value="{{ $user->lastname }}">
                    <input type="text" name="middlename" value="{{ $user->middlename }}">
                    @foreach ($roles as $role)
                    <div class="form-check form-check-inline">
                        @if($user->roles->where('id', $role->id)->count() > 0)
                        <label class="form-check-label" for="inlineCheckbox1">{{ $role->name }}</label>
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{ $role->id }}" name="roles[]" checked="checked">
                        @else
                        <label class="form-check-label" for="inlineCheckbox2">{{ $role->name }}</label>
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="{{ $role->id }}" name="roles[]">
                        @endif
                    </div>
                    @endforeach
                    <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
