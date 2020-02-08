@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('inc.sidemenu')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Permissions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>Create role</div>       
                    <form class="form-group row" action="{{ 'RoleController@updateRole' }}" method="post">
                        @csrf
                    <input class="form-control @error('name') is-invalid @enderror" value="{{$role->name}}" type="text" required autocomplete="name" name="name" autofocus>
                        @foreach ($permissions as $permission)
                        <div class="form-check form-check-inline">
                            @if($role->permissions->where('id', $permission->id)->count() > 0)
                            <label class="form-check-label" for="inlineCheckbox1">{{ $permission->name }}</label>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{ $permission->id }}" name="permissions[]" checked="checked">
                            @else
                            <label class="form-check-label" for="inlineCheckbox2">{{ $permission->name }}</label>
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="{{ $permission->id }}" name="permissions[]">
                            @endif
                        </div>
                        @endforeach
                        @if (session('permissions'))
                        <div class="alert alert-success" role="alert">
                            {{ session('permissions') }}
                        </div>
                    @endif
                        <input class=" form-control btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
