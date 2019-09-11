@extends('layouts.app')

@section('content')
    <div class="container">
        只有偏执狂才能成功
    </div>
    <hr>
    <div class="container">
        @foreach($articles as $article)
            <h3><a href="{{ route('article', ['id' => $article->id]) }}">{{ $article->title }}</a></h3>
            <p>
                {{ $article->describe }} /
                @foreach($article->tags as $tag)
                    <a href="{{ route('tag', ['id' => $tag->id]) }}">#{{ $tag->name }}</a>
                @endforeach
                <a href="{{ route('category', ['id' => $article->category->id]) }}">&{{ $article->category->name }}</a>
                / {{ $article->created_at }}</p>
            <hr>
        @endforeach
            {{ $articles->links() }}
    </div>
    <br><hr>
    <div class="container">
        <h1>标签</h1>
        <li>
            @foreach($tags as $tag)
                <ul>
                    <a href="{{ route('tag', ['id' => $tag->id]) }}"> #{{ $tag->name }}</a>
                </ul>
                <hr>
            @endforeach
        </li>
    </div>
    <div class="container">
        <h1>分类</h1>
        <li>
            <hr>
            @foreach($categories as $category)
                <ul>
                    <a href="{{ route('category', ['id' => $category->id]) }}"> &{{ $category->name }}</a>
                </ul>
                <hr>
            @endforeach
        </li>
    </div>
@endsection
