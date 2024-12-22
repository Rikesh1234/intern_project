<footer>
    <div class="bg2 p-t-40 p-b-25">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <a href="/">
                            <img class="max-s-full" src="{{asset('images/icons/logo-02.png')}}" alt="LOGO">
                        </a>
                    </div>

                    <div>
                        @foreach ($seo_global as $data)
                            @if($data->label_name == "Comapny Description")
                            <p class="f1-s-1 cl11 p-b-16">
                                {{$data->field_data}}
                            </p>
                            @endif

                            @if($data->label_name == "Company Number" && $data->field_data != null)
                                <p class="f1-s-1 cl11 p-b-16">
                            Any questions? Call us on (+977) {{$data->field_data}}
                        </p>
                            @endif
                        @endforeach



                        <div class="p-t-15">
                            @foreach ($seo_global as $data)
                                @if($data->label_name=="Facebook Link" && $data->field_data!= null)
                                <a href="{{$data->field_data}}" target="_blank" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-facebook-f"></span>
                                </a>
                                @endif
                                @if($data->label_name=="Twitter Link" && $data->field_data!= null)
                                <a href="{{$data->field_data}}" target="_blank" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-twitter"></span>
                                </a>
                                @endif
                                @if($data->label_name=="Pintrest Link" && $data->field_data!= null)
                                <a href="{{$data->field_data}}" target="_blank" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-pinterest-p"></span>
                                </a>
                                @endif
                                @if($data->label_name=="Vimeo Link" && $data->field_data!= null)
                                <a href="{{$data->field_data}}" target="_blank" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-vimeo-v"></span>
                                </a>
                                @endif
                                @if($data->label_name=="Youtube Link" && $data->field_data!= null)
                                <a href="{{$data->field_data}}" target="_blank" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-youtube"></span>
                                </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class=" p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            Latest Posts
                        </h5>
                    </div>

                    <ul>
                        @foreach ($posts_global->take(3) as $post)
                        <li class="flex-sb-s p-b-20">
                            <a href="{{route('frontend.post.desp',['id'=> $post->id])}}" class="size-w-4 wrap-pic-w hov1 trans-03">
                                <img src="{{ $post->image ? asset('/uploads/posts/' . $post->image) : asset('uploads/posts/default.jpg')}}" alt="IMG">
                            </a>

                            <div class="size-w-5">
                                <h6 class="p-b-5">
                                    <a href="{{route('frontend.post.desp',['id'=> $post->id])}}" class="f1-s-5 cl11 hov-cl10 trans-03">
                                        {{Str::limit($post->title,60,'...')}}
                                    </a>
                                </h6>

                                <span class="f1-s-3 cl6">
                                    {{$post->created_at->format('M d')}}
                                </span>
                            </div>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="bg11">
        <div class="container size-h-4 flex-c-c p-tb-15">
            <span class="f1-s-1 cl0 txt-center">
                <a href="#"
                    class="f1-s-1 cl10 hov-link1"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     &copy;
                     @foreach ($seo_global as $seo)
                         {{$seo->label_name == 'Company Name' ? $seo->field_data : ''}}
                     @endforeach
                     {{now()->year}} All rights reserved
            </span>
        </div>
    </div>
</footer>
