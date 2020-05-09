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
                        <h1>Customer</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                            <li class="breadcrumb-item ">Customer</li>
                            <li class="breadcrumb-item active">All Customers</li>
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
                            <h3 class="card-title">All Customers Data Table</h3>
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
                                <a class="btn btn-success float-left" href="{{ url('new-customer') }}"> Add New Customer</a>

                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 15%">
                                        Full Name
                                    </th>
                                    <th style="width: 15%">
                                        Email Address
                                    </th>
                                    <th style="width: 15%">
                                        Phone Number
                                    </th>
                                    <th style="width: 8%">
                                        Status
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        View
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                 <?php $cn = 1 ?>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $cn }}</td>
                                        <td>{{$item['full_name']}}</td>
                                        <td>{{$item['email']}}</td>
                                        <td>{{$item['phone']}}</td>
                                        <td>
                                            @if($item['status'] == '1')
                                                <span class="badge badge-success">Completed</span>
                                                @else
                                                <span class="badge badge-warning">Pending</span>
                                                @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('view-customer/'.$item->id) }}" title="View"><i class="fa fa-eye fa-1x p-2" style="color: green"></i></a>
                                            <a href="" data-toggle="modal" data-target=".modal-add{{ $item->id }}" title="Delete"><i class="fa fa-trash" style="color: darkred"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Delete Modal-->
                                    <div class="modal fade modal-add{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-md-sm">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Customer</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Are you sure you want to delete this customer?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <a href="{{ url('delete-customer/'.$item->id) }}" class="btn btn-success">Yes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            <?php ++$cn ?>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 15%">
                                    Full Name
                                </th>
                                <th style="width: 15%">
                                    Email Address
                                </th>
                                <th style="width: 15%">
                                    Phone Number
                                </th>
                                <th style="width: 8%">
                                    Status
                                </th>
                                <th style="width: 8%" class="text-center">
                                    View
                                </th>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
