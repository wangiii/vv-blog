@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>标签： {{ $tag->name }}</h1>
        @foreach($tag->articles as $article)
            <h4><a href="{{ route('article', ['id' => $article->id]) }}" }}>{{ $article->title }}</a></h4>
            <hr>
        @endforeach
    </div>
@endsection
