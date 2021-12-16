@extends('backends/layout')

@section('title') Authors @endsection

@section('style')
  <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/pages/app-card.css">
@endsection


@section('body')

 <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card bg-analytics text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <img src=" {{ asset('public/assets/backends') }}/app-assets/images/elements/decore-left.png" class="img-left" alt="card-img-left">
                                        <img src=" {{ asset('public/assets/backends') }}/app-assets/images/elements/decore-right.png" class="img-right" alt="card-img-right">
                                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-award white font-large-1"></i>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h1 class="mb-2 text-white">Congratulations John,</h1>
                                            <p class="m-auto w-75">You have done  <strong>57.6%</strong> more sales today. Check your new badge in your profile.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25">92.6k</h2>
                                    <p class="mb-0">Subscribers Gained</p>
                                </div>
                                <div class="card-content">
                                    <div id="subscribe-gain-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-package text-warning font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25">97.5K</h2>
                                    <p class="mb-0">Orders Received</p>
                                </div>
                                <div class="card-content">
                                    <div id="orders-received-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Recent Books</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>NUMBER</th>
                                                    <th>BOOK TITLE</th>
                                                    <th>AUTHOR</th>
                                                    <th>READED</th>
                                                    <th>DATE</th>
                                                    <!-- <th>COMMENTS</th> -->
                                                </tr>
                                            </thead>
                                            <tbody> @php($i=0)
                                                @foreach($books as $row)
                                                @php($i++)
                                                <tr>
                                                    <td width="1%">#{{$i}}</td>
                                                    <td width="50%">{{$row->bk_title}}</td>
                                                    <td> <i class="feather icon-user"></i> {{$row->author->atr_name . ' ' . $row->author->atr_last_name }}</td>
                                                    <td>
                                                        <span style="font-weight: bold;">{{$row->book_counter->count()}} <i class="feather icon-eye"></i></span>
                                                    </td>
                                                    <td> <i class="feather icon-calendar"></i> {{date('Y/m/d', strtotime($row->bk_created_at))}}</td>
                                                    <!-- <td>28/07/2018</td> -->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


@endsection

@section('script')

	<!-- BEGIN: Page Vendor JS-->
    <script src=" {{ asset('public/assets/backends') }}/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src=" {{ asset('public/assets/backends') }}/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src=" {{ asset('public/assets/backends') }}/app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src=" {{ asset('public/assets/backends') }}/app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->


    <!-- BEGIN: Page JS-->
    <script src=" {{ asset('public/assets/backends') }}/app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <!-- END: Page JS-->

@endsection