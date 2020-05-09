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
                            <h1 class="active">Customer</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                                <li class="breadcrumb-item ">Customer</li>
                                <li class="breadcrumb-item active">View Customers</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Customers Details</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button data-toggle="modal" data-target=".modal-add{{ $data->id }}" class="btn btn-success float-left">Update Status</button>
                                <!-- Status Modal-->
                                <div class="modal fade modal-add{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-md-sm">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Status Update</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{ url('update-status/'.$data->id) }}">
                                                @csrf
                                                <div class="modal-body">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="1" @if($data->status == '1') {{'selected="selected"'}} @endif>Completed</option>
                                                            <option value="0" @if($data->status == '0') {{'selected="selected"'}} @endif>Pending</option>
                                                        </select>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Project Type</th>
                                    <th>Payment History</th>
                                    <th>Date Reg</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $data->full_name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>
                                        @if($data->status == '1')
                                            <span class="badge badge-success">Completed</span>
                                        @else
                                            <span class="badge badge-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $data->project_type }}</td>
                                    <td>{{ $data->project_history }}</td>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </section>

    </div>
    @endsection
