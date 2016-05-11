<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$pageTitle}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <!--link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700&subset=vietnamese' rel='stylesheet' type='text/css'-->
    <link rel="stylesheet" href="{{ url('vendors/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/bootstrap/css/bootstrap.min.css') }}">
    <!--Loading style vendors-->
    <link rel="stylesheet" href="{{ url('vendors/animate.css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/iCheck/skins/all.css') }}">
    <!--Loading style-->
    <link rel="stylesheet" href="{{ url('css/themes/style1/zvinhtq.css') }}" class="default-style">
    <link rel="stylesheet" href="{{ url('css/style-responsive.css') }}">
    <script type="text/javascript" src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery-ui.js') }}"></script>
    <!--loading bootstrap js-->
    <script type="text/javascript" src="{{ url('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/respond.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/iCheck/custom.min.js') }}"></script>
</head>
<body id="signin-page">
<div class="page-form">
    <div class="header-content">
        <h1>Đăng nhập</h1>
    </div>
    <div class="body-content">
        {!! Form::open(['url'=>'/signin', 'class'=>'form-horizontal form-validate']) !!}
        <div class="form-group">
            <div class="input-icon right"><i class="fa fa-user"></i>
                <input type="text" placeholder="Username" name="username" class="form-control" autofocus>
            </div>
        </div>
        <div class="form-group">
            <div class="input-icon right"><i class="fa fa-key"></i>
                <input type="password" placeholder="Password" name="password" class="form-control">
            </div>
        </div>
        <div class="form-group pull-center">
            <button type="submit" class="btn btn-success">Đăng Nhập &nbsp;<i class="fa fa-chevron-circle-right"></i>
            </button>
        </div>
        <div class="clearfix"></div>
        {!! Form::close() !!}
    </div>
</div>
</body>
</html>