<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Content Management System</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                {{-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> --}}

                <!-- Messages Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> --}}
                <!-- Message End -->
                {{-- </a> --}}
                {{-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> --}}
                <!-- Notifications Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> --}}
                <li class="nav-item">
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button
                            type="button" class="btn btn-dark rounded" data-mdb-ripple-init><i
                                class="nav-icon fas fa-sign-out-alt"></i>&nbsp;Logout</button></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        @extends('layouts.sidebar');

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">SEO</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">SEO</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="d-flex flex-row-reverse">
                        <a href="{{ route('cms.SEO.create') }}">
                            @can("create",\App\Models\SEO::class)
                            <div class="p-2 mb-3 bg-success text-dark shadow-sm rounded" style="cursor: pointer;"> Add
                                New Fields &nbsp; <i class="fa fa-plus" aria-hidden="true"></i>
                            </div>
                            @endcan
                        </a>
                    </div>


                    @if (session('success'))
                        <div class="d-flex justify-content-end" style="position: absolute; right:10px; top:100px;">
                            <div class="alert alert-success d-none mx-auto w-75">{{ session('success') }}</div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="d-flex justify-content-end" style="position: absolute; right:10px; top:100px;">
                            <div class="alert alert-fail d-none mx-auto w-75">{{ session('error') }}</div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-end" style="position: absolute; right:10px; top:100px;">
                        <span id="deleteAlert" class="alert d-none mx-auto w-75 " role="alert"></span>
                    </div>

                    <div class="d-flex justify-content-end" style="position: absolute; right:10px; top:100px;">
                        <span id="updateAlert" class="alert d-none mx-auto w-75 " role="alert"></span>
                    </div>
                    <div class="p-3 bg-white">
                        @if ($fieldData)
                            @foreach ($fieldData as $data)
                                <div class="form-container-wrapper">
                                    {!! Form::label($data->field_name, $data->label_name) !!}
                                    @if ($data->field_type == 'text')
                                        {!! Form::text($data->field_name, $data->field_data, [
                                            'class' => 'form-control form my-2',
                                            'id' => $data->id,
                                            'placeholder' => $data->label_name,
                                        ]) !!}
                                    @elseif($data->field_type == 'number')
                                        {!! Form::number($data->field_name, (int) $data->field_data, [
                                            'class' => 'form-control form my-2',
                                            'id' => $data->id,
                                            'placeholder' => $data->label_name,
                                            'onkeydown' => 'validateNumericInput(event)',
                                        ]) !!}
                                    @else
                                        {!! Form::textarea('content', $data->field_data, [
                                            'class' => 'form-control form my-2',
                                            'rows' => 4,
                                            'id' => $data->id,
                                            'placeholder' => $data->label_name,
                                        ]) !!}
                                    @endif
                                </div>
                            @endforeach
                        @endif
                        @can("create",\App\Models\SEO::class)
                        {!! Form::button('Update', [
                            'class' => 'btn btn-success border',
                            'onclick' => 'saveChanges()',
                        ]) !!}
                        @endcan
                    </div>
                </div>
            </section>
        </div>




        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        {{-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div> --}}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>


    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const successMessage = localStorage.getItem("successMessage");
            localStorage.removeItem("successMessage");

            if (successMessage) {
                showUpdateAlert(successMessage,'alert-success');
            }
        });

        function validateNumericInput(event) {
            // Allow numeric keys (0-9), Backspace, arrow keys, and period (.)
            if (!((event.keyCode >= 48 && event.keyCode <= 57) ||
                    (event.keyCode >= 96 && event.keyCode <= 105) ||
                    event.keyCode === 8 || // Backspace
                    event.keyCode === 190 || event.keyCode === 110 || // Period (.)
                    (event.keyCode >= 37 && event.keyCode <= 40))) { // Arrow keys
                event.preventDefault();
            }
        }

        function saveChanges() {

            let form_containers = document.querySelectorAll('.form-container-wrapper');
            form_containers.forEach(element => {
                let data = element.querySelector('.form').value;
                let id = element.querySelector('.form').id;
                let requestData = {
                    data: data
                };
                axios.patch(`/cms/SEO/update-data/${id}`, requestData)
                    .then(response => {
                        showUpdateAlert(response.data.success, 'alert-success');
                        console.log(response.data.success);
                    })
                    .catch(error => {
                        if (error.response) {
                            console.error('Error response data:', error.response.data);
                            console.error('Error response status:', error.response.status);
                            console.error('Error response headers:', error.response.headers);
                        } else if (error.request) {
                            console.error('No response received:', error.request);
                        } else {
                            console.error('Error message:', error.message);
                        }

                        showUpdateAlert('Failed to update data', 'alert-danger');
                    });
            });
        }

        function showUpdateAlert(message, alertClass) {
            var updateAlert = document.getElementById('updateAlert'); // Corrected the ID
            console.log(message);
            updateAlert.textContent = message;
            updateAlert.className = `alert ${alertClass}`;
            updateAlert.classList.remove('d-none');

            setTimeout(function() {
                updateAlert.classList.add('d-none');
            }, 5000);
        }
    </script>

</body>

</html>
