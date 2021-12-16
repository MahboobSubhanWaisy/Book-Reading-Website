@extends('backends/layout')

@section('title') Authors @endsection

@section('style')

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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Book Counters {{ $books->links() }}</h4>
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
                                                    <th>DOWNLOADED</th>
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
                                                    <td><span style="font-weight: bold;">{{$row->book_counter->count()}} <i class="feather icon-download"></i></span></td>
                                                    <!-- <td>28/07/2018</td> -->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $books->links() }}
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