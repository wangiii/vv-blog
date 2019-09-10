@extends('layouts.app')

@section('content')
    <div class="container">
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
