<!DOCTYPE html>
<html lang="en" dir="rtl" >
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {{ Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') }}
        {{ Html::style('admin/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}
        {{ Html::style('admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}
        {{ Html::style('admin/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') }}
        {{ Html::style('admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') }}
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        {{ Html::style('admin/assets/global/css/components-md-rtl.min.css') }}
        {{ Html::style('admin/assets/global/css/plugins-md-rtl.min.css') }}

        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        {{ Html::style('admin/assets/layouts/layout2/css/layout-rtl.min.css') }}
        {{ Html::style('admin/assets/layouts/layout2/css/themes/blue-rtl.min.css') }}
        {{ Html::style('admin/assets/layouts/layout2/css/custom-rtl.min.css') }}
        <link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">
        <!-- END THEME LAYOUT STYLES -->
        <style>
        .table, .page-bar .page-breadcrumb, form{
                direction: rtl;
            }
        .x-remove{
            left: 40px ;
        }   
        *{
            font-family: 'Changa';
        } 
        </style>
        <link rel="shortcut icon" href="favicon.ico" /> 
        @yield('style')
        
    </head>
        
    <!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        {{ Html::image('admin/assets/layouts/layout2/img/logo-default.png',null,['class'=>'logo-default'])}}
                        {{-- <img src="./" alt="logo" class="">  --}}
                    </a>    
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                                <li class="dropdown dropdown-extended dropdown-notification"  id="header_notification_bar" >
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true">
                                        <i class="icon-bell"></i>
                                        <span class="badge badge-default">
                                        {{ \App\Model\Admin\AdminNotification::where('status','0')->count() }}</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="slimScrollDiv" style="position: relative; overflow: scroll; width: auto; height: 250px;">
                                                    <ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                                        @foreach(\App\Model\Admin\AdminNotification::orderBy('created_at','desc')->get() as $noti)
                                                        <li onclick="notifiction(event,{{ $noti->id }})">
                                                            <a href="{{ url($noti->body->link) }}">
                                                            <span class="time">{{ $noti->created_at->diffForHumans() }}</span>
                                                            <span class="details">{!! $noti->body->message !!}</span>
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </li>
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="./assets/layouts/layout2/img/avatar3_small.jpg">
                                    <span class="username username-hide-on-mobile"> {{ auth()->guard('admin')->user()->name}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{ url('/admin/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> خروج </a>
                                        </a>

                                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/profile') }}"
                                            >
                                            <i class="fa fa-cogs"></i> بروفيلي</a>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start @if(\Request::is('admin/home*')) {{'active'}} @endif ">
                            <a href="{{ url('admin/home') }}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">احصائيات</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item start @if(\Request::is('admin/settings*')) {{'active'}} @endif ">
                            <a href="{{ url('admin/settings') }}" class="nav-link nav-toggle">
                                <i class="fa fa-cogs"></i>
                                <span class="title">اعدادات الموقع</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        @if (auth()->guard('admin')->user()->pre)
                            
                        <li class="nav-item start @if(\Request::is('admin/admins*')) {{'active'}} @endif ">
                            <a href="{{ url('admin/admins') }}" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">المديرين</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item start @if(\Request::is('admin/users*')) {{'active'}} @endif ">
                            <a href="{{ url('admin/users') }}" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">الاعضاء</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item start @if(\Request::is('admin/products*')) {{'active'}} @endif ">
                            <a href="{{ url('admin/products') }}" class="nav-link nav-toggle">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>


                                <span class="title">المنتجات</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item start @if(\Request::is('admin/orders*')) {{'active'}} @endif ">
                            <a href="{{ url('admin/orders') }}" class="nav-link nav-toggle">
                                <i class="fa fa-truck"></i>
                                <span class="title">الطلبات</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li>
                                    <a href="{{ url('admin/orders/pending')}}">
                                    {{-- <i class="fa fa-user"></i> --}}
                                    طلبات معلقه</a>
                                </li>
                                <li >
                                    <a href="{{ url('admin/orders/processing')}}">
                                    جاهز للشحن</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/orders/shipping')}}">
                                    
                                    مشحون</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/orders/delivered')}}">
                                    
                                    تم التوصيل</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/orders/canceled')}}">
                                    
                                    تم إلغائه</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/orders/canceled-user')}}">
                                    
                                    إسترجاع الطلب</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/orders/undelivered')}}">
                                    
                                    عدم نجاح التوص</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item start @if(\Request::is('admin/contacts*')) {{ 'active'}} @endif ">
                            <a href="{{ url('admin/contacts') }}" class="nav-link nav-toggle">
                                <i class="fa fa-comment-o"></i>
                                <span class="title">الرسائل</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item start @if(\Request::is('admin/print-orders*')) {{'active'}} @endif ">
                            <a href="{{ url('admin/print-orders') }}" class="nav-link nav-toggle">
                                <i class="fa fa-paint-brush"></i>
                                <span class="title">طلبات الطباعه</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item start @if(\Request::is('admin/print-images*')) {{'active'}} @endif ">
                            <a href="{{ url('admin/print-images') }}" class="nav-link nav-toggle">
                                <i class="fa fa-picture-o"></i>
                                <span class="title">صور للطباعه</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item start @if(\Request::is('admin/discount-codes*')) {{'active'}} @endif ">
                            <a href="{{ url('admin/discount-codes') }}" class="nav-link nav-toggle">
                                <i class="fa fa-university"></i>
                                <span class="title">أكواد الخصم</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item start @if(\Request::is('admin/tax*')) {{'active'}} @endif ">
                            <a href="{{ url('admin/tax') }}" class="nav-link nav-toggle">
                                <i class="fa fa-money"></i>
                                <span class="title">الشحن</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height:128px">
                    <!-- BEGIN PAGE HEADER-->
                    @yield('content')

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- BEGIN CORE PLUGINS -->
        {{ Html::script('admin/assets/global/plugins/jquery.min.js') }}
        {{ Html::script('admin/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}
        {{ Html::script('admin/assets/global/plugins/js.cookie.min.js') }}
        {{ Html::script('admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}
        {{ Html::script('admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
        {{ Html::script('admin/assets/global/plugins/jquery.blockui.min.js') }}
        {{ Html::script('admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {{ Html::script('admin/assets/global/scripts/app.min.js') }}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        
        {{ Html::script('admin/assets/layouts/layout2/scripts/layout.min.js') }}
        {{ Html::script('admin/assets/layouts/layout2/scripts/demo.min.js') }}

        {{ Html::script('admin/assets/layouts/global/scripts/quick-sidebar.min.js') }}
        <!-- END THEME LAYOUT SCRIPTS -->
        @yield('script')
        <script type="text/javascript">
            function notifiction(event,id) {
                $.get('{{ url("admin/showNotification") }}/'+id,function(response){
                    console.log(response);
                });
            }

        </script>
</body>

</html>