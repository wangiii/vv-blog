@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($articles as $article)
            <h3><a href="{{ route('article', ['id' => $article->id]) }}">{{ $article->title }}</a></h3>
            <p>{{ $article->describe }} / @foreach($article->tags as $tag) #{{ $tag->name }}@endforeach / {{ $article->updated_at }}</p>
            <p>{{ $article->content }}</p>
            <br>
        @endforeach
    </div>
    {{ $articles->links() }}
@endsection

