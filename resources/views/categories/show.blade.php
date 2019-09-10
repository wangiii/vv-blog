@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>分类：{{ $category->name }}</h1>
        <hr>
        @foreach($category->articles as $article)
            <h4><a href="{{ route('article', ['id' => $article->id]) }}" }}>{{ $article->title }}</a></h4>
            <hr>
        @endforeach
    </div>
@endsection
