<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to @yield('title') - BOUM BOOK</title>
    <link rel="shortcut icon" href="{{ asset('public/assets/backends') }}/app-assets/images/ico/bb-logo.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/toasts/css/toast.css">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/assets/css/style.css">
    @yield('style')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating  footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="{{route('dashboard')}}">
                        <div class="brand-logo" ></div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li> -->
                            <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li> -->
                            <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li> -->
                            <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li> -->
                            <li class="dropdown dropdown-language nav-item">
                                <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"> English</span></a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a>
                                    <!-- <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-af"></i> Dari</a>
                                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-af"></i> Pashto</a> -->
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="input" type="text" placeholder="Please enter keyword to search..." tabindex="-1" data-search="template-list">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main"></ul>
                            </div>
                        </li>
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                            <div class="media-body">
                                                <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                            <div class="media-body">
                                                <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                            <div class="media-body">
                                                <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{Auth::user()->u_name}} {{Auth::user()->u_lastname}}</span><span class="user-status">Available</span></div><span><img class="round" src="@if(Auth::user()->u_image != '') {{asset('/storage/app/users/'.Auth::user()->u_image) }} @else {{asset('storage/app/users/man-user-svgrepo-com.svg') }} @endif" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href=""><i class="feather icon-user"></i> View Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('dashboard')}}">
                            <div class="brand-logo" ></div>
                            <h2 class="brand-text mb-0">Vuexy</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include {{ asset('public/assets/backends') }}/includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li @if( URL::current() ==  route('dashboard') ) class="active" @endif ><a class="nav-link" href="{{route('dashboard')}}" ><i class="feather icon-home"></i><span data-i18n="Dashboard">Dashboard</span></a></li>
                    <li @if( URL::current() ==  route('books') ) class="active" @endif ><a class="nav-link" href="{{route('books')}}" ><i class="feather icon-layers"></i><span data-i18n="BOOKS">Books</span></a></li>
                    <li @if( URL::current() ==  route('authors') ) class="active" @endif ><a class="nav-link" href="{{route('authors')}}" ><i class="feather icon-users"></i><span data-i18n="AUTHORS">Authors</span></a></li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-menu"></i><span >Others</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu="" @if( URL::current() ==  route('categories') ) class="active" @endif ><a class="dropdown-item" href="{{ Route('categories') }}" data-toggle="dropdown"><i class="feather icon-bar-chart-2"></i>Category</a></li>
                            <li data-menu="" @if( URL::current() ==  route('users') ) class="active" @endif ><a class="dropdown-item" href="{{ Route('users') }}" data-toggle="dropdown" ><i class="feather icon-users"></i>users</a></li>
                        </ul>
                    </li>
                    <li @if( URL::current() ==  route('clients') ) class="active" @endif ><a class="nav-link" href="{{route('clients')}}" ><i class="feather icon-user-check"></i><span data-i18n="BOOKS">Clients</span></a></li>
                    <li @if( URL::current() ==  route('book_counters') ) class="active" @endif ><a class="nav-link" href="{{route('book_counters')}}" ><i class="feather icon-book"></i><span data-i18n="BOOKS">Book Counters</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->

    @yield('body')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020
                <a class="text-bold-800 grey darken-2" href="https://codezone.af" target="_blank">CODEZONE,</a>All rights Reserved
            </span>
            <span class="float-md-right d-none d-md-block">MANY THANKS<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->
    <!-- BEGIN: MODEL -->
        <div class="modal fade text-left" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content" style="overflow: hidden;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="xlarg-title">Extra Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="xlarge-body">
                        
                    </div>
                </div>
            </div>
        </div>

        <div id="loaderData" hidden=""> 
            <div class="loader" style="background: #FA3663;height: 180px;">
                <div class="l_main">
                  <div class="l_square"><span></span><span></span><span></span></div>
                  <div class="l_square"><span></span><span></span><span></span></div>
                  <div class="l_square"><span></span><span></span><span></span></div>
                  <div class="l_square"><span></span><span></span><span></span></div>
                </div>
            </div>
        </div>
    <!-- END: MODEL -->



    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('public/assets/backends') }}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('public/assets/backends') }}/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('public/assets/backends') }}/app-assets/js/core/app-menu.js"></script>
    <script src="{{ asset('public/assets/backends') }}/app-assets/js/core/app.js"></script>
    <script src="{{ asset('public/assets/backends') }}/app-assets/js/scripts/components.js"></script>
    <script src="{{ asset('public/assets/backends') }}/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="{{ asset('public/assets/backends') }}/app-assets/toasts/js/toast.js"></script>
    <!-- END: Theme JS-->
    @if(session()->has('success'))
        <script type="text/javascript">
            $.toast({
                type: 'info',
                title: 'Good News',
                subtitle: '15 sec ago',
                content: '{{ Session()->get('success') }}',
                delay: 5000,
            });
        </script>
    @endif
    @if(session()->has('failed'))
        <script type="text/javascript">
            $.toast({
                type: 'error',
                title: 'Good News',
                subtitle: '15 sec ago',
                content: '{{ Session()->get('failed') }}',
                delay: 5000,
            });
        </script>
    @endif

    <script type="text/javascript">
        
      function openDiv() {
        $('#body-contents').attr('hidden','');
        $('#body-customs-contents').removeAttr('hidden');  
        $('#body-customs-contents').html($('#loaderData').html()); 
        $('#addNew').attr('hidden','');
        $('#btnClose').removeAttr('hidden');
      }

    </script>
    <!-- BEGIN: Page JS-->
    @yield('script')
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>