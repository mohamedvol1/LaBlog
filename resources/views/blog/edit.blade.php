@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
  <div class="py-15 border-b border-gray-200">
    <h1 class="text-6xl">
      Create a post
    </h1>

    <div class="w-4/5 m-auto pt-20">
      <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $post->title }}" class="bg-transparent block border-b-2 w-full h-15 text-3xl outline-none">

        <textarea name="description" placeholder="Description ..." class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">{{ $post->description }}</textarea>

        <button type="submit" class="uppercase mt-15 bg-blue-500  hover:bg-blue-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
          Edit Post
        </button>
      </form>
    </div>
  </div>



  @endsection