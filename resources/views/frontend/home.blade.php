@php
    use Carbon\Carbon;
@endphp
@extends('frontend.welcome')
@section('home')
    <section class="post bg0 p-t-85">
        <div class="container">
            <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
                <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">

                </div>

                <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                    <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search"
                        id="search" onkeypress="searchItem(event)">
                    <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" onclick="search()">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-10">
                    <div class="p-r-10 p-rl-0-sr991 p-b-20">

                        @if ($politicsSection && !empty($politicsSection['posts']))
                            <div class="p-b-25">
                                <div class="how2 how2-cl1 flex-s-c justify-content-between">
                                    <h3 class="f1-m-2 cl12 tab01-title">
                                        {{ $politicsSection['category']['name'] }}
                                    </h3>
                                    <a href="{{ route('frontend.list', ['categories_slug' => $politicsSection['category']['slug']]) }}"
                                        class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                        View all
                                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                    </a>
                                </div>

                                <div class="flex-wr-sb-s p-t-35">
                                    <div class="size-w-6 w-full-sr575">
                                        <!-- Item post -->
                                        <div class="m-b-30">
                                            @foreach (collect($politicsSection['posts'])->first()->take(1) as $post)
                                                <a title="{{ $post->title }}"
                                                    href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                    class="wrap-pic-w hov1 trans-03">
                                                    <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                                        alt="IMG">
                                                </a>
                                                <div class="p-t-25">
                                                    <h5 class="p-b-5">
                                                        <a href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                            class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        @foreach ($post->authors as $author)
                                                            <a href="{{ route('frontend.author.list', ['id' => $author->id]) }}"
                                                                class="f1-s-4 cl8 hov-cl10 trans-03">
                                                                {{ $post->authors->count() - 1 == $loop->index ? $author->name : $author->name . ', ' }}
                                                            </a>
                                                        @endforeach

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            {{$post->created_at->format('M d')}}
                                                        </span>
                                                    </span>

                                                    <p class="f1-s-1 cl6 p-t-18">
                                                        {{ $post->summary }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="size-w-7 w-full-sr575">
                                        @foreach (collect($politicsSection['posts'])->first()->slice(1, 2) as $post)
                                            <!-- Item post -->

                                                <div class="m-b-30">
                                                    <a title="{{ $post->title }}"
                                                        href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                        class="wrap-pic-w hov1 trans-03">
                                                        <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                                            alt="IMG">
                                                    </a>

                                                    <div class="p-t-10">
                                                        <h5 class="p-b-5">
                                                            <a href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                                class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                {{ $post->title }}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            @foreach ($post->authors as $author)
                                                                <a href="{{ route('frontend.author.list', ['id' => $author->id]) }}"
                                                                    class="f1-s-4 cl8 hov-cl10 trans-03">
                                                                    {{ $post->authors->count() - 1 == $loop->index ? $author->name : $author->name . ', ' }}
                                                                </a>
                                                            @endforeach

                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>

                                                            <span class="f1-s-3">
                                                                {{$post->created_at->format('M d')}}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif


                        @if ($societySection && !empty($societySection['posts']))
                            <div class="p-b-25 m-r--10 m-r-0-sr991">
                                <div class="how2 how2-cl5 flex-s-c m-r-10 m-r-0-sr991 justify-content-between">
                                    <h3 class="f1-m-2 cl17 tab01-title">
                                        {{ $societySection['category']['name']}}
                                    </h3>
                                    <a href="{{ route('frontend.list', ['categories_slug' => $societySection['category']['slug']]) }}"
                                        class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                        View all
                                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                    </a>
                                </div>

                                <div class="row p-t-35">
                                    @foreach (collect($societySection['posts'])->first()->take(2) as $post)
                                       <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a title="{{ $post->title }}"
                                                href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                        class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {{ $post->title }}
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    @foreach ($post->authors as $author)
                                                        <a href="{{ route('frontend.author.list', ['id' => $author->id]) }}"
                                                            class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            {{ $post->authors->count() - 1 == $loop->index ? $author->name : $author->name . ', ' }}
                                                        </a>
                                                    @endforeach

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        {{$post->created_at->format('M d')}}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    @foreach (collect($societySection['posts'])->first()->slice(2, 2) as $post)
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a title="{{ $post->title }}"
                                                    href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                    class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                                        alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="{{ route('frontend.post.desp', ['id' => $post->id]) }}}}"
                                                            class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        @foreach ($post->authors as $author)
                                                            <a href="{{ route('frontend.author.list', ['id' => $author->id]) }}"
                                                                class="f1-s-4 cl8 hov-cl10 trans-03">
                                                                {{ $post->authors->count() - 1 == $loop->index ? $author->name : $author->name . ', ' }}
                                                            </a>
                                                        @endforeach

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            {{$post->created_at->format('M d')}}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($businessSection && !empty($businessSection['posts']))
                            <div class="p-b-20">
                                <div class="how2 how2-cl1 flex-sb-c m-r-10 m-r-0-sr991">
                                    <h3 class="f1-m-2 cl12 tab01-title">
                                        {{ $businessSection['category']['name'] }}
                                    </h3>


                                    <a href="{{ route('frontend.list', ['categories_slug' => $businessSection['category']['slug']]) }}"
                                        class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                        View all
                                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                    </a>
                                </div>

                                <div class="row p-t-35">
                                    @foreach (collect($businessSection['posts'])->first()->take(1) as $post)
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        <!-- Item post -->
                                        <div class="m-b-30">
                                            <a title="{{ $post->title }}"
                                                href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                class="wrap-pic-w hov1 trans-03">
                                                <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                                    alt="IMG">
                                            </a>

                                            <div class="p-t-20">
                                                <h5 class="p-b-5">
                                                    <a href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                        class="f1-m-3 cl2 hov-cl10 trans-03">
                                                        {{ $post->title }}
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    @foreach ($post->authors as $author)
                                                        <a href="{{ route('frontend.author.list', ['id' => $author->id]) }}"
                                                            class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            {{ $post->authors->count() - 1 == $loop->index ? $author->name : $author->name . ', ' }}
                                                        </a>
                                                    @endforeach

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        {{$post->created_at->format('M d')}}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                    @foreach (collect($businessSection['posts'])->first()->slice(1, 3) as $post)
                                        <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a title="{{ $post->title }}"
                                                    href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                    class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                                        alt="IMGDonec metus orci, malesuada et lectus vitae">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                            class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        @foreach ($post->authors as $author)
                                                            <a href="{{ route('frontend.author.list', ['id' => $author->id]) }}"
                                                                class="f1-s-4 cl8 hov-cl10 trans-03">
                                                                {{ $post->authors->count() - 1 == $loop->index ? $author->name : $author->name . ', ' }}
                                                            </a>
                                                        @endforeach

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            {{$post->created_at->format('M d')}}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                    @endforeach
                                </div>
                                </div>
                            </div>
                        @endif

                        <div class="row justify-content-center">
                        @if ($fashoinSection && !empty($fashoinSection['posts']))
                            <div class="col-sm-6 p-r-25 p-r-15-sr991 p-b-25">
                                <div class="how2 how2-cl6 flex-sb-c m-b-35">
                                    <h3 class="f1-m-2 cl18 tab01-title">
                                        {{ $fashoinSection['category']['name'] }}
                                    </h3>


                                    <a href="{{ route('frontend.list', ['categories_slug' => $fashoinSection['category']['slug']]) }}"
                                        class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                        View all
                                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                    </a>
                                </div>

                                <!-- Main Item post -->
                                @foreach (collect($fashoinSection['posts'])->first()->take(1) as $post)
                                <div class="m-b-30">
                                    <a title="{{ $post->title }}"
                                        href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                        class="wrap-pic-w hov1 trans-03">
                                        <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                            alt="IMG">
                                    </a>

                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a href="{{ route('frontend.post.desp', ['id' => $post->id]) }}}}"
                                                class="f1-m-3 cl2 hov-cl10 trans-03">
                                                {{ $post->title }}
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            @foreach ($post->authors as $author)
                                                <a href="{{ route('frontend.author.list', ['id' => $author->id]) }}"
                                                    class="f1-s-4 cl8 hov-cl10 trans-03">
                                                    {{ $post->authors->count() - 1 == $loop->index ? $author->name : $author->name . ', ' }}
                                                </a>
                                            @endforeach

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                {{$post->created_at->format('M d')}}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                @endforeach

                                @foreach (collect($fashoinSection['posts'])->first()->slice(1, 2) as $post)
                                <div class="flex-wr-sb-s m-b-30">
                                    <a title="{{ $post->title }}"
                                        href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                        class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                            alt="IMGDonec metus orci, malesuada et lectus vitae">
                                    </a>

                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {{ $post->title }}
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            @foreach ($post->authors as $author)
                                                <a href="{{ route('frontend.author.list', ['id' => $author->id]) }}"
                                                    class="f1-s-4 cl8 hov-cl10 trans-03">
                                                    {{ $post->authors->count() - 1 == $loop->index ? $author->name : $author->name . ', ' }}
                                                </a>
                                            @endforeach

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                {{$post->created_at->format('M d')}}
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        @endif


                        @if ($entertainmentSection && !empty($entertainmentSection['posts']))
                            <div class="col-sm-6 p-r-25 p-r-15-sr991 p-b-25">
                                <div class="how2 how2-cl6 flex-sb-c m-b-35">
                                    <h3 class="f1-m-2 cl18 tab01-title">
                                        {{ $entertainmentSection['category']['name'] }}
                                    </h3>


                                    <a href="{{ route('frontend.list', ['categories_slug' => $entertainmentSection['category']['slug']]) }}"
                                        class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                        View all
                                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                    </a>
                                </div>

                                <!-- Main Item post -->
                                @foreach (collect($entertainmentSection['posts'])->first()->take(1) as $post)
                                <div class="m-b-30">
                                    <a title="{{ $post->title }}"
                                        href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                        class="wrap-pic-w hov1 trans-03">
                                        <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                            alt="IMG">
                                    </a>

                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a href="{{ route('frontend.post.desp', ['id' => $post->id]) }}}}"
                                                class="f1-m-3 cl2 hov-cl10 trans-03">
                                                {{ $post->title }}
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            @foreach ($post->authors as $author)
                                                <a href="{{ route('frontend.author.list', ['id' => $author->id]) }}"
                                                    class="f1-s-4 cl8 hov-cl10 trans-03">
                                                    {{ $post->authors->count() - 1 == $loop->index ? $author->name : $author->name . ', ' }}
                                                </a>
                                            @endforeach

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                {{$post->created_at->format('M d')}}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                @endforeach

                                @foreach (collect($entertainmentSection['posts'])->first()->slice(1, 2) as $post)
                                <div class="flex-wr-sb-s m-b-30">
                                    <a title="{{ $post->title }}"
                                        href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                        class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                            alt="IMGDonec metus orci, malesuada et lectus vitae">
                                    </a>

                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="{{ route('frontend.post.desp', ['id' => $post->id]) }}"
                                                class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {{ $post->title }}
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            @foreach ($post->authors as $author)
                                                <a href="{{ route('frontend.author.list', ['id' => $author->id]) }}"
                                                    class="f1-s-4 cl8 hov-cl10 trans-03">
                                                    {{ $post->authors->count() - 1 == $loop->index ? $author->name : $author->name . ', ' }}
                                                </a>
                                            @endforeach

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                {{$post->created_at->format('M d')}}
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg0 p-t-60 p-b-40">
        <div class="container">
            <div class="how2 how2-cl4 flex-s-c justify-content-between">
                <h3 class="f1-m-2 cl3 tab01-title">
                    Latest Articles
                </h3>
                <a href="{{ route('frontend.latest') }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                    View all
                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                </a>
            </div>

            <div class="row p-t-35">
                @foreach ($postss->take(6) as $posts)
                    <div class="col-sm-6 col-md-4">
                        <!-- Item latest -->
                        <div class="m-b-45">
                            <a title="{{ $posts->title }}" href="{{ route('frontend.post.desp', ['id' => $posts->id]) }}"
                                class="wrap-pic-w hov1 trans-03">
                                <img src="{{ $posts->image ? asset('/uploads/posts/' . $posts->image) : asset('uploads/posts/default.jpg') }}"
                                    alt="IMG">
                            </a>

                            <div class="p-t-16">
                                <h5 class="p-b-5">
                                    <a href="{{ route('frontend.post.desp', ['id' => $posts->id]) }}"
                                        class="f1-m-3 cl2 hov-cl10 trans-03">
                                        {{ $posts->title }}
                                    </a>
                                </h5>

                                <span class="cl8">
                                    @foreach ($posts->authors as $author)
                                        <a href="{{ route('frontend.author.list', ['id' => $author->id]) }}"
                                            class="f1-s-4 cl8 hov-cl10 trans-03">
                                            {{ $author->name }}
                                        </a>
                                    @endforeach

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3">
                                        {{ $posts->created_at->format('M d') }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
        function searchItem(event) {

            if (event.key === 'Enter') {
                search();
            }
        }

        function search() {

            var searchWord = document.getElementById('search').value;

            if (searchWord != "" && searchWord != null) {

                window.location.href = `/page/search/${searchWord}`;
            }
        }
    </script>
@endsection
