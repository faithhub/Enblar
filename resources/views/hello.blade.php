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
        <h1>Welcome Faith Oluwadara Olaoluwa</h1>
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
                <tr>
                    <td>1</td>
                    <td>Adebayo Oluwadara</td>
                    <td>Adebayooluwadara@gmail.com</td>
                    <td>{{date('Y-m-d')}}</td>
                </tr>
                </thead>
            </table>
    </div>
</body>
</html>
