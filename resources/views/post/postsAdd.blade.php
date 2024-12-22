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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


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
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="{{ route('cms.post') }}">Post</a></li>
                                <li class="breadcrumb-item active">Add Posts</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="card card-primary w-100">
                            <div class="card-header">
                                <h3 class="card-title">Add Post</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {!! Form::open([
                                'route' => 'cms.post',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    {!! Form::label('title', 'Title') !!}<span class="text-danger">*</span>
                                    {!! Form::text('title', old('title'), [
                                        'class' => 'form-control',
                                        'placeholder' => 'Title',
                                    ]) !!}
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    {!! Form::label('summary', 'Summary') !!}
                                    {!! Form::text('summary', old('summary'), [
                                        'class' => 'form-control',
                                        'placeholder' => 'Summary',
                                    ]) !!}
                                    @error('summary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    {!! Form::label('description', 'Description') !!}
                                    {!! Form::textarea('description', @old('description'), [
                                        'id' => 'tiny',
                                        'class' => 'form-control',
                                        'rows' => 5,
                                    ]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('status', 'Status') !!}
                                    {!! Form::checkbox('status', 1, true, [
                                        'data-toggle' => 'toggle',
                                        'data-onstyle' => 'success',
                                        'data-offstyle' => 'danger',
                                        'data-on' => 'Active',
                                        'data-off' => 'Inactive',
                                    ]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('featured Image', 'Featured image') !!}
                                    <div class="input-group">
                                        <div class="custom-file">
                                            {!! Form::file('image', [
                                                'class' => 'custom-file-input',
                                                'id' => 'exampleInputFile',
                                                'onchange' => 'updateFileName(this)',
                                            ]) !!}
                                            {!! Form::label('file', 'Featured Image', [
                                                'class' => 'custom-file-label',
                                            ]) !!}
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        {!! Form::label('author', 'Select Author(s)') !!}<span class="text-danger">*</span>
                                        {!! Form::select('author[]', $author->pluck('name', 'id'), old('author', $selectedAuthors), [
                                            'class' => 'js-example-basic-single-author form-control',
                                            'multiple' => 'multiple',
                                            'style' => 'width: 100%',
                                        ]) !!}
                                        @error('author')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        {!! Form::label('categories', 'Select Category(s)') !!}<span class="text-danger">*</span>
                                        {!! Form::select('categories[]', $categories->pluck('title', 'id'), old('categories', $selectedCategories), [
                                            'class' => 'js-example-basic-single-cat form-control',
                                            'multiple' => 'multiple',
                                            'style' => 'width: 100%',
                                        ]) !!}
                                        @error('categories')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                {!! link_to_route('cms.post', 'Cancel', [], ['class' => 'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
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
    <!-- AdminLTE for demo purposes -->test2@gmail.com
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

    <script src="https://cdn.tiny.cloud/1/48c0shnyt681d9asf3ba95bbzb6zttmwxmv3drzu07pef42t/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#tiny'
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single-author').select2({
                theme: "classic",
                placeholder: 'Select author',
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single-cat').select2({
                theme: "classic",
                placeholder: 'Select categories',
            });
        });
    </script>

    <script>
        function updateFileName(input) {
            var fileName = $(input).val().split('\\').pop();
            $(input).next('.custom-file-label').html(fileName);
        }
    </script>
</body>

</html>
