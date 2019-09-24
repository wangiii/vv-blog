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
                    {{ $tag->name }}
                </h3>
            </div>
            <div class="list-group">
                @forelse($tag->articles as $article)
                    <a href="{{ route('article', ['id' => $article->id]) }}" }} class="list-group-item list-group-item-action" style="color: darkgray">
                        {{ $article->title }}
                        <span class="float-lg-right" style="color: darkgray; display: inline-block">
                            <svg t="1568384766827" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4164" width="20" height="20"><path d="M760.565515 1023.998H263.438485c-16.245968 0-29.415943-13.171974-29.415942-29.415943V760.044516c0-153.277701 124.701756-277.979457 277.979457-277.979458 16.243968 0 29.415943 13.171974 29.415943 29.415943s-13.171974 29.415943-29.415943 29.415943c-120.839764 0-219.147572 98.309808-219.147572 219.147572v205.121599h438.295144V760.044516c0-47.367907-14.859971-92.445819-42.973916-130.361746-9.673981-13.051975-6.939986-31.473939 6.109988-41.149919 13.047975-9.677981 31.475939-6.939986 41.14992 6.109988 35.68393 48.129906 54.545893 105.325794 54.545893 165.401677v234.537541c0 16.245968-13.171974 29.415943-29.415942 29.415943z" fill="#2D527C" p-id="4165"></path><path d="M809.457419 1023.998H214.542581c-16.245968 0-29.415943-13.171974-29.415943-29.415943s13.169974-29.415943 29.415943-29.415942h594.914838c16.243968 0 29.415943 13.171974 29.415943 29.415942S825.701387 1023.998 809.457419 1023.998z" fill="#2D527C" p-id="4166"></path><path d="M512.002 512.518999c137.277732 0 248.563515-111.285783 248.563515-248.563515V29.415943H263.438485v234.537541c0 137.277732 111.285783 248.565515 248.563515 248.565515z" fill="#CEE8FA" p-id="4167"></path><path d="M512.002 541.934942c-153.277701 0-277.979457-124.701756-277.979457-277.979458V29.415943C234.022543 13.171974 247.190517 0 263.438485 0h497.12703c16.243968 0 29.415943 13.171974 29.415942 29.415943v234.537541c0 153.281701-124.703756 277.981457-277.979457 277.981458zM292.852428 58.831885v205.121599c0 120.837764 98.307808 219.147572 219.147572 219.147572 120.837764 0 219.147572-98.309808 219.147572-219.147572V58.831885H292.852428z" fill="#2D527C" p-id="4168"></path><path d="M809.457419 58.831885H214.542581c-16.245968 0-29.415943-13.171974-29.415943-29.415942S198.296613 0 214.542581 0h594.914838c16.243968 0 29.415943 13.171974 29.415943 29.415943s-13.171974 29.415943-29.415943 29.415942zM512.002 723.638587c-16.245968 0-29.415943-13.171974-29.415943-29.415943V511.479001c0-16.243968 13.169974-29.415943 29.415943-29.415943 16.243968 0 29.415943 13.171974 29.415943 29.415943v182.743643c0 16.243968-13.173974 29.415943-29.415943 29.415943zM414.92819 178.129652H269.320474c-16.245968 0-29.415943-13.171974-29.415943-29.415942s13.169974-29.415943 29.415943-29.415943h145.607716c16.245968 0 29.415943 13.171974 29.415942 29.415943s-13.167974 29.415943-29.415942 29.415942zM761.301513 904.702233h-145.607716c-16.243968 0-29.415943-13.171974-29.415942-29.415943s13.171974-29.415943 29.415942-29.415942h145.607716c16.243968 0 29.415943 13.171974 29.415943 29.415942s-13.173974 29.415943-29.415943 29.415943z" fill="#2D527C" p-id="4169"></path></svg>
                            {{ $article->created_at->toDateString() }}
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
    </div>
@endsection
