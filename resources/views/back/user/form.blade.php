@extends('back.layouts.base')

@section('title') User @stop

@section('style')
@stop

@section('body')
<div class="page">
    {{ Form::open(['route' => $route == 'admin.users.store' ? $route : [$route, $user->id], 'method' => $route == 'admin.users.store' ? 'POST' : 'PUT', 'files' => 'true']) }}
        <div class="page-header">
            <h1 class="page-title">{{ $route == 'admin.users.store' ? 'Create User' : 'Edit User' }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">User</a></li>
                <li class="breadcrumb-item active">{{ $route == 'admin.users.store' ? 'Create' : 'Edit' }}</li>
            </ol>
            <div class="page-header-actions">
                <a href="{{ route('admin.users.index') }}" class="btn btn-md btn-secondary btn-round">
                    <i class="icon wb-chevron-left" aria-hidden="true"></i>
                    <span class="text hidden-sm-down">Back</span>
                </a>
                @if ($route == 'admin.users.store')
                    <button type="submit" class="btn btn-md btn-success btn-round">
                        <i class="icon wb-check" aria-hidden="true"></i>
                        <span class="text hidden-sm-down">Save</span>
                    </button>
                @else
                    <button type="submit" class="btn btn-md btn-warning btn-round">
                        <i class="icon wb-pencil" aria-hidden="true"></i>
                        <span class="text hidden-sm-down">Save</span>
                    </button>
                @endif
            </div>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-xs-12 col-12">
                    <div class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions"></div>
                            <h3 class="panel-title"></h3>
                        </header>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
                                    {{ Form::text('name', $user->name, ['autocomplete' => 'off', 'class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('email', 'Email', ['class' => 'form-control-label']) }}
                                    {{ Form::email('email', $user->email, ['autocomplete' => 'off', 'class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password', 'Password', ['class' => 'form-control-label']) }}
                                    {{ Form::password('password', ['autocomplete' => 'off', 'class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password_confirmation', 'Password Confirmation', ['class' => 'form-control-label']) }}
                                    {{ Form::password('password_confirmation', ['autocomplete' => 'off', 'class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{ Form::close() }}
</div>
@stop

@section('script')
@if($errors->any())
    <script>
        toastr["error"]("@foreach($errors->all() as $x) {{ $x }} <br> @endforeach", "Error");
    </script>
@endif
@if(session('message'))
    <script>
        toastr["success"]("{{ session('message') }}", "Success");
    </script>
@endif
@stop
