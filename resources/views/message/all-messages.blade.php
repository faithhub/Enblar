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
                        <h1>Messages</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item ">Messages</li>
                            <li class="breadcrumb-item active">All Messages</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 10%">
                                    Full Name
                                </th>
                                <th style="width: 20%">
                                    Email Address
                                </th>
                                <th style="width: 8%">
                                    Date Sent
                                </th>
                                <th style="width: 2%" class="text-center">
                                    Action
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
                                    <td>{{$item['created_at']}}</td>
                                    <td>
                                        <a href="{{ url('message/'.$item->id) }}" title="View"><i class="fa fa-eye fa-1x p-2" style="color: green"></i></a>
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
                                                <h3>Are you sure you want to delete this Message?</h3>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <a href="{{ url('delete-message/'.$item->id) }}" class="btn btn-success">Yes</a>
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
                            <th style="width: 10%">
                                Full Name
                            </th>
                            <th style="width: 20%">
                                Email Address
                            </th>
                            <th style="width: 8%">
                                Date Sent
                            </th>
                            <th style="width: 2%" class="text-center">
                                Action
                            </th>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        $(function() {
            //Add text editor
            $('#compose-textarea').summernote()
        })

        $('#send').click(function(e) {
            e.preventDefault();
            var form = $('#form')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "../include/inc.newsletter.php",
                data: data,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $("#output").fadeOut();
                    $("#output").html("<span class='success' style='color:green; font-weight:bold'>Checking...</span>");
                },
                success: function(output) {
                    if (output == "200") {
                        $("#output").fadeIn(3000, function() {
                            alert("Message successfully sent.");
                            window.location.reload();
                            // $("#updateProfile")[0].reset();
                        })
                    } else {
                        $("#output").fadeIn(3000, function() {
                            $("#output").html("<span style='color:red; font-weight:bold'>" + output + "</span>");
                        })
                    }
                }
            })
        })
    </script>
    <!--Add Modals -->

@endsection

