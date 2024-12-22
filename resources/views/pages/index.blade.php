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
    <style>
        /* Override styles for the entire toggle component */
        .toggle {
            width: 80px !important;
        }

        /* Adjust styles for the handle */
        .toggle-handle {
            width: 5px !important;
        }

        /* Adjust styles for the container (if necessary) */
        .toggle-group {
            width: 150px !important;
        }
    </style>


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
                            <h1 class="m-0">Pages</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pages</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @can('create', \App\Models\pages::class)
                        <div class="d-flex flex-row-reverse">
                            <button class="p-2 mb-3 bg-success text-dark shadow-sm rounded" data-toggle="modal"
                                data-target="#exampleModalCenter" onclick="openModal('add')">Add New Page &nbsp; <i
                                    class="fa fa-plus" aria-hidden="true"></i></button>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                                    style="width: 80%;">
                                    <div class="modal-content" style="width: 100%;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Page</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open([
                                                'enctype' => 'multipart/form-data',
                                            ]) !!}

                                            <div class="form-group">
                                                {!! Form::label('title', 'Title') !!} <span class="text-danger">*</span>
                                                {!! Form::text('title', '', [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Title',
                                                    'id' => 'title',
                                                ]) !!}
                                                <div id="titleError" class="text-danger error"></div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('slug', 'slug') !!} <span class="text-danger">*</span>
                                                {!! Form::text('slug', '', [
                                                    'id' => 'slug',
                                                    'class' => 'form-control',
                                                    'placeholder' => 'slug',
                                                ]) !!}
                                                <div id="slugError" class="text-danger error"></div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('summary', 'Summary') !!}
                                                {!! Form::text('summary', '', [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Summary',
                                                    'id' => 'summary',
                                                ]) !!}
                                                <div id="summaryError" class="text-danger"></div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('description', 'Description') !!}
                                                {!! Form::textarea('description', '', [
                                                    'id' => 'desc',
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
                                                    'id' => 'status',
                                                ]) !!}
                                            </div>

                                            {!! Form::close() !!}
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::button('Cancel', [
                                                'class' => 'btn btn-danger',
                                                'data-dismiss' => 'modal',
                                            ]) !!}
                                            {!! Form::button('Submit', [
                                                'class' => 'btn btn-primary',
                                                'onclick' => 'saveChanges()',
                                                'id' => 'save',
                                            ]) !!}

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endcan

                    @if (session('success'))
                        <div class="d-flex justify-content-end">
                            <div class="alert alert-success d-none mx-auto w-75">{{ session('success') }}</div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="d-flex justify-content-end">
                            <div class="alert alert-fail d-none mx-auto w-75">{{ session('error') }}</div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-end" style="position: absolute; right:10px; top:100px;">
                        <span id="notification" class="alert d-none mx-auto w-75 " role="alert"></span>
                    </div>

                    <div class="d-flex justify-content-end" style="position: absolute; right:10px; top:100px;">
                        <span id="deleteAlert" class="alert d-none mx-auto w-75 " role="alert"></span>
                    </div>

                    <div class="d-flex justify-content-end" style="position: absolute; right:10px; top:100px;">
                        <span id="updateAlert" class="alert d-none mx-auto w-75 " role="alert"></span>
                    </div>


                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Summary</th>
                                <th scope="col">Status</th>
                                <th scope="col">Description</th>
                                @canany(['update', 'delete'], \App\Models\pages::class)
                                    <th scope="col">Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        @if ($pages)
                            <tbody>
                                @foreach ($pages as $page)
                                    <tr id="pageRow_{{ $page->id }}">
                                        <td>{{ Str::limit($page->page_title, 40, '...') }}</td>
                                        <td>{{ Str::limit($page->page_slug, 40, '...') }}</td>
                                        <td>{{ Str::limit($page->page_summary, 40, '...') }}</td>
                                        <td>
                                            {!! Form::checkbox('statusss', 1, $page->page_status, [
                                                'data-page-id' => $page->id,
                                                'data-toggle' => 'toggle',
                                                'data-onstyle' => 'success',
                                                'data-offstyle' => 'danger',
                                                'data-on' => 'Active',
                                                'data-off' => 'Inactive',
                                                'id' => 'updateStatus',
                                                'onchange' => 'handleToggleChange(this)',
                                            ]) !!}
                                        </td>
                                        <td style="white-space: normal;">{!! Str::limit(strip_tags($page->page_description), 40, '...') !!}</td>
                                        <td class="d-flex justify-center " style="align-items: center; gap:8px;">
                                            @can('update', \App\Models\pages::class)
                                                <button class="btn btn-primary edit-button"
                                                    data-id="{{ $page->id }}">Edit &nbsp; <i
                                                        class="fas fa-edit"></i></button>
                                            @endcan
                                            @can('delete', \App\Models\pages::class)
                                                <a href="#" onclick="confirmDelete({{ $page->id }})">
                                                    <span class="p-2 mb-3 bg-danger text-dark shadow-sm rounded"
                                                        style="cursor: pointer;">Delete &nbsp; <i
                                                            class="fas fa-trash"></i></span>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                    <tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>

                        <div class="pagination d-flex justify-content-between flex-row">
                            <div class="pagination-show">
                                @if($tableLength == 0)
                                    No Result Found
                                @else
                                    Showing <span id="first-data">1</span> to <span id="last-data">{{ $tableLength < 8 ? $tableLength : 8 }}</span> of <span id="total-data">{{ $tableLength }}</span>
                                @endif
                            </div>
                            {{ $pages->links() }}
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

    <script src="https://cdn.tiny.cloud/1/48c0shnyt681d9asf3ba95bbzb6zttmwxmv3drzu07pef42t/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        $('#title').on('keyup', function() {
            var theTitle = this.value.toLowerCase().trim();
            var slugInput = $('#slug');
            var theSlug = theTitle.replace(/&/g, '-and-').replace(/[^a-z0-9-]+/g, '-').replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');
            slugInput.val(theSlug);
        })
    </script>

    <script>
        tinymce.init({
            selector: 'textarea#desc',
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.edit-button').forEach(editButton => {
                editButton.addEventListener('click', function() {
                    const pageId = this.getAttribute('data-id');
                    openModal('edit', pageId);
                });
            });

            const firstPageLink = '/cms/pages?page=1';


            const anchorTag = $('<a></a>')
                .attr('href', firstPageLink)
                .attr('rel', 'prev')
                .attr('aria-label', '« Previous')
                .addClass('page-link', 'active') // Add the necessary classes
                .text('‹');

            // Replace the firstPageButton with the newly created anchor tag
            const firstPageButton = $('.pagination .page-item:has(.page-link:contains("‹"))');
            const spanInsideFirstPageButton = firstPageButton.find('.page-link:contains("‹")');
            spanInsideFirstPageButton.replaceWith(anchorTag);


            const targetDiv = $('.pagination .page-item.active:has(.page-link:contains("1"))');

            if (targetDiv.length > 0) {
                // Get the href attribute of the existing link
                const existingLinkHref = "/cms/pages?page=1"

                // Remove existing content within the selected li.page-item.active
                targetDiv.empty();

                // Create a new a element with the href attribute
                const newAElement = $('<a class="page-link"></a>').attr('href', existingLinkHref).text('1');

                // Append the new a element to the li.page-item.active
                targetDiv.append(newAElement);

                // Remove all existing classes
                targetDiv.removeClass();

                // Add the 'page-item' class
                targetDiv.addClass('page-item active');
            }

            $(".page-link").on("click", function(e) {
                e.preventDefault();

                let first = document.getElementById('first-data');
                let last = document.getElementById('last-data');


                var pageUrl = $(this).attr("href");
                var page = getPageNumberFromUrl(pageUrl);

                var totalPage = Math.ceil({{ $tableLength }} / 8);

                if ({{ $tableLength }} < page * 8) {
                    last.innerHTML = {{ $tableLength }};
                    first.innerHTML = (page * 8) - 8 + 1;
                } else {
                    last.innerHTML = page * 8;
                    first.innerHTML = last.innerHTML - 8 + 1
                }


                let relAttribute = "";
                if ($(this).attr("rel")) {
                    relAttribute = $(this).attr("rel");
                }

                if (
                    relAttribute.toLowerCase() === "next" ||
                    relAttribute.toLowerCase() === "prev"
                ) {

                    document.querySelectorAll(".page-link").forEach((link) => {
                        link.classList.remove("active");
                    });

                    document.querySelectorAll(".page-item").forEach((link) => {
                        link.classList.remove("active");
                    });

                    const targetPage = $(`.pagination .page-item:has(.page-link:contains('${page}'))`);

                    targetPage.addClass('active');
                    targetPage.parent().addClass('active');

                    let PrevLink = "/cms/pages?page=" + (page - 1);
                    let NextLink = "/cms/pages?page=" + (page + 1);

                    const PrevButton = $('.pagination a[rel="prev"]');
                    PrevButton.attr('href', PrevLink)

                    const NextButton = $('.pagination a[rel="next"]');
                    NextButton.attr('href', NextLink)

                    if (page == 1) {
                        PrevButton.parent().addClass('disabled')
                        NextButton.parent().removeClass('disabled')

                    } else if (page == totalPage) {

                        NextButton.parent().addClass('disabled')
                        PrevButton.parent().removeClass('disabled')
                    } else {

                        NextButton.parent().removeClass('disabled')
                        PrevButton.parent().removeClass('disabled')
                    }



                    fetchDataForPage(page);
                } else {
                    document.querySelectorAll(".page-link").forEach((link) => {
                        link.classList.remove("active");
                    });

                    document.querySelectorAll(".page-item").forEach((link) => {
                        link.classList.remove("active");
                    });

                    this.parentNode.classList.add("active");
                    this.classList.add("active");
                    if (page == totalPage) {
                        let PrevLink = "/cms/pages?page=" + (page - 1);

                        const prevButton = $('.pagination a[rel="prev"]');
                        prevButton.attr('href', PrevLink);

                        const nextButton = $('.pagination a[rel="next"]');
                        nextButton.parent().addClass('disabled')
                        prevButton.parent().removeClass('disabled')
                    } else if (page == 1) {
                        let NextLink = "/cms/pages?page=" + (page + 1);


                        const nextButton = $('.pagination a[rel="next"]');
                        nextButton.attr('href', NextLink);

                        const prevButton = $('.pagination a[rel="prev"]');
                        prevButton.parent().addClass('disabled')
                        nextButton.parent().removeClass('disabled')
                    } else {
                        let PrevLink = "/cms/pages?page=" + (page - 1);
                        let NextLink = "/cms/pages?page=" + (page + 1);

                        const PrevButton = $('.pagination a[rel="prev"]');
                        PrevButton.attr('href', PrevLink)

                        const NextButton = $('.pagination a[rel="next"]');
                        NextButton.attr('href', NextLink)

                        NextButton.parent().removeClass('disabled')
                        PrevButton.parent().removeClass('disabled')
                    }

                    console.log(page);
                    // Now you have the page number, you can fetch the data for that page using Axios or another method
                    fetchDataForPage(page);
                }
            });




            function getPageNumberFromUrl(url) {
                // Extract the page number from the URL, you may need to customize this based on your URL structure
                var match = url.match(/page=(\d+)/);
                return match ? parseInt(match[1]) : 1;
            }

            function fetchDataForPage(page) {
                // Use Axios or another method to fetch data for the specified page
                // You can use the same logic you've used before
                axios.get('/cms/pages?page=' + page)
                    .then(function(response) {


                        // Parse the HTML response
                        var parser = new DOMParser();
                        var htmlDoc = parser.parseFromString(response.data, 'text/html');

                        // Now you can access and manipulate elements in the HTML document
                        var tableRows = htmlDoc.querySelectorAll('table tr');

                        appendDataToTable(tableRows);

                    })
                    .catch(function(error) {
                        console.error('Error fetching data:', error);
                    });
            }

            function appendDataToTable(data) {
                const tableBody = document.querySelector('table tbody');
                tableBody.innerHTML = '';

                // Iterate through the NodeList
                for (let i = 1; i < data.length; i++) {
                    const row = data[i];
                    // Append each row to the existing table
                    tableBody.appendChild(row);

                    $('input[name="statusss"]').bootstrapToggle();
                }

                document.querySelectorAll('.edit-button').forEach(editButton => {
                    editButton.addEventListener('click', function() {
                        const pageId = this.getAttribute('data-id');
                        openModal('edit', pageId);
                    });
                });
            }
        });
    </script>


    <script>
        let currentMode = 'add';
        let Id = 0;


        function openModal(action, pageId = null) {

            clearValidationErrors();

            const modalTitleElement = document.getElementById('exampleModalLongTitle');
            const title = document.getElementById('title');
            const slug = document.getElementById('slug');
            const summary = document.getElementById('summary');
            const description = tinymce.get('desc').getContent();
            const status = document.getElementById('status');
            const save = document.getElementById('save');

            if (action === 'add') {
                currentMode = 'add';
                modalTitleElement.innerText = 'Add New Page';
                save.innerText = 'Submit';


                title.value = '';
                slug.value = '';
                summary.value = '';
                tinymce.get('desc').setContent('')
                $(status).bootstrapToggle('on');


            } else if (action === 'edit' && pageId !== null) {
                // Set the modal title for "Edit" action
                modalTitleElement.innerText = 'Edit Page';
                save.innerText = 'Update';
                currentMode = 'edit';
                Id = pageId;

                // Fetch the data for the specific pageId and fill the input fields
                axios.get(`/cms/pages/${pageId}`)
                    .then(response => {
                        const data = response.data;

                        // Populate the input fields with data
                        title.value = data.title;
                        slug.value = data.slug;
                        summary.value = data.summary;
                        tinymce.get('desc').setContent(data.description);
                        status.checked = data.status === 1;

                        if (data.status === 1) {
                            $(status).bootstrapToggle('on');
                        } else {
                            $(status).bootstrapToggle('off');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                        // Handle error fetching data, maybe show an alert
                    });
            }

            // Open the modal
            $('#exampleModalCenter').modal('show');
        }

        function clearValidationErrors() {
            // Clear any previous validation errors
            const errorDivs = document.querySelectorAll('.error');
            errorDivs.forEach(errorDiv => {
                errorDiv.textContent = '';
                errorDiv.classList.add('d-none');
            });
        }
    </script>



    <script>
        function fetchLatestData(page = 1) {
            const fetchLatestPageRoute = '{{ route('cms.page.latest') }}';
            axios.get(fetchLatestPageRoute, {
                    params: {
                        page: page
                    }
                })
                .then(response => {
                    const newData = response.data.latestData;
                    document.getElementById('total-data').innerHTML = response.data.tableLength;
                    if (newData) {
                        updateTable(newData);
                    } else {
                        console.error('Error: newData is undefined');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    console.error('Response Data:', error.response.data);
                    console.error('Status Code:', error.response.status);
                });
        }

        function updateTable(newData) {
            const table = $('.table');

            table.find('tbody').empty();

            const dataArray = newData.data; // Access the 'data' array

            if (!dataArray || !Array.isArray(dataArray)) {
                console.error('Error: newData.data is not an array or is undefined');
                return;
            }

            dataArray.forEach(rowData => {
                const newRow = $('<tr>');

                newRow.addClass('pageRow_' + rowData.id);


                const newCell2 = $('<td>').text(rowData.page_title);
                const newCell3 = $('<td>').text(rowData.page_slug);
                const newCell4 = $('<td>').text(rowData.page_summary);

                const toggleButton = $('<input>', {
                    type: 'checkbox',
                    name: 'statusss',
                    id: 'updateStatus',
                    'data-page-id': rowData.id,
                    'data-toggle': 'toggle',
                    'data-onstyle': 'success',
                    'data-offstyle': 'danger',
                    'data-on': 'Active',
                    'data-off': 'Inactive',
                    onchange: "handleToggleChange(this)",
                    checked: rowData.page_status
                });


                const newCell5 = $('<td>').append(toggleButton);
                const newCell6 = $('<td>').html(truncateString(stripTags(rowData.page_description), 40));
                const newCell7 = $('<td>').html(`
              <button class="btn btn-primary edit-button" data-id="${rowData.id}">Edit &nbsp; <i class="fas fa-edit"></i></button>
                <a href="#" onclick="confirmDelete('${rowData.id}')">
                    <span class="p-2 mb-3 bg-danger text-dark shadow-sm rounded" style="cursor: pointer;">Delete &nbsp; <i class="fas fa-trash"></i></span>
                </a>
            `);

                newRow.append(newCell2, newCell3, newCell4, newCell5, newCell6, newCell7);

                table.find('tbody').append(newRow);
                if (rowData.page_status === 1) {
                    toggleButton.bootstrapToggle('on');
                } else {
                    toggleButton.bootstrapToggle('off');
                }

                const editButton = newRow.find('.edit-button');
                editButton.on('click', function() {
                    const pageId = $(this).data('id');
                    openModal('edit', pageId);
                });



            });

            function truncateString(str, maxLength) {
                if (str.length > maxLength) {
                    return str.substr(0, maxLength - 3) + '...';
                }
                return str;
            }

            function stripTags(input) {
                return input.replace(/<\/?[^>]+(>|$)/g, "");
            }
        }


        function saveChanges() {
            const route = currentMode === 'add' ? '{{ route('cms.page.store') }}' : `/cms/pages/${Id}`;


            // Make an Axios POST request
            axios[currentMode === 'add' ? 'post' : 'patch'](route, {
                    title: document.getElementById('title').value,
                    slug: document.getElementById('slug').value,
                    summary: document.getElementById('summary').value,
                    description: tinymce.get('desc').getContent(),
                    status: document.getElementById('status').checked ? 1 : 0,
                }, {
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {

                    document.getElementById('title').value = '';
                    document.getElementById('slug').value = '';
                    document.getElementById('summary').value = '';
                    tinymce.get('desc').setContent('');
                    document.getElementById('status').checked = true;

                    $('#exampleModalCenter').modal('hide');

                    fetchLatestData();
                    showNotification(response.data.success, 'alert-success');

                    updatePagination("plus");
                })
                .catch(error => {
                    if (error.response) {
                        if (error.response.status === 422) {
                            const errors = error.response.data.errors;

                            for (const key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    const errorMessage = errors[key][0];
                                    showValidationErrors(key, errorMessage);
                                }
                            }
                        } else {
                            console.error('Error response data:', error.response.data);
                            console.error('Error response status:', error.response.status);
                            console.error('Error response headers:', error.response.headers);
                        }
                    } else if (error.request) {
                        console.error('No response received:', error.request);
                    } else {
                        console.error('Error message:', error.message);
                    }
                });

            function showNotification(message, alertClass) {
                var deleteAlert = document.getElementById('notification');
                deleteAlert.textContent = message;
                deleteAlert.className = `alert ${alertClass}`;
                deleteAlert.classList.remove('d-none');

                setTimeout(function() {
                    deleteAlert.classList.add('d-none');
                }, 5000);
            }

            function showValidationErrors(fieldName, errorMessage) {
                const errorDiv = document.getElementById(fieldName + 'Error');
                if (errorDiv) {
                    errorDiv.textContent = errorMessage;
                    errorDiv.classList.remove('d-none');
                } else {
                    console.error(`Error div not found for key: ${fieldName}`);
                }
            }
        }
    </script>


    <script>
        function confirmDelete(pageId) {
            var confirmation = confirm("Are you sure you want to delete this page?");
            if (confirmation) {
                axios.delete('{{ route('cms.page.destroy', ['id' => '__pageId']) }}'.replace('__pageId', pageId))
                    .then(response => {
                        fetchLatestData();
                        // showNotification(response.data.success, 'alert-success');
                        updatePagination("minus");

                    })
                    .catch(error => {
                        if (error.response) {
                            // The server responded with an error status code (4xx or 5xx)
                            showDeleteAlert(error.response.data.error, 'alert-danger');
                        } else if (error.request) {
                            // The request was made but no response was received
                            console.error('Request made but no response received:', error.request);
                        } else {
                            // Something happened in setting up the request that triggered an Error
                            console.error('Error in request setup:', error.message);
                        }
                    });
            }
        }
    </script>

    <script>
        function handleToggleChange(toggleButton) {

            var pageId = $(toggleButton).data('page-id');
            var status = $(toggleButton).prop('checked') ? 1 : 0;


            axios.patch(`/cms/pages/update-status/${pageId}/${status}`)
                .then(response => {
                    showUpdateAlert(response.data.success, 'alert-success');
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

                    showUpdateAlert('Failed to update status', 'alert-danger');
                });
        }

        function showUpdateAlert(message, alertClass) {
            var updateAlert = document.getElementById('updateAlert'); // Corrected the ID
            updateAlert.textContent = message;
            updateAlert.className = `alert ${alertClass}`;
            updateAlert.classList.remove('d-none');

            setTimeout(function() {
                updateAlert.classList.add('d-none');
            }, 5000);
        }
    </script>

    <script>
        function updatePagination(action) {
            let first = document.getElementById('first-data');
            let last = document.getElementById('last-data');
            let page_show = document.querySelector('.pagination-show');
            if (action == "minus") {
                if (first.innerHTML == last.innerHTML) {
                    page_show.innerHTML = "No Result Found"
                } else if ({{ $tableLength < 8 }}) {
                    last.innerHTML = last.innerHTML - 1;
                }
            } else {
                if (page_show.innerHTML == "No Result Found") {
                    page_show.innerHTML =
                        ' Showing <span id="first-data">1</span> to <span id="last-data">1</span> of <span id="total-data">1</span>'
                } else {
                    last.innerHTML = parseInt(last.innerHTML) + 1;
                }
            }
        }
    </script>


</body>

</html>
