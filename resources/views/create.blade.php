<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

{{--    <style>--}}
{{--        html, body {--}}
{{--            background-color: #fff;--}}
{{--            color: #636b6f;--}}
{{--            font-family: 'Nunito', sans-serif;--}}
{{--            font-weight: 200;--}}
{{--            height: 100vh;--}}
{{--            margin: 0;--}}
{{--            padding-left: 40px;--}}
{{--            padding-right: 40px;--}}
{{--        }--}}

{{--        .full-height {--}}
{{--            height: 100vh;--}}
{{--        }--}}

{{--        .flex-center {--}}
{{--            align-items: center;--}}
{{--            display: flex;--}}
{{--            justify-content: center;--}}
{{--        }--}}

{{--        .position-ref {--}}
{{--            position: relative;--}}
{{--        }--}}

{{--        .top-right {--}}
{{--            position: absolute;--}}
{{--            right: 10px;--}}
{{--            top: 18px;--}}
{{--        }--}}

{{--        .content {--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        .title {--}}
{{--            font-size: 84px;--}}
{{--        }--}}

{{--        .links > a {--}}
{{--            color: #636b6f;--}}
{{--            padding: 0 25px;--}}
{{--            margin: 5px;--}}
{{--            font-size: 13px;--}}
{{--            font-weight: 600;--}}
{{--            letter-spacing: .1rem;--}}
{{--            text-decoration: none;--}}
{{--            text-transform: uppercase;--}}
{{--        }--}}

{{--        .m-b-md {--}}
{{--            margin-bottom: 30px;--}}
{{--        }--}}
{{--    </style>--}}
    <style>
        .error-class{
            border: 2px solid red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome Faith Oluwadara Olaoluwa</h1>
        <div class="row">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a href="{{ URL::to('hello') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('create') }}" class="nav-link">Create User</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Update User</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Delete User</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">All User</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Send Mail</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3">
                <h3 class="text-center">Add New User</h3>
                <form action="{{ route('create') }}" method="post">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" class="form-control">
                        @error('first_name')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" class="form-control">
                        @error('last_name')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control">
                        @error('email')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" class="form-control">
                        @error('phone')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-control">
                            <option value="Complete">Complete</option>
                            <option value="Pending">Pending</option>
                        </select>
                        @error('status')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-block btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
