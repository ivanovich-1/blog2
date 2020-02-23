@extends('admin.layouts.layouts')

@section('content')
    <div class="card card-primary card-outline col-md-6 m-auto">
        <div class="card-header with-border">
            <h1 class="text-center">{{ $role->name }}</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-body with-border">
                    <h5>Guard:</h5>
                    <li>{{ $role->guard_name }}</li>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body with-border">
                    <div class="col-md-4">
                        <h5>Permisos:</h5>
                    </div>
                    <div class="col-md-6">
                        @foreach($role->permissions->pluck('name') as $permission)
                            <li>{{ $permission }}</li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-block">Regresar</a>
        </div>
    </div>
@endsection
