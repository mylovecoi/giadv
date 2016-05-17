<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$pageTitle}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <link rel="shortcut icon" href="{{ url('vendors/pageloader/images/loader4.GIF')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ url('vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/bootstrap/css/bootstrap.min.css') }}">
    <!--LOADING STYLESHEET FOR PAGE-->
    @yield('custom-style')
    <!--Loading style vendors-->
    <link rel="stylesheet" href="{{ url('vendors/animate.css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/jquery-pace/pace.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/iCheck/skins/all.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/jquery-notific8/jquery.notific8.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/bootstrap-daterangepicker/daterangepicker-bs3.css') }}">
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
    <script type="text/javascript" src="{{ url('vendors/metisMenu/jquery.metisMenu.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/slimScroll/jquery.slimscroll.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/jquery-cookie/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/iCheck/custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/jquery-notific8/jquery.notific8.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/jquery-highcharts/highcharts.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery.menu.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/jquery-pace/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/holder/holder.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/responsive-tabs/responsive-tabs.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/jquery-news-ticker/jquery.newsTicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/moment/moment.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bgt/delete-hacking-scripts.js') }}"></script>
    <script type="text/javascript" src="{{ url("js/jquery.maskMoney.js") }}"></script>
    <!--CORE JAVASCRIPT-->
    <script type="text/javascript" src="{{ url('js/main.js') }}"></script>
    <!--LOADING SCRIPTS FOR PAGE-->
    @yield('custom-script')
