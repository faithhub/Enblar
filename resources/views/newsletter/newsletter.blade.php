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
                            <li class="breadcrumb-item active">Newsletter Details</li>
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
                        <a href="index.php" class="btn btn-primary btn-block mb-3">Back to Home page</a>

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
                                            <span class="badge bg-success float-right"></span>
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
                                <h3 class="card-title">Newsletter Details</h3>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-3">
                                <p><label>Subject</label>:&nbsp{{ $news->subject }}</p>
                                <p><label>Body</label>:&nbsp{{ $news->bodyMessage }}</p>
                                <p><label>Status</label>:&nbsp
                                    @if($news->status == 'sent')
                                    <span class="badge badge-success">{{ $news->status }}</span>
                                        @elseif($news->status == 'draft')
                                        <span class="badge badge-warning">{{ $news->status }}</span>
                                        @endif
                                </p>
                                <p><label>Date Sent</label>:&nbsp{{ $news->created_at }}</p>
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

