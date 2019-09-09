@extends('layouts.app')

@section('content')
    <div class="container">
        <li>
            @foreach($tags as $tag)
                <ol>
                    <a href="{{ route('tag', ['id' => $tag->id]) }}"> #{{ $tag->name }}</a>
                </ol>
            @endforeach
        </li>
    </div>
@endsection

