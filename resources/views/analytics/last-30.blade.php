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
                        <section class="">
                            <div class="card">
                                <h2 style="margin-left:8px; margin-top:5px">Last 30 days analytics</h2>
                                <iframe width="804" height="416.4475" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSBG5zpJpILdRkQmY1X-JysUW1mm5oNjkv7dgzeqngwKDpsKeDujzWzffhq8wIBVA2jgqt8rZoVZBkk/pubchart?oid=565538918&amp;format=interactive"></iframe>
                                </iframe>

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
    <!--Add Modals -->

@endsection

