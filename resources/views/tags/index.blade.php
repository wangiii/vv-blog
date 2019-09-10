@extends('layouts.app')

@section('content')
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
@endsection

