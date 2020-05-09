<!DOCTYPE html>
<html lang="en" xmlns:margin-top="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enblar</title>
    <link rel="stylesheet" href="{{ asset('css/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

    <style>
        label{
            font-size: 18px;
            font-weight: bold;
        }
    </style>
    <script>
            @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                {{--alert("{{ Session::get('message') }}");--}}
                toastr.error("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.fire("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
</head>
@yield('content')
<script type="text/javascript" scr="{{ asset('js/parsley.js') }}"></script>
<script type="text/javascript" scr="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" scr="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" scr="{{ asset('toastr/toastr.min.js') }}"></script>
{{----}}
</html>

