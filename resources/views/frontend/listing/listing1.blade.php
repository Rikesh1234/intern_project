@extends('frontend.welcome')
@section('listing1')
    <!-- Breadcrumb -->
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="/" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>


                <span class="breadcrumb-item f1-s-3 cl9">
                    @if (isset($category))
                        {{ $category->title }}
                    @elseif(isset($author))
                        {{ $author->name }}
                    @else
                        Latest Posts
                    @endif
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

    <!-- Page heading -->
    <div class="container p-t-4 p-b-40">
        <h2 class="f1-l-1 cl2">
            @if (isset($category))
                {{ $category->title }}
                @elseif(isset($author))
                {{ $author->name }}
            @else
                Latest Posts
            @endif
        </h2>
    </div>

    <section class="bg0 p-b-55">
        <div class="container">
            <div class="row justify-content-center">
                <div class="p-b-80">
                    <div class="p-r-10 p-r-0-sr991">
                        <div class="m-t--40 p-b-40">
                            <!-- Item post -->
                            @foreach ($posts as $post)
                                <div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
                                    <a href="{{route('frontend.post.desp',['id'=> $post->id])}}"
                                        class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
                                        <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg') }}"
                                            alt="IMG">
                                    </a>

                                    <div class="size-w-9 w-full-sr575 m-b-25">
                                        <h5 class="p-b-12">
                                            <a href="{{route('frontend.post.desp',['id'=> $post->id])}}"
                                                class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
                                                {{ $post->title }}
                                            </a>
                                        </h5>

                                        <div class="cl8 p-b-18">
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

                                        <p class="f1-s-1 cl6 p-b-24">
                                            {{ $post->summary }}
                                        </p>

                                        <a href="/post/{{ $post->id }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                                            Read More
                                            <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                            <div class="pagination d-flex justify-content-center flex-row">
                                {{ $posts->links('frontend.listing.pagination') }}
                            </div>
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
