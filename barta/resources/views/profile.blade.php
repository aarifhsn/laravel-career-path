@extends('layouts.app')

@section('content')

<section
    class="bg-white border-2 p-8 border-gray-800 rounded-xl min-h-[400px] space-y-8 flex items-center flex-col justify-center">

    @if(session('success'))
        <div class="alert alert-success absolute top-28 text-green-700 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Profile Info -->
    <div class="flex gap-4 justify-center flex-col text-center items-center">
        <!-- User Meta -->
        <div>
            <h1 class="font-bold md:text-2xl py-8">{{ Auth::user()->full_name }}</h1>
            <p class="text-gray-700">
                {{ Auth::user()->bio ?? 'Please update your profile to add a bio.' }}
            </p>

        </div>
        <!-- / User Meta -->
    </div>
    <!-- /Profile Info -->

    <!-- Edit Profile Button (Only visible to the profile owner) -->
    <a href="{{route('edit-profile')}}" type="button"
        class="-m-2 flex gap-2 items-center rounded-full px-4 py-2 font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
        </svg>

        Edit Profile
    </a>
    <!-- /Edit Profile Button -->
</section>

@endsection