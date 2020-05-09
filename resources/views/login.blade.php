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
                    <form class="needs-validation" novalidate role="form" action="{{ URL::to('login') }}" method="post" id="form" data-parsley-validate>
                        <input type="hidden" name="_token" value="{{ @csrf_token() }}">
                        <div class="form-group row">
                            <label for="colFormLabelLg">Username</label>
                            <input type="text" name="username" required placeholder="First Name" value="{{ old('username') }}" class="form-control form-control-lg">
                            <div class="invalid-feedback">
                                Please Provide a valid Username
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @error('username')
                            <span style="color: red;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelLg" >Password</label>
                            <input type="password" name="password" required placeholder="********" class="form-control form-control-lg" placeholder="col-form-label-lg">
                            <div class="invalid-feedback">
                                Please Provide a Password
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @error('password')
                            <span style="color: red;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <button type="submit" id="submit" class="btn btn-dark  btn-block btn-lg">Login</button>
                        </div>
                        <p>Didn't have an account <a href="{{ URL::to('register') }}">Sign up here</a> </p>
                        <p><a href="{{ URL::to('forgotten-password') }}">Forgotten Password</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
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
</script>
@endsection
</html>
