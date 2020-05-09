
@extends('layout.home')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Analytics</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item ">Analytics</li>
                            <li class="breadcrumb-item active">Last 7 days</li>
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
                        <section class="col-lg-9 connectedSortable ui-sortable">
                            <div class="card">
                                <h2 style="margin-left:8px; margin-top:5px">Last 7 days analytics</h2>
                                <iframe width="600" height="371" seamless="" frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSBG5zpJpILdRkQmY1X-JysUW1mm5oNjkv7dgzeqngwKDpsKeDujzWzffhq8wIBVA2jgqt8rZoVZBkk/pubchart?oid=279897215&amp;format=interactive"></iframe>
                            </div>
                        </section>
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

