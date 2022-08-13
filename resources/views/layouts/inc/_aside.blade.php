<div class="page-sidebar-wrapper">
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
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler" style="background:url(https://preview.keenthemes.com/metronic-v4/theme/assets/layouts/layout4/img/sidebar-toggle-light.png)">

                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper" style="margin-top: 40px">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
{{--                <form class="sidebar-search" action="extra_search.html" method="POST">--}}
{{--                    <a href="javascript:;" class="remove">--}}
{{--                        <i class="icon-close"></i>--}}
{{--                    </a>--}}
{{--                    <div class="input-group">--}}
{{--                        <input type="text" class="form-control" placeholder="Search...">--}}
{{--                        <span class="input-group-btn">--}}
{{--                            <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </form>--}}
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item @if (Str::contains(url()->current(), 'home')) active @endif">
                <a href="{{ route('home') }}">
                    <i class="icon-home"></i>
                    <span class="title">الرئيسية</span>
                    {{-- <span class="arrow "></span> --}}
                </a>
                {{-- <ul class="sub-menu"> --}}
                {{-- <li> --}}
                {{-- <a href="index.html"> --}}
                {{-- <i class="icon-bar-chart"></i> --}}
                {{-- Default Dashboard</a> --}}
                {{-- </li> --}}
                {{-- <li> --}}
                {{-- <a href="index_2.html"> --}}
                {{-- <i class="icon-bulb"></i> --}}
                {{-- New Dashboard #1</a> --}}
                {{-- </li> --}}
                {{-- <li> --}}
                {{-- <a href="index_3.html"> --}}
                {{-- <i class="icon-graph"></i> --}}
                {{-- New Dashboard #2</a> --}}
                {{-- </li> --}}
                {{-- </ul> --}}
            </li>
            <li class="nav-item @if (Str::contains(url()->current(), 'user') || Str::contains(url()->current(), 'driver')) active @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">إدارة الأعضاء والمستخدمين</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class=" @if (Str::contains(url()->current(), 'user')) active @endif">
                        <a href="{{ route('user.index') }}">
                            <i class="icon-user"></i>
                            المستخدمين</a>
                    </li>
{{--                    <li class=" @if (Str::contains(url()->current(), 'potato')) active @endif">--}}
{{--                        <a href="#">--}}
{{--                            <i class="icon-bulb"></i>--}}
{{--                            الأعضاء</a>--}}
{{--                    </li>--}}
                    <li class=" @if (Str::contains(url()->current(), 'driver')) active @endif">
                        <a href="{{route('driver.index')}}">
                            <i class="fa fa-car"></i>
                            السائقين</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item @if (Str::contains(url()->current(), 'meal') || Str::contains(url()->current(), 'extra')) active @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cutlery"></i>
                    <span class="title"> إدارة الوجبات</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class=" @if (Str::contains(url()->current(), 'meal')) active @endif">
                        <a href="{{ route('meal.index') }}">
                            <i class="fa fa-cutlery"></i>الوجبات
                        </a>
                    </li>
                    <li class=" @if (Str::contains(url()->current(), 'extra')) active @endif">
                        <a href="{{ route('extra.index') }}">
                            <i class="icon-plus"></i>الإضافات</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @if (Str::contains(url()->current(), 'restaurant')) active @endif">
                <a href="{{ route('restaurant.index') }}">
                    <i class="fa fa-cog"></i>
                    <span class="title"> إدارة المطاعم</span>
                    {{-- <span class="arrow "></span> --}}
                </a>
                {{-- <ul class="sub-menu"> --}}
                {{-- <li> --}}
                {{-- <a href="index.html"> --}}
                {{-- <i class="icon-bar-chart"></i> --}}
                {{-- Default Dashboard</a> --}}
                {{-- </li> --}}
                {{-- <li> --}}
                {{-- <a href="index_2.html"> --}}
                {{-- <i class="icon-bulb"></i> --}}
                {{-- New Dashboard #1</a> --}}
                {{-- </li> --}}
                {{-- <li> --}}
                {{-- <a href="index_3.html"> --}}
                {{-- <i class="icon-graph"></i> --}}
                {{-- New Dashboard #2</a> --}}
                {{-- </li> --}}
                {{-- </ul> --}}
            </li>
            <li class="nav-item @if (Str::contains(url()->current(), 'order')) active @endif">
                <a href="{{ route('order.index') }}">
                    <i class="fa fa-send"></i>
                    <span class="title">إدارة الطلبات</span>
                    {{-- <span class="arrow "></span> --}}
                </a>
                {{-- <ul class="sub-menu">
                    <li>
                        <a href="{{ route('order.index') }}">
                            <i class="icon-bar-chart"></i>
                            All orders</a>
                    </li>
                </ul> --}}
            </li>
            <li class="nav-item @if (Str::contains(url()->current(), 'coupon')) active @endif">
                <a href="{{ route('coupon.index') }}">
                    <i class="fa fa-gift"></i>
                    <span class="title">القسائم الشرائية</span>
                    {{-- <span class="arrow "></span> --}}
                </a>
                {{-- <ul class="sub-menu"> --}}
                {{-- <li> --}}
                {{-- <a href="index.html"> --}}
                {{-- <i class="icon-bar-chart"></i> --}}
                {{-- Default Dashboard</a> --}}
                {{-- </li> --}}
                {{-- <li> --}}
                {{-- <a href="index_2.html"> --}}
                {{-- <i class="icon-bulb"></i> --}}
                {{-- New Dashboard #1</a> --}}
                {{-- </li> --}}
                {{-- <li> --}}
                {{-- <a href="index_3.html"> --}}
                {{-- <i class="icon-graph"></i> --}}
                {{-- New Dashboard #2</a> --}}
                {{-- </li> --}}
                {{-- </ul> --}}
            </li>
            <li class="nav-item @if (Str::contains(url()->current(), 'settings')) active @endif">
                <a href="{{ route('settings.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">إعدادات التطبيق</span>
                    {{-- <span class="arrow "></span> --}}
                </a>
                {{-- <ul class="sub-menu"> --}}
                {{-- <li> --}}
                {{-- <a href="index.html"> --}}
                {{-- <i class="icon-bar-chart"></i> --}}
                {{-- Default Dashboard</a> --}}
                {{-- </li> --}}
                {{-- <li> --}}
                {{-- <a href="index_2.html"> --}}
                {{-- <i class="icon-bulb"></i> --}}
                {{-- New Dashboard #1</a> --}}
                {{-- </li> --}}
                {{-- <li> --}}
                {{-- <a href="index_3.html"> --}}
                {{-- <i class="icon-graph"></i> --}}
                {{-- New Dashboard #2</a> --}}
                {{-- </li> --}}
                {{-- </ul> --}}
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
