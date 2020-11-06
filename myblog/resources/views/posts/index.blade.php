@extends('layouts.default')

{{-- 
@section('title')
Blog Posts
@endsection
--}}

@section('title', 'Blog Posts')

@section('content')
<h1>
<a href="{{ url('/posts/create') }}" class="header-menu">New Post</a>
  Blog Posts
</h1>
      <ul>

        <!-- {{--
        @foreach ($posts as $post)
        <li><a href="">{{ $post->title }}</a></li>
        @endforeach
        --}} -->
          <!-- {{-- 値の埋め込みには{{}}を使えば、エスケープまでしてくれる。 
        <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li>
        <li><a href="{{ url('/posts', $post->id) }}">{{ $post->title }}</a></li>
        <li><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></li>
        Implicit Binding 暗黙的にidでモデルを引っ張ってくる
        <li><a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a></li> 
        --}} -->

        @forelse ($posts as $post)
        <li>
          <a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>
          <a href="{{ action('PostsController@edit', $post) }}" class="edit">[edit]</a>"
          <a href="#" class="del" data-id="{{ $post->id }}">[x]</a>
          <form method="post" action="{{ url('/posts', $post->id) }}" id="form_{{ $post->id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
          </form>
        </li>
        @empty
        <li>No posts yet</li>
        @endforelse
      </ul>
      <script src="/laravel_lessons/myblog/public/main.js"></script>
@endsection