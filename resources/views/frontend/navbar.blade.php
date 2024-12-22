<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <img src="{{ asset('/images/icons/logo-01.png') }}" alt="IMG-LOGO">
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">

            <ul class="main-menu-m">
                <li>
                    <a href="/">Home</a>
                </li>
                @if($pages_global->count() > 0)
                <li class="main-menu">
                    <a href="#">About</a>
                    <ul class="sub-menu-m">
                     @foreach ($pages_global as $page)
                     <li><a href="/pages/{{$page->page_slug}}">{{ $page->page_title }}</a></li>
                     @endforeach

                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
                @endif
                @if ($categories_global->count() >= 7)
                    @for ($i = 0; $i < 7; $i++)
                        <li class="main-menu">
                            <a href="/{{ $categories_global[$i]->slug }}">{{ $categories_global[$i]->title }}</a>
                        </li>
                    @endfor
                    @if ($categories_global->count() != 7)
                        <li class="main-menu-active">
                            <a href="#">More</a>
                            <ul class="sub-menu-m">
                                @for ($i = 7; $i < $categories_global->count(); $i++)
                                    <li><a href="/{{$categories_global[$i]->slug}}">{{ $categories_global[$i]->title }}</a></li>
                                @endfor
                            </ul>
                            <span class="arrow-main-menu-m">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </span>
                        </li>
                    @endif
                @else
                    @for ($i = 0; $i < $categories_global->count(); $i++)
                        <li class="main-menu">
                            <a href="/">{{ $categories_global[$i]->title }}</a>
                        </li>
                    @endfor
                @endif

            </ul>
        </div>

        <!--  -->
        <div class="wrap-logo no-banner container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="/"><img src="{{ asset('images/icons/logo-01.png') }}" alt="LOGO"></a>
            </div>
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <a class="logo-stick" href="index.html">
                        <img src="images/icons/logo-01.png" alt="LOGO">
                    </a>

                    <ul class="main-menu justify-content-center">
                        <li class="main-menu">
                            <a href="/">Home</a>
                        </li>
                        @if($pages_global->count() > 0)
                        <li class="main-menu">
                            <a class="drop" href="#">About</a>
                            <ul class="sub-menu">
                                @foreach ($pages_global as $page)
                                <li style="{{ (request()->segment(1)=="pages" && request()->segment(2) == $page->page_slug) ? 'background-color: #17b978;' : '' }}"><a style="{{ (request()->segment(1)=="pages" && request()->segment(2) == $page->page_slug) ? 'color: #fff;' : '' }}" href="/pages/{{$page->page_slug}}">{{ $page->page_title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endif
                        @if ($categories_global->count() >= 8)
                            @for ($i = 0; $i < 8; $i++)
                                <li class={{request()->segment(1) == $categories_global[$i]->slug ? "main-menu-active":"main-menu"}}>
                                    <a
                                        href="/{{ $categories_global[$i]->slug }}">{{ $categories_global[$i]->title }}</a>
                                </li>
                            @endfor
                            @if ($categories_global->count() != 8)
                                <li class="main-menu">
                                    <a class="drop" href="#">More</a>
                                    <ul class="sub-menu">
                                        @for ($i = 8; $i < $categories_global->count(); $i++)
                                        <li style="{{ request()->segment(1) == $categories_global[$i]->slug ? 'background-color: #17b978;' : '' }}"><a style="{{ request()->segment(1) == $categories_global[$i]->slug ? 'color: #fff;' : '' }}" href="/{{ $categories_global[$i]->slug }}">{{ $categories_global[$i]->title }}</a></li>
                                        @endfor
                                    </ul>
                                </li>
                            @endif
                        @else
                            @for ($i = 0; $i < $categories_global->count(); $i++)
                                <li class={{request()->segment(1) == $categories_global[$i]->slug ? "main-menu-active":"main-menu"}}>
                                    <a href="/{{ $categories_global[$i]->slug }}">{{ $categories_global[$i]->title }}</a>
                                </li>
                            @endfor
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
