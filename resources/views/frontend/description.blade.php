@extends('frontend.welcome')
@section('description')
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="/" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                @isset($post)
                    @foreach ($post->categories->take(1) as $cat)
                        <a href="/{{ $cat->slug }}" class="breadcrumb-item f1-s-3 cl9">
                            {{ $cat->title }}
                        </a>
                    @endforeach

                    <span class="breadcrumb-item f1-s-3 cl9">
                        {{ $post->title }}
                    </span>

                </div>

                <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                    <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search"  id="search" onkeypress="searchItem(event)">
                    <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" >
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </div>
            @endisset

            @isset($page)
                <span class="breadcrumb-item f1-s-3 cl9">
                    {{ $page->page_title }}
                </span>
            </div>
        @endisset


    </div>
    </div>

    <section class="bg0 p-b-140 p-t-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="">
                    <div class="">
                        <!-- Blog Detail -->
                        <div class="">
                            @isset($post)
                                @foreach ($post->categories->take(1) as $cat)
                                    <a href="/{{ $cat->slug }}" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                                        {{ $cat->title }} &nbsp;
                                    </a>
                                @endforeach

                                <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                                    {{ $post->title }}
                                </h3>

                                <div class="flex-wr-s-s p-b-40">
                                    <span class="f1-s-3 cl8 m-r-15">
                                        @foreach ($post->authors as $authors)
                                            <a href="{{route('frontend.author.list',['id'=> $authors->id])}}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                {{ $post->authors->count() - 1 == $loop->index ? $authors->name : $authors->name . ', ' }}
                                            </a>
                                        @endforeach

                                        <span class="m-rl-3">-</span>

                                        <span>
                                            {{ $post->created_at->format('M d') }}
                                        </span>
                                    </span>
                                </div>

                                <div class="wrap-pic-max-w p-b-30">
                                    <img src="{{ $post->image ? asset('uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}" alt="IMG">
                                </div>

                                <p class="f1-s-11 cl6 p-b-25">
                                    {!! $post->description !!}
                                </p>
                            @endisset

                            @isset($page)
                                <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                                    {{ $page->page_title }}
                                </h3>

                                <p class="f1-s-11 cl6 p-b-25">
                                    {!! $page->page_description !!}
                                </p>
                            @endisset


                        </div>
                    </div>
                </div>
            </div>
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
    </section>
@endsection
