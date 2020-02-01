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
                    <form class="form-group row" action="" method="post">
                        @csrf
                        <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" required autocomplete="name" name="name" autofocus>
                        @foreach ($permissions as $permission)
                        <label for="role">{{ $permission->name }}</label>
                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
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
