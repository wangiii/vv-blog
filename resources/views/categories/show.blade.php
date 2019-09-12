@extends('layouts.app')
@section('title')
    {{ $category->name }} | 分类
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>
                    <svg t="1568200009846" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3104" width="46" height="46"><path d="M291 485.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137c36.7-36.7 85.4-57 137-57 51.6 0 100.3 20.2 137 57 36.7 36.7 57 85.4 57 137s-20.2 100.3-57 137c-36.7 36.8-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146zM291 927.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137 85.4-57 137-57c51.6 0 100.3 20.2 137 57s57 85.4 57 137c0 51.6-20.2 100.3-57 137-36.7 36.8-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146zM803 927.7H663c-68.4 0-124-55.6-124-124v-140c0-13.3 10.7-24 24-24s24 10.7 24 24v140c0 41.9 34.1 76 76 76h140c41.9 0 76-34.1 76-76v-140c0-41.9-34.1-76-76-76H663c-13.3 0-24-10.7-24-24s10.7-24 24-24h140c68.4 0 124 55.6 124 124v140c0 68.4-55.6 124-124 124zM733 485.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137c36.7-36.7 85.4-57 137-57s100.3 20.2 137 57 57 85.4 57 137-20.2 100.3-57 137-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146z" p-id="3105" fill="#8a8a8a"></path></svg>
                    {{ $category->name }}
                </h3>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($category->articles as $article)
                    <li class="list-group-item">
                        <a href="{{ route('article', ['id' => $article->id]) }}" }} class="text-decoration-none">
                            {{ $article->title }}
                        </a>
                        <p class="float-lg-right" style="padding:0px; margin:0px;">
                            <svg t="1568213668237" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3265" width="25" height="25"><path d="M487 536m-376 0a376 376 0 1 0 752 0 376 376 0 1 0-752 0Z" fill="#495057" p-id="3266"></path><path d="M487 536m-301.16 0a301.16 301.16 0 1 0 602.32 0 301.16 301.16 0 1 0-602.32 0Z" fill="#FFFFFF" p-id="3267"></path><path d="M487 305.52a7.52 7.52 0 0 1-7.52-7.52v-27.16a7.52 7.52 0 1 1 15.04 0V298a7.52 7.52 0 0 1-7.52 7.52zM368 337.4a7.52 7.52 0 0 1-6.52-3.76L348 310.12a7.52 7.52 0 0 1 13.02-7.52l13.58 23.52a7.52 7.52 0 0 1-6.6 11.28zM280.88 424.52a7.48 7.48 0 0 1-3.76-1L253.6 410a7.52 7.52 0 0 1 7.52-13.02l23.52 13.58a7.52 7.52 0 0 1-3.76 14zM249 543.52h-27.16a7.52 7.52 0 0 1 0-15.04h27.16a7.52 7.52 0 1 1 0 15.04zM257.36 676.1a7.52 7.52 0 0 1-3.76-14l23.52-13.58a7.52 7.52 0 0 1 7.52 13.02l-23.52 13.58a7.48 7.48 0 0 1-3.76 0.98zM354.42 773.16a7.52 7.52 0 0 1-6.5-11.28l13.58-23.52a7.52 7.52 0 0 1 13.02 7.52l-13.58 23.52a7.52 7.52 0 0 1-6.52 3.76zM487 808.68a7.52 7.52 0 0 1-7.52-7.52V774a7.52 7.52 0 1 1 15.04 0v27.16a7.52 7.52 0 0 1-7.52 7.52zM619.58 773.16a7.52 7.52 0 0 1-6.52-3.76l-13.58-23.52a7.52 7.52 0 0 1 13.02-7.52l13.5 23.52a7.52 7.52 0 0 1-6.5 11.28zM716.64 676.1a7.48 7.48 0 0 1-3.76-1l-23.52-13.58a7.52 7.52 0 0 1 7.52-13.02L720.4 662a7.52 7.52 0 0 1-3.76 14zM752.16 543.52H725a7.52 7.52 0 1 1 0-15.04h27.16a7.52 7.52 0 0 1 0 15.04zM693.12 424.52a7.52 7.52 0 0 1-3.76-14l23.52-13.58a7.52 7.52 0 1 1 7.52 13.06l-23.52 13.58a7.48 7.48 0 0 1-3.76 0.94zM606 337.4a7.52 7.52 0 0 1-6.5-11.28l13.58-23.52a7.52 7.52 0 0 1 13.02 7.52l-13.58 23.52a7.52 7.52 0 0 1-6.52 3.76z" fill="#FF6B6B" p-id="3268"></path><path d="M653.14 644.98a13.08 13.08 0 0 1-6.56-1.76l-166.16-95.82a13.16 13.16 0 0 1 13.14-22.78l166.14 95.84a13.16 13.16 0 0 1-6.58 24.54z" fill="#495057" p-id="3269"></path><path d="M487.28 549.16a13.16 13.16 0 0 1-13.16-13.16v-190a13.16 13.16 0 0 1 26.3 0v190a13.16 13.16 0 0 1-13.14 13.16z" fill="#495057" p-id="3270"></path><path d="M487 536m-44.16 0a44.16 44.16 0 1 0 88.32 0 44.16 44.16 0 1 0-88.32 0Z" fill="#FA5252" p-id="3271"></path><path d="M565.88 449.38l23.06-69.18a16.96 16.96 0 0 0-1.3-13.42 172.44 172.44 0 0 1-20-94.76c6-83.1 72.54-151.28 155.48-159.2a173.04 173.04 0 0 1 189.08 190c-8.14 81.08-73.82 146.4-154.92 154.24a172.6 172.6 0 0 1-92-16.26 16.76 16.76 0 0 0-11.56-1.22L575.9 460a8.34 8.34 0 0 1-10.02-10.62zM561 464" fill="#FCC419" p-id="3272"></path><path d="M738.84 430a142.16 142.16 0 0 1-62.26-14.2 46.72 46.72 0 0 0-20.16-4.64 45.32 45.32 0 0 0-11.5 1.48l-40.34 10.62 10.86-32.6a46.4 46.4 0 0 0-3.28-36.5 143.72 143.72 0 0 1-16.68-78.8c5.02-68.9 60.52-125.76 129.12-132.3 4.74-0.46 9.52-0.68 14.24-0.68a143.8 143.8 0 0 1 14.34 286.88c-4.78 0.44-9.6 0.74-14.34 0.74z" fill="#FFD43B" p-id="3273"></path><path d="M775.02 289.56q-8-10-25.14-16.96l-14-5.76q-15.36-6.3-15.36-16.64a15.58 15.58 0 0 1 5.84-12.42 24.54 24.54 0 0 1 26.5-2.1 18 18 0 0 1 4.5 4 10 10 0 1 0 14.98-13.14 39.74 39.74 0 0 0-22.34-13.06v-10.56a11.18 11.18 0 1 0-22.36 0v11.46a41.36 41.36 0 0 0-16.72 9.02 34 34 0 0 0-12.16 26.6q0 23.58 28.98 35.84l13.62 5.66a60.32 60.32 0 0 1 9.14 4.8 28.54 28.54 0 0 1 6.26 5.4 19.16 19.16 0 0 1 3.56 6.3 23.76 23.76 0 0 1 1.14 7.54 23.08 23.08 0 0 1-6.58 16.92 22.28 22.28 0 0 1-16.54 6.68q-12.62 0-19.2-9.14a21.02 21.02 0 0 1-3.18-6.92 10.82 10.82 0 1 0-20.64 6.44 44.74 44.74 0 0 0 11.86 18.66 40.92 40.92 0 0 0 20.46 10v11.2a11.18 11.18 0 1 0 22.36 0v-11.82a43.7 43.7 0 0 0 32.94-43.44 38.22 38.22 0 0 0-7.92-24.56z" fill="#F08C00" p-id="3274"></path></svg>
                            {{ $article->created_at->toDateString() }}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
        <br>
    </div>
@endsection
