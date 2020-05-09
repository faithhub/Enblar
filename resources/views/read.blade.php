<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<div class="container">
    <h1>Welcome Faith Oluwadara Olaoluwa {{ session()->get('username') }}</h1>
    <div class="row">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a href="{{ URL::to('home') }}" class="nav-link">Home</a>
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
            </li> <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link">Logout</a>
            </li>
        </ul>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
        <?php $cn = 1 ?>
        @foreach ($data as $item)
            <tr>
                <td>{{ $cn }}</td>
                <td>{{$item['username']}}</td>
                <td>{{$item['email']}}</td>
                <td>{{$item['created_at']}}</td>
            </tr>
            <?php ++$cn ?>
        @endforeach
        </thead>
    </table>
</div>
</body>
</html>
