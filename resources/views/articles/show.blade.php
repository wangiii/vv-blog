@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{ $article->title }}</h3>
        <p>{{ $article->describe }}
            /
            @foreach($article->tags as $tag)
                <a href="{{ route('tag', ['id' => $tag->id]) }}">#{{ $tag->name }}</a>
            @endforeach
            <a href="{{ route('category', ['id' => $article->category->id]) }}">&{{ $article->category->name }}</a>
            / {{ $article->updated_at }}
        </p>
        <p>{{ $article->content }}</p>
        <br>
    </div>
@endsection
