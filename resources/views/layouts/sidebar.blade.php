<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        @if(Auth::check())
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        @endif
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/cms/dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          @if(auth()->user()->hasPermission('user-read')||auth()->user()->hasPermission('permission-read')||auth()->user()->hasPermission('role-read'))
          <li class="nav-item">
            <a href="#" class="nav-link">
              <span class="nav-icon">
                <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @if(auth()->user()->hasPermission('user-read'))
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('cms.user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
            @endif
            @if(auth()->user()->hasPermission('permission-read'))
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('cms.permission')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permission</p>
                </a>
              </li>
            </ul>
            @endif
            @if(auth()->user()->hasPermission('role-read'))
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('cms.role')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role</p>
                </a>
              </li>
            </ul>
            @endif
          </li>
          @endif

          @if(auth()->user()->hasPermission('post-read')||auth()->user()->hasPermission('author-read')||auth()->user()->hasPermission('category-read'))
          <li class="nav-item">
            <a href="#" class="nav-link">
              <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-post" viewBox="0 0 13 13">
                  <path d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5z"/>
                  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                </svg>
              </span>
              <p>
                Post
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @if(auth()->user()->hasPermission('post-read'))
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('cms.post')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Post</p>
                </a>
              </li>
            </ul>
            @endif
            @if(auth()->user()->hasPermission('author-read'))
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('cms.author')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Author</p>
                </a>
              </li>
            </ul>
            @endif
            @if(auth()->user()->hasPermission('category-read'))
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('cms.categories')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
            </ul>
            @endif
          </li>
          @endif

          @if(auth()->user()->hasPermission('page-read'))
          <li class="nav-item">
            <a href="{{route('cms.pages')}}" class="nav-link">
                <i class="fas fa-file nav-icon"></i>

              <p>
                Pages
              </p>
            </a>
          </li>
          @endif

          @if(auth()->user()->hasPermission('seo-read'))
          <li class="nav-item">
            <a href="{{route('cms.SEO')}}" class="nav-link">
                <i class="fas fa-chart-line nav-icon"></i>
              <p>
                SEO
              </p>
            </a>
          </li>
          @endif
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