</head>
<body class="header-fixed">
<div>
    <!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </button>
                <a id="logo" href="{{url('')}}" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">LIFESOFT</span><span style="display: none" class="logo-text-icon"><i class="fa fa-home"></i></span></a> </div>
            <div class="topbar-main"> <a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                <ul  class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle">
                        <img src="{{url('/images/avatar/default-user.png')}}" alt="" class="img-responsive img-circle"/>&nbsp;
                        <span class="hidden-xs">{{session('admin')->name}}</span>&nbsp;
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="{{url('user/cp')}}"><i class="fa fa-key"></i>Đổi mật khẩu</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!--END TOPBAR-->
    <div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">

                    <li> <a href="{{url('')}}"> <i class="fa fa-desktop fa-fw"></i> <span class="menu-title">Màn hình tổng quan</span> </a> </li>

                    <!--Quản lý dịch vụ lưu trú-->
                    @if(can('dvlt','index'))
                    <li id="navdvlt"><a href="{{url('')}}"><i class="fa fa-desktop fa-fw"></i><span class="menu-title">Dịch vụ lưu trú</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            @if(session('admin')->level=='H' || session('admin')->level == 'X')
                            <li><a href="{{url('ttdndvlt')}}"><i class="fa fa-user fa-fw"></i><span class="submenu-title">Thông tin doanh nghiệp</span></a></li>
                            <li><a href="{{url('ttcskddvlt')}}"><i class="fa fa-user fa-fw"></i><span class="submenu-title">Thông tin cơ sở kinh doanh</span></a></li>
                            <li><a href="{{url('kkgdvlt/show')}}"><i class="fa fa-user fa-fw"></i><span class="submenu-title">Kê khai giá dịch vụ lưu trú</span></a> </li>
                            @endif
                            @if(session('admin')->level == 'T')
                            <li><a href="{{url('xetduyetkkgdvlt')}}"><i class="fa fa-user fa-fw"></i><span class="submenu-title">Xét duyệt kê khai giá dịch vụ lưu trú</span></a> </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    <!--End Quản lý-->

                    <!--Quản lý dịch vụ vận tải-->
                    @if(can('dvvt','index'))
                    <li id="navdvlt"><a href="{{url('')}}"><i class="fa fa-desktop fa-fw"></i><span class="menu-title">Dịch vụ vận tải</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('dvvantai/dvxekhach')}}"><i class="fa fa-th-list"></i><span class="submenu-title">Danh mục dịch vận tải hành khách bằng xe khách</span></a> </li>
                            <li><a href="{{url('dvvantai/kkdvxk')}}"><i class="fa fa-car"></i><span class="submenu-title">Kê khai giá dịch vụ vận tải hành khách bằng xe khách</span></a> </li>
                            <li><a href="{{url('dvvantai/dvxb/danhmuc')}}"><i class="fa fa-th-list"></i><span class="submenu-title">Danh mục dịch vận tải hành khách bằng xe buýt</span></a> </li>
                            <li><a href="{{url('dvvantai/dvxb/kekhai')}}"><i class="fa fa-ambulance"></i><span class="submenu-title">Kê khai giá dịch vụ vận tải hành khách bằng xe buýt</span></a> </li>
                            <li><a href="{{url('dvvantai/dvxtx/danhmuc')}}"><i class="fa fa-th-list"></i><span class="submenu-title">Danh mục dịch vận tải hành khách bằng xe taxi</span></a> </li>
                            <li><a href="{{url('dvvantai/dvxtx/kekhai')}}"><i class="fa fa-taxi"></i><span class="submenu-title">Kê khai giá dịch vụ vận tải hành khách bằng xe taxi</span></a> </li>
                            <li><a href="{{url('dvvantai/dvkhac/danhmuc')}}"><i class="fa fa-th-list"></i><span class="submenu-title">Danh mục dịch vận tải chở hàng</span></a> </li>
                            <li><a href="{{url('dvvantai/dvkhac/kekhai')}}"><i class="fa fa-truck"></i><span class="submenu-title">Kê khai giá dịch vụ vận tải chở hàng</span></a> </li>
                        </ul>
                    </li>
                    @endif
                    <!--End Quản lý dịch vụ vận tải-->

                    <!--Báo cáo thống kê-->
                    @if(session('admin')->level == 'T')
                    <li id="navbaocao"><a href="{{url('')}}"><i class="fa fa-file fa-fw"></i><span class="menu-title">Báo cáo tổng hợp</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('reports/dvlt')}}"><i class="fa fa-user fa-fw"></i><span class="submenu-title">Dịch vụ lưu trú</span></a></li>

                        </ul>
                    </li>
                    @endif
                    <!--End Báo cáo thống kê-->

                    <!--Quản trị hệ thống-->
                    @if(session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa')
                    <li id="navhethong"><a href="{{url('')}}"><i class="fa fa-gears fa-fw"></i><span class="menu-title">Quản trị hệ thống</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('dndvlt')}}"><i class="fa fa-user fa-fw"></i><span class="submenu-title">Danh sách doanh nghiệp cung cấp dịch vụ lưu trú</span></a></li>
                            <li><a href="{{url('dvvantai/donvi')}}"><i class="fa fa-user fa-fw"></i><span class="submenu-title">Danh sách doanh nghiệp cung cấp dịch vụ vận tải</span></a></li>
                            <li><a href="{{url('user')}}"><i class="fa fa-user fa-fw"></i><span class="submenu-title">Quản lý tài khoản</span></a> </li>
                            <li><a href="{{url('general')}}"><i class="fa fa-user fa-fw"></i><span class="submenu-title">Cấu hình hệ thống</span></a> </li>

                        </ul>
                    </li>

                    @endif
                    <!--End Quản trị hệ thống-->


                </ul>
            </div>
        </nav>
        <!--END SIDEBAR MENU-->
        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <ol class="breadcrumb page-breadcrumb pull-left mln">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('')}}">Trang chủ</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">{{$pageTitle}}</li>
                </ol>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li class="btn btn-info btn-xs mbs">
                        <?php $now = getdate();?>
                        <i class="fa fa-calendar"></i>&nbsp;<b>
                            Ngày {{$now["mday"]}} tháng {{$now["mon"]}} năm {{$now["year"]}} - {{$now["hours"]}} : {{$now["minutes"]}}
                           </b>&nbsp;&nbsp;
                    </li>

                </ol>
                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE-->
            <!--BEGIN CONTENT-->
            @yield('content')
            <!--END CONTENT-->
        </div>
        <!--BEGIN FOOTER-->
        <div id="footer">
            <div class="copyright">2016 © LifeSoft - Tiện ích hơn - Hiệu quả hơn</div>
        </div>
        <!--END FOOTER--><!--END PAGE WRAPPER-->
    </div>
</div>
</body>
</html>