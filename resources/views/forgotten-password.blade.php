<html>
@extends('layout.gateway')
@section('content')
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3" style="margin-top: 5%; margin-bottom: 5%">
                <h1 class="text-center">User Login</h1>
                <div class="card">
                    <div class="card-body p-md-5 bg-light">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ url('forgotten-password') }}" method="post" id="form" data-parsley-validate>
                            <input type="hidden" name="_token" value="{{ @csrf_token() }}">
                            <div class="form-group row">
                                <label for="colFormLabelLg">Enter your Email</label>
                                <input type="email" name="email" data-parsley-required placeholder="Email" value="{{ old('username') }}" class="form-control form-control-lg">
                                @error('email')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <button type="submit" id="submit" class="btn btn-dark  btn-block btn-lg">Login</button>
                            </div>
                            <p>Click <a href="{{ URL::to('login') }}">here</a> to login  </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
</html>
