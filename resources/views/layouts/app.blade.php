<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="JasonVV 的个人博客" />
    <meta name="keywords" content="blog" />
    <title>@yield('title', 'vv-blog')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="{{ route_class() }}-page">
    @include('layouts._header')
    <div class="container">
        <div class="row">
            <div class="col-md-9 fixPadding">
                @yield('content')
            </div>
            <div class="col-md-3"><div class="container">
                    <svg t="1568200009846" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3104" width="20" height="20"><path d="M291 485.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137c36.7-36.7 85.4-57 137-57 51.6 0 100.3 20.2 137 57 36.7 36.7 57 85.4 57 137s-20.2 100.3-57 137c-36.7 36.8-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146zM291 927.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137 85.4-57 137-57c51.6 0 100.3 20.2 137 57s57 85.4 57 137c0 51.6-20.2 100.3-57 137-36.7 36.8-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146zM803 927.7H663c-68.4 0-124-55.6-124-124v-140c0-13.3 10.7-24 24-24s24 10.7 24 24v140c0 41.9 34.1 76 76 76h140c41.9 0 76-34.1 76-76v-140c0-41.9-34.1-76-76-76H663c-13.3 0-24-10.7-24-24s10.7-24 24-24h140c68.4 0 124 55.6 124 124v140c0 68.4-55.6 124-124 124zM733 485.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137c36.7-36.7 85.4-57 137-57s100.3 20.2 137 57 57 85.4 57 137-20.2 100.3-57 137-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146z" p-id="3105" fill="#8a8a8a"></path></svg>
                    <strong style="color: #8a8a8a">分类</strong>
                    <div class="list-group" style="margin-top: 5px">
                        @foreach($categories as $category)
                            <a href="{{ route('category', ['id' => $category->id]) }}" class="list-group-item list-group-item-action">
                                {{ $category->name }}
                                @if($category->id == 3)
                                    <svg t="1570181685073" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="5950" width="20" height="20"><path d="M0 256h1024v512H0V256z m162.112 155.52V640h37.44V472.96h1.28L315.072 640h36.48V411.52h-37.76v164.8h-1.28L199.552 411.52h-37.44z m234.24 0V640h170.24v-32H433.728V538.88h119.68v-32h-119.68v-63.36h127.36v-32H396.224z m184.64 0L646.528 640h40l44.8-171.84h1.28L777.152 640h39.68l65.92-228.48h-42.24l-42.88 173.76h-1.28l-45.12-173.76h-38.72l-45.12 173.76h-1.28l-42.88-173.76h-42.24z" fill="#333333" p-id="5951"></path></svg>
                                @endif
                                <span class="badge badge-secondary">{{ $category->articles->count() }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <br>
                <div class="container">
                    <svg t="1568199888854" class="icon" viewBox="0 0 1097 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2150" width="20" height="20"><path d="M256 256q0-30.285714-21.428571-51.714286T182.857143 182.857143t-51.714286 21.428571T109.714286 256t21.428571 51.714286T182.857143 329.142857t51.714286-21.428571T256 256z m609.714286 329.142857q0 30.285714-21.142857 51.428572l-280.571429 281.142857q-22.285714 21.142857-52 21.142857-30.285714 0-51.428571-21.142857L52 508.571429q-21.714286-21.142857-36.857143-57.714286T0 384V146.285714q0-29.714286 21.714286-51.428571t51.428571-21.714286h237.714286q30.285714 0 66.857143 15.142857T436 125.142857l408.571429 408q21.142857 22.285714 21.142857 52z m219.428571 0q0 30.285714-21.142857 51.428572l-280.571429 281.142857q-22.285714 21.142857-52 21.142857-20.571429 0-33.714285-8t-30.285715-25.714286l268.571429-268.571428q21.142857-21.142857 21.142857-51.428572 0-29.714286-21.142857-52L527.428571 125.142857q-21.714286-21.714286-58.285714-36.857143T402.285714 73.142857h128q30.285714 0 66.857143 15.142857t58.285714 36.857143l408.571429 408q21.142857 22.285714 21.142857 52z" p-id="2151" fill="#bfbfbf"></path></svg>
                    <strong style="color: #8a8a8a">标签</strong>
                    <div style="margin-top: 5px; border:1px solid #e3e3e3; border-radius:4px; padding: 4px 6px">
                        @foreach($tags as $tag)
                            <a href="{{ route('tag', ['id' => $tag->id]) }}" class="text-decoration-none">
                                <span class="badge badge-info" style="color: white">
                                    {{ $tag->name }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <br>
                <div class="container">
                    <svg t="1568446223382" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="840" width="25" height="25"><path d="M0 0h1024v1024H0z" fill="#D8D8D8" fill-opacity="0" p-id="841"></path><path d="M512 429.056c-163.84 0-341.333333-32.981333-341.333333-107.861333C170.666667 247.808 348.16 213.333333 512 213.333333s341.333333 32.938667 341.333333 107.861334c0 74.88-175.957333 107.861333-341.333333 107.861333z m0-169.301333c-192.682667 0-295.808 44.970667-295.808 62.933333 0 17.962667 103.125333 62.933333 295.808 62.933333s295.808-44.970667 295.808-62.933333c0-19.456-103.125333-62.933333-295.808-62.933333z m6.058667 572.245333c-50.048 0-92.544-25.472-113.749334-46.421333a21.546667 21.546667 0 0 1 0-31.488 22.186667 22.186667 0 0 1 31.829334 0c7.594667 7.509333 78.933333 71.936 166.869333-1.493334 9.130667-7.466667 24.32-7.466667 31.872 2.986667 7.594667 10.496 7.594667 23.978667-3.029333 31.488-39.466667 34.432-77.354667 44.928-113.792 44.928z m-7.594667-110.848c-141.056 0-203.264-73.386667-204.8-76.373333-7.552-9.002667-7.552-25.472 3.072-32.981334 9.088-7.509333 24.234667-4.48 31.829333 4.48 3.029333 2.986667 53.12 59.946667 169.898667 59.946667H512c128.938667 0 175.957333-59.946667 177.493333-61.44 7.594667-8.96 22.741333-11.946667 31.872-4.48 9.088 7.466667 12.117333 23.978667 4.522667 32.938667-2.986667 2.986667-62.165333 77.909333-213.888 77.909333h-1.536z m1.536-140.8c-219.989333 0-286.72-98.901333-289.749333-103.381333a23.808 23.808 0 0 1 7.594666-31.445334 25.770667 25.770667 0 0 1 31.829334 5.973334c1.536 1.493333 59.178667 82.389333 251.861333 82.389333 212.352 0 265.472-85.333333 266.965333-85.333333 6.101333-10.538667 19.754667-15.018667 30.336-9.045334 10.666667 5.973333 15.189333 19.498667 9.130667 29.994667-4.565333 5.973333-65.28 110.848-307.968 110.848z" fill="#B5D4FF" p-id="842"></path></svg>
                    <div style="margin-top: 5px; border:1px solid #e3e3e3; border-radius:4px; padding: 4px 6px">
                        <p style="color: #5c98c8; margin: 0">
                            如果你不行动<br>最好的情况就只是现在<br>
                            如果你行动了<br>最坏的情况也不过是现在<br>
                            所以，你在担心什么？
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts._footer')
</div>
<script src="{{ mix('js/app.js') }}"></script>
@yield('scriptsAfterJs')
</body>
</html>
