<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> WELCOME @yield('title') | BOUM BOOKS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicons -->
        <link rel="shortcut icon" href="{{ asset('public/assets/frontends') }}/images/bb-logo.png">
        <link rel="apple-touch-icon" href="images/icon.png">

        <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('public/assets/frontends') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('public/assets/frontends') }}/css/plugins.css">
        <link rel="stylesheet" href="{{ asset('public/assets/frontends') }}/css/style.css">
        
        <!-- Cusom css -->
        <link rel="stylesheet" href="{{ asset('public/assets/frontends') }}/css/custom.css">
        <link rel="stylesheet" href="{{ asset('public/assets/frontends') }}/css/rtl.css">
        
        <!-- Modernizer js -->
        <script src="{{ asset('public/assets/frontends') }}/js/vendor/modernizr-3.5.0.min.js"></script>


        @yield('style')
    </head>
<body>

    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        
        <!-- Header -->
        <header id="wn__header" class="oth-page header__area header__absolute sticky__header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-7 col-lg-2">
                        <div class="logo">
                            <a href="{{route('default')}}">
                                <img src="{{ asset('public/assets/frontends') }}/images/logo/logo-bb.png" alt="logo images" style="    max-width: 40%;">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <nav class="mainmenu__nav">
                            <ul class="meninmenu d-flex justify-content-start">
                                <li><a href="{{route('default')}}">{{__('title.HOME')}}</a></li>
                                <li><a href="{{route('fbooks')}}">{{__('title.BOOKS')}}</a></li>
                                <!-- <li><a href="{{route('default')}}">ABOUT US</a></li> -->
                                <li><a href="{{route('contact_us')}}">{{__('title.CONTACT US')}}</a></li>
                                <input type="hidden" value="{{Session::get('locale')}}" id="current-language">
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-8 col-sm-8 col-5 col-lg-2">
                        <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                            <li class="shop_search"><a class="search__active" href="#"></a></li>
                            <li class="wishlist"><a href="{{route('book_liked')}}"></a></li>
                            <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                                <div class="searchbar__content setting__block">
                                    <div class="content-inner">
                                        <div class="switcher-currency">
                                            <strong class="label switcher-label">
                                                @if(Auth::guard('client')->user() != '')
                                                    <span>Welcome {{ Auth::guard('client')->user()->clt_name }}</span>
                                                @else
                                                    <span>{{__('title.My Account')}}</span>
                                                @endif
                                            </strong>
                                            <div class="switcher-options">
                                                <div class="switcher-currency-trigger">
                                                    <div class="setting__menu">
                                                        @if(Auth::guard('client')->user() != '')
                                                            <span><a href="{{route('profile')}}">{{__('title.Profile')}}</a></span>
                                                            <span><a href="{{route('logout')}}">{{__('title.Logout')}}</a>
                                                        @else
                                                            <span><a href="{{route('signin')}}">{{__('title.Sign In')}}</a></span>
                                                            <span><a href="{{route('signup')}}">{{__('title.Create An Account')}}</a></span>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Start Mobile Menu -->
                <div class="row d-none">
                    <div class="col-lg-12 d-none">
                        <nav class="mobilemenu__nav">
                            <ul class="meninmenu">
                                  <li><a href="{{route('default')}}">{{__('title.HOME')}}</a></li>
                                  <li><a href="{{route('fbooks')}}">{{__('title.BOOKS')}}</a></li>
                                  <!-- <li><a href="{{route('default')}}">ABOUT US</a></li> -->
                                  <li><a href="{{route('contact_us')}}">{{__('title.CONTACT US')}}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End Mobile Menu -->
                <div class="mobile-menu d-block d-lg-none"></div>
                <!-- Mobile Menu -->    
            </div>      
        </header>
        <!-- //Header -->
        <!-- Start Search Popup -->
        <div class="box-search-content search_active block-bg close__top">
            <form id="search_mini_form" class="minisearch" action="#">
                <div class="field__search">
                    <input type="text" id="search-text" placeholder="Please enter keyword to search...">
                    <div class="col-12 mt-1 search-data">
                        
                    </div>
                    <div class="action">
                        <a><i class="zmdi zmdi-search"></i></a>
                    </div>
                </div>
            </form>
            <div class="close__wrap">
                <span>close</span>
            </div>
        </div>
        <!-- End Search Popup -->
        @yield('body')

        <!-- Footer Area -->
        <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
            <div class="footer-static-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer__widget footer__menu">
                                <div class="ft__logo">
                                    <a href="{{route('default')}}">
                                        <img src="{{ asset('public/assets/frontends') }}/images/logo/logo-bb.png" alt="logo">
                                    </a>

                                </div>
                                <div class="footer__content">
                                    <ul class="social__net social__net--2 d-flex justify-content-center">
                                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                        <li><a href="#"><i class="bi bi-google"></i></a></li>
                                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                        <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                                        <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                                    </ul>
                                    <!-- <ul class="mainmenu d-flex justify-content-center">
                                        <li><a href="{{route('default')}}">Trending</a></li>
                                        <li><a href="{{route('default')}}">Best Seller</a></li>
                                        <li><a href="{{route('default')}}">All Product</a></li>
                                        <li><a href="{{route('default')}}">Wishlist</a></li>
                                        <li><a href="{{route('default')}}">Blog</a></li>
                                        <li><a href="{{route('default')}}">Contact</a></li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright__wrapper copyright__wrapper__rtl">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="copyright">
                                <div class="copy__right__inner text-left">
                                    <p>Copyright <i class="fa fa-copyright"></i> <a href="#">Boum Book.</a> All Rights Reserved</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="payment text-right">
                                <!-- <P style='position: absolute; right: 175px;'> Language </P> -->
                                <a href="{{route('english')}}" title="English" class="mr-4"> {{__('title.English')}} <!-- <img src="{{ asset('public/assets/frontends') }}/images/icons/af.png" alt=""> --> </a>
                                <a href="{{route('dari')}}" title="Dari" class="mr-4"> {{__('title.Dari')}} <!-- <img src="{{ asset('public/assets/frontends') }}/images/icons/af.png" alt="">--> </a>
                                <a href="{{route('pashto')}}" title="Pashto" class="mr-4"> {{__('title.Pashto')}} <!-- <img src="{{ asset('public/assets/frontends') }}/images/icons/us.png" alt="">--> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- //Footer Area -->

    </div>
    <!-- //Main wrapper -->

    <!-- JS Files -->
    <script src="{{ asset('public/assets/frontends') }}/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('public/assets/frontends') }}/js/popper.min.js"></script>
    <script src="{{ asset('public/assets/frontends') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/assets/frontends') }}/js/plugins.js"></script>
    <script src="{{ asset('public/assets/frontends') }}/js/active.js"></script>
    <script src="{{ asset('public/assets/frontends') }}/js/rtl.js"></script>
    <script>
        $(document).ready(function(){
            $('body').on('keyup', '#search-text', function() {
                var searchText = $(this).val();
                $.ajax({
                    method: 'POST',
                    url: '{{ route("search-book") }}',
                    dataType: 'json',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        searchText: searchText,
                    },
                    success: function(res){
                        var session = '{{Session::get("locale")}}';
                        
                        var row = '';
                        $('.search-data').html('');
                        $.each(res, function(index, value) {
                            if(session == 'en')
                            {
                                row = '<div class="row"><div class="col-9 p-0 m-0"><p class="found-text">'+ value.bk_title +'</p></div><div class="col-3"><a href="{{route('information')}}/'+ value.bk_id +'" class="quick-view-btn">Quick View</a></div></div>';
                                $('.search-data').append(row);
                            }else if(session == 'fa')
                            {
                                row = '<div class="row"><div class="col-9 p-0 m-0"><p class="found-text" style="text-align:right; text-indent: 3.5rem; font-weight: 600;">'+ value.bk_title_dari +'</p></div><div class="col-3"><a href="{{route('information')}}/'+ value.bk_id +'" class="quick-view-btn" style="font-weight:600;">باز نگری</a></div></div>';
                                $('.search-data').append(row);
                            }

                        });
                    }
                });
            });
        });
    </script>
    @yield('script')
    
</body>
</html>

