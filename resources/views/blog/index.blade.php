@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
  <div class="py-15 border-b border-gray-300">
    <h1 class="text-6xl">
      Blog Posts
    </h1>
  </div>
</div>

@if (session()->has('message'))
<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
  <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
  </svg>
  <span class="sr-only">Info</span>
  <div>
    <span class="font-medium">Success!</span> {{ session()->get('message') }}.
  </div>
</div>
@endif

@if (Auth::check())
<div class="flex justify-center mt-8">
  <a href="/blog/create" class="uppercase bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
    create post
  </a>
</div>

@endif

@foreach ($posts as $post)

<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
  <div>
    <img src="{{ asset('images/' . $post->image_path) }}" alt="">
  </div>
  <div>
    <h2 class="text-gray-700 font-bold text-5xl pb-4">
      {{ $post->title }}
    </h2>

    <span class="text-gray-500">
      By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date("jS M Y", strtotime($post->created_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
      {{ $post->description }}
    </p>

    <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
      Keep Reading
    </a>

    @if (isset(Auth::user()->id) && Auth::user()->id == $post->user->id)

    <span class="float-right">
      <a href="/blog/{{ $post->slug }}/edit" class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
        Edit
      </a>
    </span>

    <span class="float-right">
      <form action="/blog/{{ $post->slug }}" method="POST">
        @csrf
        @method('delete')

        <button class="text-red-500 pr-3" type="submit">
          Delete
        </button>

      </form>
    </span>

    @endif

  </div>
</div>
@endforeach
@endsection