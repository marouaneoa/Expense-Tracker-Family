@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Create Subuser') }}</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" placeholder="{{ __('Email') }}" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="text" class="form-control" id="password" placeholder="{{ __('Password') }}" name="password" value="{{ old('password') }}" required />
                    </div>
                    <input type="hidden" name="parent_user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>

    <!-- Content Row -->

</div>
@endsection
