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
                        <h1>Email</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                            <li class="breadcrumb-item ">Email</li>
                            <li class="breadcrumb-item active">All Emails</li>
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
                            <h3 class="card-title">Email Data Table</h3>
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
                                <a class="btn btn-success float-left" href="{{ url('add-email') }}"> Add New Email</a>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Email Address
                                    </th>
                                    <th>
                                        Created at
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $cn = 1 ?>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $cn }}</td>
                                        <td>{{$item['email']}}</td>
                                        <td>{{$item['created_at']}}</td>
                                        <td>
                                           <a href="" data-toggle="modal" data-target=".modal-edit{{ $item->id }}" title="Edit"><i class="fa fa-edit p-2" style="color: green"></i></a>
                                           <a href="" data-toggle="modal" data-target=".modal-add{{ $item->id }}" title="Delete"><i class="fa fa-trash" style="color: darkred"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Delete Modal-->
                                    <div class="modal fade modal-add{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-md-sm">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Email</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Are you sure you want to delete this Email?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <a href="{{ url('delete-email/'.$item->id) }}" class="btn btn-success">Yes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Modal -->
                                    <div class="modal fade modal-edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-md-sm">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Email</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="needs-validation" novalidate role="form" method="post" action="{{ url('edit-email/'.$item->id) }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label>Email</label>
                                                        <input type="email" required name="email" value="{{ $item->email }}" class="form-control">
                                                        @error('email')
                                                        <span style="color: red;">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php ++$cn ?>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <th>
                                    #
                                </th>
                                <th>
                                    Email Address
                                </th>
                                <th>
                                    Created at
                                </th>
                                <th style="width: 8%" class="text-center">
                                    Action
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
