<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('assets/website/sumon-logo.png') }}">
    <!--load progress bar-->
    <script src="{{ asset('assets/admin/vendor/pace/pace.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/admin/loader-css.css') }}">
    <link href="{{ asset('assets/admin/vendor/pace/pace-theme-minimal.css') }}" rel="stylesheet"/>

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/animate.css/animate.css') }}">

    <!--dataTable-->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/data-table/media/css/dataTables.bootstrap.min.css')}}">


    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/toastr/toastr.min.css') }}">
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/magnific-popup/magnific-popup.css') }}">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/stylesheets/css/style.css') }}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

</head>

<body>
<div class="wrap">
    <!-- page HEADER -->
    <!-- ========================================================= -->
    <div class="page-header">
        <!-- LEFTSIDE header -->
        <div class="leftside-header">
            <div class="logo">
                <a href="#" class="on-click">
                    <img style="height: 70px; width: auto; color: #ffffff" alt="logo" src="{{ asset('assets/website/sumon-logo.png') }}"/>
                </a>
            </div>
            <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <!-- RIGHTSIDE header -->
        <div class="rightside-header">
            <div class="header-middle"></div>

            <!--USER HEADERBOX -->
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <img alt="profile photo" src="{{ asset('assets/admin/images/avatar/avatar_user.jpg')}}"/>
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-profile">{{ auth()->user()->is_admin === 1 ? 'Admin':'Normal User' }}</span>
                    </div>
                    <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                    <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                </div>
                <div class="user-options dropdown-box">
                    <div class="drop-content basic">
                        <ul>
                            <li><a href="{{route('profiles.profile')}}"><i class="fa fa-user " aria-hidden="true"></i> Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-separator"></div>
            <!--Log out -->
            <div class="header-section">
                <a href="{{ route('logout') }}" data-toggle="tooltip" data-placement="left" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body">
        <!-- LEFT SIDEBAR -->
        <!-- ========================================================= -->
        <div class="left-sidebar">
            <!-- left sidebar HEADER -->
            <div class="left-sidebar-header">
                <div class="left-sidebar-title">Navigation</div>
                <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                    <span></span>
                </div>
            </div>
            <!-- NAVIGATION -->
            <!-- ========================================================= -->
            <div id="left-nav" class="nano">
                <div class="nano-content">
                    <nav>
                        <ul class="nav nav-left-lines" id="main-nav">
                            <!--HOME-->
                            <li class="{{ request()->is('dashboard') ? 'active-item':'' }}"><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                            <!--Homepage-->
                            <li class="has-child-item  {{ request()->is('homepage','homepage/*') ? 'open-item active-item':'' }} close-item">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>Homepage</span></a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('homepage/add','homepage/edit/*') ? 'active-item':'' }}"><a href="{{ route('homepage.create') }}">Add Homepage</a></li>
                                    <li class="{{ request()->is('homepage') ? 'active-item':'' }}"><a href="{{ route('homepage.manage') }}">Manage Homepage</a></li>
                                </ul>
                            </li>
                            <!--Hobbies & Interests-->
                            <li class="has-child-item  {{ request()->is('hobbies','hobbies/*','interests','interests/*') ? 'open-item active-item':'' }} close-item">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>Hobbies & Interests</span></a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('hobbies/add','hobbies/edit/*') ? 'active-item':'' }}"><a href="{{ route('hobbies.create') }}">Add Hobbies</a></li>
                                    <li class="{{ request()->is('hobbies') ? 'active-item':'' }}"><a href="{{ route('hobbies.manage') }}">Manage Hobbies</a></li>
                                </ul>

                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('interests/add','interests/edit/*') ? 'active-item':'' }}"><a href="{{ route('interests.create') }}">Add Interest</a></li>
                                    <li class="{{ request()->is('interests') ? 'active-item':'' }}"><a href="{{ route('interests.manage') }}">Manage Interest</a></li>
                                </ul>
                            </li>


                            <!--SERVICES-->
                            <li class="has-child-item  {{ request()->is('services','services/*') ? 'open-item active-item':'' }} close-item">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>Services</span></a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('services/add','services/edit/*') ? 'active-item':'' }}"><a href="{{ route('services.create') }}">Add Service</a></li>
                                    <li class="{{ request()->is('services') ? 'active-item':'' }}"><a href="{{ route('services.manage') }}">Manage Service</a></li>
                                </ul>
                            </li>

                            <!--Work Participation-->
                            <li class="has-child-item  {{ request()->is('participations','participations/*') ? 'open-item active-item':'' }} close-item">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>Work & Participations</span></a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('participations/add','participations/edit/*') ? 'active-item':'' }}"><a href="{{ route('participations.create') }}">Add Participation</a></li>
                                    <li class="{{ request()->is('participations') ? 'active-item':'' }}"><a href="{{ route('participations.manage') }}">Manage Participations</a></li>
                                </ul>
                            </li>

                            <!--Work Expertise-->
                            <li class="has-child-item  {{ request()->is('expertises','expertises/*') ? 'open-item active-item':'' }} close-item">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>Work & Expertise</span></a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('expertises/add','expertises/edit/*') ? 'active-item':'' }}"><a href="{{ route('expertises.create') }}">Add Expertise</a></li>
                                    <li class="{{ request()->is('expertises') ? 'active-item':'' }}"><a href="{{ route('expertises.manage') }}">Manage Expertise</a></li>
                                </ul>
                            </li>

                            <!--My Portfolio-->
                            <li class="has-child-item  {{ request()->is('categories','categories/*','subcategories','subcategories/*') ? 'open-item active-item':'' }} close-item">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>My Portfolio</span></a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('categories/add','categories/edit/*') ? 'active-item':'' }}"><a href="{{ route('categories.create') }}">Add Category</a></li>
                                    <li class="{{ request()->is('categories') ? 'active-item':'' }}"><a href="{{ route('categories.manage') }}">Manage Category</a></li>
                                </ul>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('subcategories/add','subcategories/edit/*') ? 'active-item':'' }}"><a href="{{ route('subcategories.create') }}">Add SubCategory</a></li>
                                    <li class="{{ request()->is('subcategories') ? 'active-item':'' }}"><a href="{{ route('subcategories.manage') }}">Manage SubCategory</a></li>
                                </ul>
                            </li>



                            <!--Clients say-->
                            <li class="has-child-item  {{ request()->is('sliders','sliders/*') ? 'open-item active-item':'' }} close-item">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>Clients say</span></a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('sliders/add','sliders/edit/*') ? 'active-item':'' }}"><a href="{{ route('sliders.create') }}">Add Slider</a></li>
                                    <li class="{{ request()->is('sliders') ? 'active-item':'' }}"><a href="{{ route('sliders.manage') }}">Manage Slider</a></li>
                                </ul>
                            </li>


                            <!--News & Blog-->
                            <li class="has-child-item  {{ request()->is('blogs','blogs/*') ? 'open-item active-item':'' }} close-item">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>News & Blog</span></a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('blogs/add','blogs/edit/*') ? 'active-item':'' }}"><a href="{{ route('blogs.create') }}">Add Blog</a></li>
                                    <li class="{{ request()->is('blogs') ? 'active-item':'' }}"><a href="{{ route('blogs.manage') }}">Manage Blog</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
