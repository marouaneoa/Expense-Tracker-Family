@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800 text-center">{{'Welcome ' . auth()->user()->name}}


</div>
@endsection