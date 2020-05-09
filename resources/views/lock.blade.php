<?php
//require_once "pages/classes/class.classes.php";
//$user = new User();
//session_start();
//$get = $user->getUser($_SESSION['username']);
//if (!isset($_SESSION['username'])) {
//    $user->redirect('logout.php');
//}elseif (!isset($_COOKIE['lock']) & !isset($_SESSION['username'])) {
//    $user->redirect('logout.php');
//}elseif (!isset($_COOKIE['lock']) & isset($_SESSION['username'])) {
//    $user->redirect('pages/user/index.php');
//}
//
//?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="600; url=pages/include/inc.logout.php">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Enblar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style type="text/css">
        .error{
            color:#dc3545;
            color: red;
            font-weight: bold;
            font-size:14px;
            text-align: center;
        }
        .success{
            color:green;
            font-weight:500;
            font-size:14px;
        }
    </style>
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a style="color: red; font-weight: bolder;"><b>Session </b>Locked</a>
    </div>
    <!-- User name -->
{{--    <div class="lockscreen-name"><?php echo $get['username'];  ?>--}}
{{--        <br><span id="output"></span>--}}
{{--    </div>--}}

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="dist/img/user1-128x128.jpg" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->

        <form class="lockscreen-credentials" id="form">

            <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="password">
                <div class="input-group-append">
                    <button type="submit" id="submit" name="access" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Enter your password to retrieve your session
    </div>
    <div class="text-center">
        <a href="logout.php">Or sign in as a different user</a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2014-2019 <b><a href="http://adminlte.io" class="text-black">AdminLTE.io</a></b><br>
        All rights reserved by Engr. Faith
    </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript">
    $('#submit').click(function(e){
        e.preventDefault()
        $.ajax({
            type: "POST",
            url: "pages/include/inc.lockscreen.php",
            data: $('#form').serialize(),
            beforeSend: function(){
                $("#output").fadeOut();
                $("#output").html("<span class='success'>Checking...</span>");
            },
            success: function(output){
                if (output == "200") {
                    $("#output").fadeIn(1000, function(){
                        window.location.href = "pages/user/index.php";
                    })
                }else{
                    $("#output").fadeIn(1000, function(){
                        $("#output").html("<span class='error'>"+output+"</span>");
                    })
                }
            }
        })
    })
</script>
</body>
</html>
