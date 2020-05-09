@extends('layout.home')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @if(session()->has('success'))
        <script type="text/javascript">
            toastr.success("{{ session('success') }}");
        </script>
    @elseif(session()->has('error'))
        <script type="text/javascript">
            toastr.error("{{ session('error') }}");
        </script>
    @endif
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Register New Customer</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                            <li class="breadcrumb-item">Customer</li>
                            <li class="breadcrumb-item active">New Customer</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12 pl-md-5 pr-md-5">
                    <div class="card ">
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">Register New Customer</h3>--}}
{{--                            <div class="card-tools">--}}
{{--                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
{{--                                    <i class="fas fa-minus"></i></button>--}}
{{--                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">--}}
{{--                                    <i class="fas fa-times"></i></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <div class="mailbox-controls">
                            </div>
                            <form class="needs-validation" novalidate role="form" id="profileForm" method="post" action="{{ route('add.customer') }}">
                                <input type="hidden" name="_token" value="{{ @csrf_token() }}">
                                <div class="form-group row">
                                    <div class="col-sm-10 text-center">
                                        <span class=" " id="output_profile"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="full_name" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please Provide a valid Name
                                        </div>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('full_name')
                                        <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please Provide a valid Email
                                        </div>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('email')
                                        <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="phone" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please Provide a valid Phone Number
                                        </div>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('phone')
                                        <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Project Type</label>
                                    <div class="col-sm-9">
                                        <select name="project_type" class="form-control" style="width: 100%;" required>
                                            <option value="">Select a project type</option>
                                            <option value="Website Development">Website Development</option>
                                            <option value="Mobile Application">Mobile Application</option>
                                            <option value="Desktop Applications">Desktop Applications</option>
                                            <option value="Database Management">Database Management</option>
                                            <option value="Blockchain Development">Blockchain Development</option>
                                            <option value="Customer Support">Customer Support</option>
                                            <option value="Not Listed">Not Listed</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select a Project Type
                                        </div>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('project_type')
                                        <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" id="update_profile" class="btn btn-success">Register</button>
                                    </div>
                                </div>
                            </form>
                            <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function() {
                                    'use strict';
                                    window.addEventListener('load', function() {
                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        var forms = document.getElementsByClassName('needs-validation');
                                        // Loop over them and prevent submission
                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                            form.addEventListener('submit', function(event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    }, false);
                                })();
                            </script>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!--Add Modals -->

@endsection

