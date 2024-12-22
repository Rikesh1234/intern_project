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
        .form-container {
            display: flex;
            justify-content: center;
            gap: 25px;
            background: white;
        }

        .form-card {
            width: calc(100%/3);
        }

        .select-style {
            background-color: transparent;
            height: 38px;
            appearance: none;
            border: 1px solid #ced4da;
            /* Add a border for normal state */
            border-radius: 3px;
            /* Remove border-radius */
            outline: none;
            /* Remove the outline */
            background-color: transparent;
            /* Remove default background color */
            width: 100%;
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
                            <h1 class="m-0">Add Field</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="{{ route('cms.SEO') }}">SEO</a></li>
                                <li class="breadcrumb-item active">Add Field</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
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

                    <div class="form-container-wrapper">

                        @if ($fieldData)
                            @foreach ($fieldData as $data)
                                <div class="form-container p-5 m-2 old" id={{ $data->id }}>
                                    <div class="d-flex flex-column bg-white form-card">
                                        <div>
                                            {!! Form::label('role', 'Textfield Type ') !!}&nbsp;<span class="text-danger">*</span>
                                        </div>
                                        <select class="select-style" id="fieldType">
                                            <option value="text" {{ $data->field_type == 'text' ? 'selected' : '' }}>
                                                Text
                                            </option>
                                            <option value="number"
                                                {{ $data->field_type == 'number' ? 'selected' : '' }}>Number
                                            </option>
                                            <option value="Textarea"
                                                {{ $data->field_type == 'Textarea' ? 'selected' : '' }}>
                                                Textarea
                                            </option>
                                        </select>
                                        <div id="Field_TypeError" class="text-danger error"></div>
                                    </div>
                                    <div class="form-card">
                                        {!! Form::label('labelName', 'Label Name') !!}&nbsp;<span class="text-danger">*</span>
                                        {!! Form::text('labelName', $data->label_name, [
                                            'class' => 'form-control',
                                            'id' => 'labelName',
                                            'placeholder' => 'Label Name',
                                        ]) !!}
                                        <div id="Label_NameError" class="text-danger error"></div>
                                    </div>
                                    <div class="form-card">
                                        {!! Form::label('fieldName', 'Field Name') !!}&nbsp;<span class="text-danger">*</span>
                                        {!! Form::text('fieldName', $data->field_name, [
                                            'class' => 'form-control',
                                            'id' => 'fieldName',
                                            'placeholder' => 'Field Name',
                                        ]) !!}
                                        <div id="Field_NameError" class="text-danger error"></div>
                                    </div>
                                    @can("delete",\App\Models\SEO::class)
                                    <div class="d-flex align-items-center justify-content-center">
                                        {!! Form::button('<i class="fa fa-minus" aria-hidden="true"></i>', [
                                            'class' => 'btn btn-white border border-info border-2 rounded-circle removeFormButton',
                                            'onClick' => 'storeDataAndRemoveForm(' . $data->id . ')',
                                        ]) !!}
                                    </div>
                                    @endcan
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <div class="d-flex align-items-center justify-content-between p-3">
                        @can("create",\App\Models\SEO::class)
                        {!! Form::button('Submit', [
                            'class' => 'btn btn-success border',
                            'onclick' => 'saveChanges()',
                        ]) !!}
                        @endcan
                        <div>
                            {!! Form::button('Add New Field &nbsp; <i class="fa fa-plus" aria-hidden="true"></i>', [
                                'class' => 'btn btn-success border',
                                'onclick' => 'createAndAppendForm()',
                            ]) !!}
                            {!! Form::button('Cancel ', [
                                'class' => 'btn btn-danger border',
                                'onclick' => 'window.location.href="' . route('cms.SEO') . '"',
                            ]) !!}
                        </div>
                    </div>
                </div>



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
    <script src="{{ asset('pl0ugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        let oldData = {

        }

        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($fieldData as $data)
                oldData[{{ $data->id }}] = {
                    'field_type': '{{ $data->field_type }}',
                    'label_name': '{{ $data->label_name }}',
                    'field_name': '{{ $data->field_name }}',
                };
            @endforeach
            console.log(oldData);
        });


        function addOldData(id, value) {
            oldData[id] = {
                'field_type': value[0],
                'label_name': value[1],
                'field_name': value[2],
            };
        }

        let myArray = [];

        function storeDataAndRemoveForm(fieldId) {
            console.log(fieldId);
            myArray.push(fieldId);
            console.log(myArray);
            $(this).closest('.form-container').remove();
        }

        function saveChanges() {
            let nextIncrement = {{ $nextIncrement }};
            let formContainer = document.querySelectorAll('.form-container');
            let promises = [];
            let hasError = false;

            formContainer.forEach(element => {
                const errorDiv = element.querySelectorAll('.error');
                errorDiv.forEach(err => {
                    err.classList.add('d-none');
                });

                if (element.classList.contains('old')) {
                    let id = element.id;
                    let oldFieldType = oldData[id].field_type;
                    let oldLabelName = oldData[id].label_name;
                    let oldFieldName = oldData[id].field_name;
                    let newFieldType = element.querySelector('#fieldType').value;
                    let newLabelName = element.querySelector('#labelName').value;
                    let newFieldName = element.querySelector('#fieldName').value;



                    if ((oldFieldType == 'number' && newFieldType != 'number') || (oldFieldType != 'number' &&
                            newFieldType == 'number')) {
                        let putPromise = axios.put(`/cms/SEO/${id}`, {
                                Field_Type: newFieldType,
                                Label_Name: newLabelName,
                                Field_Name: newFieldName,
                                data: "something"
                            }, {
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                            })
                            .then(response => {
                                console.log("field updated");
                            })
                            .catch(error => {
                                hasError = true;
                                handleAxiosError(error, element);
                            });

                        promises.push(putPromise);
                    } else if (oldLabelName != newLabelName || oldFieldName != newFieldName || (oldFieldType ==
                            'text' && newFieldType != 'text') || (oldFieldType == 'Textarea' && newFieldType !=
                            'Textarea') || (oldFieldType != 'text' && newFieldType == 'text') || (oldFieldType !=
                            'Textarea' && newFieldType == 'Textarea')) {
                        let putPromise = axios.put(`/cms/SEO/${id}`, {
                                Field_Type: newFieldType,
                                Label_Name: newLabelName,
                                Field_Name: newFieldName,
                                data: null,
                            }, {
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                            })
                            .then(response => {
                                console.log("field updated");
                            })
                            .catch(error => {
                                hasError = true;
                                handleAxiosError(error, element);
                            });

                        promises.push(putPromise);
                    }
                } else if (element.classList.contains('new')) {
                    let postPromise = axios.post("{{ route('cms.SEO.store') }}", {
                            Field_Type: element.querySelector('#fieldType').value,
                            Label_Name: element.querySelector('#labelName').value,
                            Field_Name: element.querySelector('#fieldName').value,
                        }, {
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            addOldData(nextIncrement, [element.querySelector('#fieldType').value, element
                                .querySelector('#labelName').value, element.querySelector('#fieldName')
                                .value
                            ]);
                            element.classList.remove('new');
                            element.classList.add('old');
                            element.setAttribute('id', nextIncrement);
                            nextIncrement = nextIncrement + 1;
                        })
                        .catch(error => {
                            hasError = true;
                            handleAxiosError(error, element);
                        });

                    promises.push(postPromise);
                }
            });

            if (myArray.length > 0) {
                myArray.forEach((data) => {
                    let deletePromise = axios.delete(`/cms/SEO/${data}`)
                        .then(response => {
                            console.log(response.data);
                        })
                        .catch(error => {
                            hasError = true;
                            console.error(error);
                        });

                    promises.push(deletePromise);
                });
            }

            Promise.all(promises)
                .then(() => {
                    // Redirect only if there are no errors
                    if (!hasError) {
                        localStorage.setItem("successMessage", "Field(s) updated successfully!");
                        window.location.href = "/cms/SEO";
                    }
                })
                .catch(error => {
                    console.error("Error during promise execution:", error);
                });
        }


        function handleAxiosError(error, element) {
            setTimeout(function() {
                if (error.response) {
                    if (error.response.status === 422 || error.response.status === 500) {
                        const errors = error.response.data.errors;
                        for (const key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                const errorMessage = errors[key][0];
                                showValidationErrors(key, errorMessage, element);
                                if(error.response.status === 500){
                            showValidationErrors("Field_Name","Field must be unique",element);
                        }
                            }
                        }
                        if(error.response.status === 500){
                            showValidationErrors("Field_Name","Field must be unique",element);
                        }
                    } else {
                        console.error('Error response data:', error.response.data);
                        console.error('Error response status:', error.response.status);
                        console.error('Error response headers:', error.response.headers);
                        showDeleteAlert(error.response.data.error, 'alert-danger');
                    }
                } else if (error.request) {
                    console.error('No response received:', error.request);
                    showDeleteAlert(error.response.data.error, 'alert-danger');
                } else {
                    console.error('Error message:', error.message);
                    showDeleteAlert(error.response.data.error, 'alert-danger');
                }
            }, 1000);
        }


        function showValidationErrors(fieldName, errorMessage, element) {
            console.log(fieldName);
            const errorDiv = element.querySelector('#' + fieldName + 'Error');
            if (errorDiv) {
                // Check if the error is due to a unique constraint violation
                    errorDiv.textContent = errorMessage;
                    errorDiv.classList.remove('d-none');
            } else {
                console.error(`Error div not found for key: ${fieldName}`);
            }
        }

        function showDeleteAlert(message, alertClass) {
            var deleteAlert = document.getElementById('deleteAlert');
            deleteAlert.textContent = message;
            deleteAlert.className = `alert ${alertClass}`;
            deleteAlert.classList.remove('d-none');

            setTimeout(function() {
                deleteAlert.classList.add('d-none');
            }, 5000);
        }




        function createAndAppendForm() {
            let newFormContainer = $('<div>').addClass('form-container p-5 m-2 new');

            let firstDivWrapper = $('<div>').addClass('d-flex flex-column bg-white form-card');
            let firstDiv = $('<div>').append($('<label>').text('Textfield Type ').append(
                '&nbsp;<span class="text-danger">*</span>'));
            let selectElement = $('<select>').addClass('select-style').attr('id', 'fieldType')
                .append($('<option>').val('text').text('Text'))
                .append($('<option>').val('number').text('Number'))
                .append($('<option>').val('Textarea').text('Textarea'));
            firstDiv.append(selectElement);
            firstDivWrapper.append(firstDiv);
            firstDiv.append($('<div>').addClass("text-danger error").attr("id", "Field_TypeError"));
            newFormContainer.append(firstDivWrapper);

            let secondDiv = $('<div>').addClass('form-card');
            secondDiv.append($('<label>').text('Label Name').append('&nbsp;<span class="text-danger">*</span>'));
            secondDiv.append(
                $('<input>').attr({
                    'type': 'text',
                    'name': 'labelName',
                    'class': 'form-control',
                    'id': 'labelName',
                    'placeholder': 'Label Name'
                })
            );
            secondDiv.append($('<div>').addClass("text-danger error").attr("id", "Label_NameError"));
            newFormContainer.append(secondDiv);

            let thirdDiv = $('<div>').addClass('form-card');
            thirdDiv.append($('<label>').text('Field Name').append('&nbsp;<span class="text-danger">*</span>'));
            thirdDiv.append(
                $('<input>').attr({
                    'type': 'text',
                    'name': 'fieldName',
                    'class': 'form-control',
                    'id': 'fieldName',
                    'placeholder': 'Field Name'
                })
            );
            thirdDiv.append($('<div>').addClass("text-danger error").attr("id", "Field_NameError"));
            newFormContainer.append(thirdDiv);

            let removeButtonDiv = $('<div>').addClass('d-flex align-items-center justify-content-center');
            let removeButton = $('<button>').html('<i class="fa fa-minus" aria-hidden="true"></i>').addClass(
                'btn btn-white border border-info border-2 rounded-circle');
            removeButtonDiv.append(removeButton);
            newFormContainer.append(removeButtonDiv);

            removeButton.on('click', function() {
                $(this).closest('.form-container').remove();
            });

            $('.form-container-wrapper').append(newFormContainer);
        }



        $(document).ready(function() {

            $('.form-container-wrapper').on('click', '.removeFormButton', function() {
                $(this).closest('.form-container').remove();
            });
        });
    </script>

    <script></script>


</body>

</html>
