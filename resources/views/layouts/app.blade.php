<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.1.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->


@include('layouts.inc._head')
@stack('css')
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->

<body class="page-header-fixed page-quick-sidebar-over-content ">
    @include('modals.showMessage')

    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo">

                <a href="index.html">
                    {{-- <img src="/assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/> --}}
                </a>
                <div class="sidebar-toggler-wrapper">
                    <div class="menu-toggler sidebar-toggler ">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                data-target=".navbar-collapse">
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default">
                                7 </span>
                        </a>
                        {{-- <ul class="dropdown-menu"> --}}
                        {{-- <li class="external"> --}}
                        {{-- <h3><span class="bold">12 pending</span> notifications</h3> --}}
                        {{-- <a href="extra_profile.html">view all</a> --}}
                        {{-- </li> --}}
                        {{-- <li> --}}
                        {{-- <ul class="dropdown-menu-list scroller" style="height: 250px;" --}}
                        {{-- data-handle-color="#637283"> --}}
                        {{-- <li> --}}
                        {{-- <a href="javascript:;"> --}}
                        {{-- <span class="time">just now</span> --}}
                        {{-- <span class="details"> --}}
                        {{-- <span class="label label-sm label-icon label-success"> --}}
                        {{-- <i class="fa fa-plus"></i> --}}
                        {{-- </span> --}}
                        {{-- New user registered. </span> --}}
                        {{-- </a> --}}
                        {{-- </li> --}}
                        {{-- <li> --}}
                        {{-- <a href="javascript:;"> --}}
                        {{-- <span class="time">3 mins</span> --}}
                        {{-- <span class="details"> --}}
                        {{-- <span class="label label-sm label-icon label-danger"> --}}
                        {{-- <i class="fa fa-bolt"></i> --}}
                        {{-- </span> --}}
                        {{-- Server #12 overloaded. </span> --}}
                        {{-- </a> --}}
                        {{-- </li> --}}
                        {{-- <li> --}}
                        {{-- <a href="javascript:;"> --}}
                        {{-- <span class="time">10 mins</span> --}}
                        {{-- <span class="details"> --}}
                        {{-- <span class="label label-sm label-icon label-warning"> --}}
                        {{-- <i class="fa fa-bell-o"></i> --}}
                        {{-- </span> --}}
                        {{-- Server #2 not responding. </span> --}}
                        {{-- </a> --}}
                        {{-- </li> --}}
                        {{-- <li> --}}
                        {{-- <a href="javascript:;"> --}}
                        {{-- <span class="time">14 hrs</span> --}}
                        {{-- <span class="details"> --}}
                        {{-- <span class="label label-sm label-icon label-info"> --}}
                        {{-- <i class="fa fa-bullhorn"></i> --}}
                        {{-- </span> --}}
                        {{-- Application error. </span> --}}
                        {{-- </a> --}}
                        {{-- </li> --}}
                        {{-- <li> --}}
                        {{-- <a href="javascript:;"> --}}
                        {{-- <span class="time">2 days</span> --}}
                        {{-- <span class="details"> --}}
                        {{-- <span class="label label-sm label-icon label-danger"> --}}
                        {{-- <i class="fa fa-bolt"></i> --}}
                        {{-- </span> --}}
                        {{-- Database overloaded 68%. </span> --}}
                        {{-- </a> --}}
                        {{-- </li> --}}
                        {{-- <li> --}}
                        {{-- <a href="javascript:;"> --}}
                        {{-- <span class="time">3 days</span> --}}
                        {{-- <span class="details"> --}}
                        {{-- <span class="label label-sm label-icon label-danger"> --}}
                        {{-- <i class="fa fa-bolt"></i> --}}
                        {{-- </span> --}}
                        {{-- A user IP blocked. </span> --}}
                        {{-- </a> --}}
                        {{-- </li> --}}
                        {{-- <li> --}}
                        {{-- <a href="javascript:;"> --}}
                        {{-- <span class="time">4 days</span> --}}
                        {{-- <span class="details"> --}}
                        {{-- <span class="label label-sm label-icon label-warning"> --}}
                        {{-- <i class="fa fa-bell-o"></i> --}}
                        {{-- </span> --}}
                        {{-- Storage Server #4 not responding dfdfdfd. </span> --}}
                        {{-- </a> --}}
                        {{-- </li> --}}
                        {{-- <li> --}}
                        {{-- <a href="javascript:;"> --}}
                        {{-- <span class="time">5 days</span> --}}
                        {{-- <span class="details"> --}}
                        {{-- <span class="label label-sm label-icon label-info"> --}}
                        {{-- <i class="fa fa-bullhorn"></i> --}}
                        {{-- </span> --}}
                        {{-- System Error. </span> --}}
                        {{-- </a> --}}
                        {{-- </li> --}}
                        {{-- <li> --}}
                        {{-- <a href="javascript:;"> --}}
                        {{-- <span class="time">9 days</span> --}}
                        {{-- <span class="details"> --}}
                        {{-- <span class="label label-sm label-icon label-danger"> --}}
                        {{-- <i class="fa fa-bolt"></i> --}}
                        {{-- </span> --}}
                        {{-- Storage server failed. </span> --}}
                        {{-- </a> --}}
                        {{-- </li> --}}
                        {{-- </ul> --}}
                        {{-- </li> --}}
                        {{-- </ul> --}}
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-close-others="true">
                            <img alt="" class="img-circle" src="/assets/admin/layout/img/avatar3_small.jpg" />
                            <span class="username username-hide-on-mobile">
                                {{ auth()->user()->first_name }}
                            </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->

        @include('layouts.inc._aside')
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- END PAGE HEADER-->
                @yield('content')
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

    @include('layouts.inc._footer')

    @include('layouts.inc._script')
    @include('layouts.inc._tost')

    @stack('js')
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>
