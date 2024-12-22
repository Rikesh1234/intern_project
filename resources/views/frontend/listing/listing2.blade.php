@extends('frontend.welcome')
@section('listing2')
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="/" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    {{ $category->title }}
                </span>
            </div>

            <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search"
                    id="search" onkeypress="searchItem(event)">
                <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" onclick="search()">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="container p-t-4 p-b-40">
        <h2 class="f1-l-1 cl2">
            {{ $category->title }}
        </h2>
    </div>

    <section class="bg0 p-b-55">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-80">
                    <div class="p-r-10 p-r-0-sr991">
                        <div class="m-t--65 p-b-40">
                            <!-- Item Blog -->
                            @foreach ($posts as $post)
                                <div class="flex-col-s-c how-bor2 p-t-65 p-b-40">

                                    <h5 class="p-b-17 txt-center">
                                        <a href="{{route('frontend.post.desp',['id'=> $post->id])}}" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
                                            {{ $post->title }}
                                        </a>
                                    </h5>

                                    <div class="cl8 txt-center p-b-24">
                                        by
                                        @foreach ($post->authors as $author)
                                            <a href="{{route('frontend.author.list',['id'=> $author->id])}}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                {{ $post->authors->count() - 1 == $loop->index ? $author->name : $author->name . ', ' }}
                                            </a>
                                        @endforeach

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            {{ $post->created_at->format('M d') }}
                                        </span>
                                    </div>

                                    <a href="{{route('frontend.post.desp',['id'=> $post->id])}}" class="wrap-pic-w hov1 trans-03 m-b-30">
                                        <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                            alt="IMG">
                                    </a>

                                    <p class="f1-s-11 cl6 txt-center p-b-22">
                                        {{ $post->summary }}
                                    </p>

                                    <a href="/post/{{ $post->id }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                                        Read More
                                        <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="pagination d-flex justify-content-center flex-row">
                            {{ $posts->links('frontend.listing.pagination') }}
                        </div>
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
