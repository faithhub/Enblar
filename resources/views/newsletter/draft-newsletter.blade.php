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
                        <h1>Newsletter</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item ">Newsletter</li>
                            <li class="breadcrumb-item active">All Drafted Newsletters</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ url('index') }}" class="btn btn-primary btn-block mb-3">Back to Home page</a>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Folders</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('sent-newsletter') }}" class="nav-link">
                                            <i class="far fa-envelope"></i> New
                                            <span class="badge bg-primary float-right"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('all-newsletters') }}" class="nav-link">
                                            <i class="far fa-envelope"></i> All
                                            <span class="badge bg-primary float-right">{{ $all }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('sent-newsletters') }}" class="nav-link">
                                            <i class="far fa-envelope"></i> Sent
                                            <span class="badge bg-success float-right">{{ $sent }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('draft-newsletter') }}" class="nav-link">
                                            <i class="far fa-file-alt"></i> Drafts
                                            <span class="badge bg-warning float-right">{{ $draft }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">All Drafted Newsletters</h3>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->

                            <div class="card-footer p-0">
                                <div class="mailbox-controls">
                                    <!-- Check all button -->
                                    <button type="button" title="Check All" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" title="Delete" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                    <!-- /.float-right -->
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive mailbox-messages">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>
                                                ##
                                            </th>
                                            <th>
                                                Subject
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Date Created
                                            </th>
                                            <th style="width: 5%">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $cn = 1 ?>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="mailbox-star" ><a href="#">
                                                        @if($item['status'] == 'sent')
                                                            <i class="fas fa-star text-success"></i>
                                                        @elseif($item['status'] == 'draft')
                                                            <i class="fas fa-star text-warning"></i>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="mailbox-name"><a href="{{ url('drafts/'.$item->id) }}" ><b>{{$item['subject']}}</b></a></td>
                                                <td >
                                                    @if($item['status'] == 'sent')
                                                        <span class="badge badge-success">Sent</span>
                                                    @elseif($item['status'] == 'draft')
                                                        <span class="badge badge-warning">Draft</span>
                                                    @endif
                                                </td>
                                                <td >
                                                    {{$item['created_at']}}
                                                </td>
                                                <td>
                                                    <a data-toggle="modal" data-target=".modal-add{{ $item->id }}" href=""><i class="fas fa-trash-alt text-danger"></i></a>
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
                                                            <h3>Are you sure you want to delete this Newsletter?</h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                            <a href="{{ url('deleteNewsletter/'.$item->id) }}" class="btn btn-success">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php ++$cn ?>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>
                                                ##
                                            </th>
                                            <th>
                                                Subject
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Date Created
                                            </th>
                                            <th style="width: 5%">
                                                Action
                                            </th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <!-- /.table -->
                                </div>
                                <!-- /.mail-box-messages -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        $(function () {
            //Enable check and uncheck all functionality
            $('.checkbox-toggle').click(function () {
                var clicks = $(this).data('clicks')
                if (clicks) {
                    //Uncheck all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                    $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
                } else {
                    //Check all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                    $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
                }
                $(this).data('clicks', !clicks)
            })
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

