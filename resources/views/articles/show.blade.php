@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{ $article->title }}</h3>
        <p>{{ $article->describe }} / @foreach($article->tags as $tag) #{{ $tag->name }}@endforeach / {{ $article->updated_at }}</p>
        <p>{{ $article->content }}</p>
        <br>
    </div>
@endsection
