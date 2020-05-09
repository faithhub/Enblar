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
                            <li class="breadcrumb-item active">Add Newsletter</li>
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
                                <h3 class="card-title">Compose Newsletter</h3>
                            </div>
                            <!-- /.card-header -->
                            <form class="needs-validation" novalidate role="form" method="post" id="form" action="{{ url('sent-newsletter') }}">
                                @csrf
                                <div class="card-body">
                                        <div class="p-2 text-center" id="output"></div>
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" value="{{ old('subject') }}" name="subject" class="form-control" placeholder="Subject:" required>
                                            <div class="invalid-feedback">
                                                Please Provide a Subject for this Message
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            @error('subject')
                                            <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Body</label>
                                          <textarea name="bodyMessage" class="form-control" style="height: 200px"></textarea>
                                            @error('body')
                                            <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="card-body table-responsive p-0" style="height: 200px;">
                                                <div class="mailbox-controls">

                                                    <label>Emails</label><br>
                                                    <!-- Check all button -->
                                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                                    </button> Check All<br>
                                                    @error('email')
                                                    <span style="color: red;">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="table-responsive mailbox-messages">
                                                    <table class="table table-hover table-striped">
                                                        <tbody>
                                                        <?php $sn = 1 ?>
                                                        @foreach($data as $item)
                                                            <tr>
                                                                <td>
                                                                    <div class="icheck-primary">
                                                                        <input name="email[]" type="checkbox" value="{{$item->email}}" id="check{{$sn}}" required>
                                                                        <label for="check{{$sn}}"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="mailbox-star"><a href="#"><i class="fas fa-star text-success"></i></a></td>
                                                                <td class="mailbox-name"><a><b>{{ $item->email }}</b></a></td>
                                                                <td class="mailbox-subject">{{ $item->created_at }}</td>
                                                            </tr>
                                                            <?php $sn++ ?>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <!-- /.table -->
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <!-- <button type="button" id="draft" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> -->
                                        <button type="submit" name="status" value="sent" id="send" class="btn btn-success"><i class="far fa-envelope"></i> Send</button>
                                        <button type="submit" name="status" value="draft" id="send" class="btn btn-primary"><i class="far fa-file-alt"></i> Draft</button>
                                    </div>
                                    <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                                </div>
                            </form>
                            <!-- /.card-footer -->
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
            //Add text editor
            $('#compose-textarea').summernote()
        })
    </script>
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
        // $('#selectAll').click(function ( ) {
        //     $('Input:checkbox').not(this).prop('checked', this.checked);
        // })
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
    </script>

@endsection

