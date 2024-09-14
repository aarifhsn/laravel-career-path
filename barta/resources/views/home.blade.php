@extends('layouts.app')

@section('content')
<div class="text-center p-12 border border-gray-800 rounded-xl">
    @if(session('success'))
        <div class="alert alert-success py-8 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl justify-center items-center">Welcome to Barta!</h1>
</div>
@endsection