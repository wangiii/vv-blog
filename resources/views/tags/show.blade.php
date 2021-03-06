@extends('layouts.app')
@section('title')
    {{ $tag->name }} | 标签
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 style="color: darkgray">
                    <svg t="1568199888854" class="icon" viewBox="0 0 1097 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2150" width="46" height="46"><path d="M256 256q0-30.285714-21.428571-51.714286T182.857143 182.857143t-51.714286 21.428571T109.714286 256t21.428571 51.714286T182.857143 329.142857t51.714286-21.428571T256 256z m609.714286 329.142857q0 30.285714-21.142857 51.428572l-280.571429 281.142857q-22.285714 21.142857-52 21.142857-30.285714 0-51.428571-21.142857L52 508.571429q-21.714286-21.142857-36.857143-57.714286T0 384V146.285714q0-29.714286 21.714286-51.428571t51.428571-21.714286h237.714286q30.285714 0 66.857143 15.142857T436 125.142857l408.571429 408q21.142857 22.285714 21.142857 52z m219.428571 0q0 30.285714-21.142857 51.428572l-280.571429 281.142857q-22.285714 21.142857-52 21.142857-20.571429 0-33.714285-8t-30.285715-25.714286l268.571429-268.571428q21.142857-21.142857 21.142857-51.428572 0-29.714286-21.142857-52L527.428571 125.142857q-21.714286-21.714286-58.285714-36.857143T402.285714 73.142857h128q30.285714 0 66.857143 15.142857t58.285714 36.857143l408.571429 408q21.142857 22.285714 21.142857 52z" p-id="2151" fill="#bfbfbf"></path></svg>
                    {{ $tag->name }} <span class="badge badge-secondary">{{ $tag->articles->count() }}</span>
                </h3>
            </div>
            <div class="list-group">
                @forelse($articles as $article)
                    <a href="{{ route('article', ['id' => $article->id]) }}" }} class="list-group-item list-group-item-action" style="color: darkgray">
                        {{ $article->title }}
                        <span class="float-lg-right" style="color: darkgray; display: inline-block">
                             / {{ $article->created_at->toDateString() }}
                        </span>
                    </a>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <p style="color: #6e6e6e">!!!!!！「 {{ $tag->name }} 」空空如也</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <br>
        {{ $articles->links() }}
    </div>
@endsection
