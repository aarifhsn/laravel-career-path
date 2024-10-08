@extends('layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-6">Search Results for <span class="italic">"{{ $search }}"</span> </h1>

@if (count($posts) > 0)
    @include('components.posts', ['posts' => $posts]).
@else
    <div class="flex  items-center justify-center p-8 border-2 border-red-900 rounded">
        <p class="text-red-800">No results found for "{{ $search }}"</p>
    </div>
@endif

@endsection