@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success text-green-800 font-bold">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{route('post.update', ['username' => $post->user->username, 'id' => $post->id]) }}">
    @csrf
    @method('PUT')
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <label for="bio" class="block text-sm font-medium leading-6 text-gray-900">Update Post
                        Content</label>
                    <div class="mt-2">
                        <textarea id="content" name="content" rows="3"
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">{{old('bio', $post->content)}}</textarea>
                    </div>
                    @error('content')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="{{ route('profile', $user->username) }}" type="button"
            class="text-sm font-semibold leading-6 text-gray-900">
            Cancel
        </a>
        <button type="submit"
            class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
            Save
        </button>
    </div>
</form>

@endsection