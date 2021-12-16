@extends('frontend/layout')

@section('body')
        <style>
            #videoBG{
                width: 100%;
            }
        </style>
        
        <!-- Start Slider area -->
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
            <!-- Start Single Slide -->
            <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider__content">
                                <div class="contentbox">
                                    <h2>Read <span>your </span></h2>
                                    <h2>favourite <span>Book</span></h2>
                                    <h2>from <span>Here </span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->
            <!-- Start Single Slide -->
            <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider__content">
                                <div class="contentbox">
                                    <h2>Read <span>your </span></h2>
                                    <h2>favourite <span>Book </span></h2>
                                    <h2>from <span>Here </span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <video id="videoBG" oncontextmenu="return false;" autoplay muted loop>
                <source src="/bbook/storage/app/books/video/eumRvJNPiHFjhRDZzklonWdJsogoU3PHOH4GoU5x.mp4" type="video/mp4">
            </video> -->
            <!-- End Single Slide -->
        </div>
        <!-- End Slider area -->
        <!-- Start BEst Seller Area -->
        <section class="wn__product__area brown--color pt--80  pb--30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title text-center">
                            @if(Session::get('locale') == 'en')
                                <h2 class="title__be--2">New <span class="color--theme">Books </span></h2>
                            @elseif(Session::get('locale') == 'fa')
                                <h2 class="title__be--2">کتاب های <span class="color--theme">جدید </span></h2>
                            @elseif(Session::get('locale') == 'pa')
                                <h2 class="title__be--2">جدید <span class="color--theme">کتابونه </span></h2>
                            @else
                                <h2 class="title__be--2">New <span class="color--theme">Books </span></h2>
                            @endif
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                        </div>
                    </div>
                </div>
                <!-- Start Single Tab Content -->
                <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
                    <!-- Start Single Product -->
                    @foreach($books as $row)
                    <div class="product product__style--3">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product__thumb">
                                <a class="first__img" href="{{route('information').'/'.$row->bk_id}}"><img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" alt="product image"></a>
                                <a class="second__img animation1" href="{{route('information').'/'.$row->bk_id}}"><img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" alt="product image"></a>
                                <div class="hot__box">
                                    <span class="hot-label"> 
                                        @if(Session::get('locale') == 'en')
                                            {{$row->category->ct_title}}
                                        @elseif(Session::get('locale') == 'fa')
                                            {{$row->category->ct_title_dari}}
                                        @elseif(Session::get('locale') == 'pa')
                                            {{$row->category->ct_title_pashto}}
                                        @else
                                            {{$row->category->ct_title}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="product__content content--center">
                                <h4><a href="{{route('information').'/'.$row->bk_id}}">
                                    @if(Session::get('locale') == 'en')
                                        {{$row->bk_title}}
                                    @elseif(Session::get('locale') == 'fa')
                                        {{$row->bk_title_dari}}
                                    @elseif(Session::get('locale') == 'pa')
                                        {{$row->bk_title_pashto}}
                                    @else
                                        {{$row->bk_title}}
                                    @endif
                                </a></h4>
                                <ul class="prize d-flex">
                                    <p> 
                                        
                                        @if(Session::get('locale') == 'en')
                                            {{$row->bk_description}} 
                                        @elseif(Session::get('locale') == 'fa')
                                            {{$row->bk_description_dari}} 
                                        @elseif(Session::get('locale') == 'pa')
                                            {{$row->bk_description_pashto}} 
                                        @else
                                            {{$row->bk_description}} 
                                        @endif
                                    </p>
                                </ul>
                                <div class="action">
                                    <div class="actions_inner">
                                        <ul class="add_to_links">
                                            <!-- @foreach($row->book_attachment as $att)
                                                @if($att->at_type == 'pdf')
                                                    <li><a class="cart" href="{{route('information').'/'.$row->bk_id}}"><i class="fa fa-file-pdf-o"></i></a></li>
                                                @elseif($att->at_type == 'audio')
                                                    <li><a class="cart" href="{{route('information').'/'.$row->bk_id}}"><i class="fa fa-file-audio-o"></i></a></li>
                                                @elseif($att->at_type == 'swf')
                                                    <li><a class="cart" href="{{route('information').'/'.$row->bk_id}}"><i class="fa fa-video-camera"></i></a></li>
                                                @endif
                                            @endforeach -->
                                            <li><a title="Quick View" class="quickview modal-view detail-link" href="{{route('information').'/'.$row->bk_id}}"><i class="fa fa-search"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- end Single Product -->
                </div>
                <!-- End Single Tab Content -->
            </div>
        </section>
        <!-- Start BEst Seller Area -->
        <!-- Start NEwsletter Area -->
        <section class="wn__newsletter__area bg-image--2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
                        <div class="section__title text-center">
                            <h2>Stay With Us</h2>
                        </div>
                        <div class="newsletter__block text-center">
                            <p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers.</p>
                            <form action="#">
                                <div class="newsletter__box">
                                    <input type="email" placeholder="Enter your e-mail">
                                    <button>Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End NEwsletter Area -->
        <!-- Start Best Seller Area -->
        <section class="wn__bestseller__area bg--white pt--80  pb--30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title text-center">
                            <h2 class="title__be--2">{{__('title.All')}} <span class="color--theme">{{__('title.Products')}}</span></h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                        </div>
                    </div>
                </div>
                <div class="row mt--50">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="product__nav nav justify-content-center" role="tablist">
                            <a class="nav-item nav-link font-weight-bold active" data-toggle="tab" href="#nav-all" role="tab">{{__('title.All')}}</a>
                            @foreach($category as $row)
                                <a class="nav-item nav-link font-weight-bold" data-toggle="tab" href="#cat-{{$row->ct_id}}" role="tab">
                                @if(Session::get('locale') == 'en')
                                    {{$row->ct_title}}
                                @elseif(Session::get('locale') == 'fa')
                                    {{$row->ct_title_dari}}
                                @elseif(Session::get('locale') == 'pa')
                                    {{$row->ct_title_pashto}}
                                @else
                                    {{$row->ct_title}}
                                @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab__container mt--60">
                    <!-- Start Single Tab Content -->
                    <div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">
                        <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                            @php
                                $counter = 0;
                            @endphp
                             @foreach($books as $row)
                             @php($counter ++)
                             @if($counter == 1 )
                                <div class="single__product">
                            @endif
                                <!-- Start Single Product -->
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="product product__style--3">
                                        <div class="product__thumb">
                                            <a class="first__img" href="single-product.html"><img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" alt="product image"></a>
                                            <a class="second__img animation1" href="{{route('information').'/'.$row->bk_id}}"><img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" alt="product image"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">
                                                    @if(Session::get('locale') == 'en')
                                                        {{$row->category->ct_title}}
                                                    @elseif(Session::get('locale') == 'fa')
                                                        {{$row->category->ct_title_dari}}
                                                    @elseif(Session::get('locale') == 'pa')
                                                        {{$row->category->ct_title_pashto}}
                                                    @else
                                                        {{$row->category->ct_title}}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center content--center">
                                            <h4><a href="single-product.html">
                                                @if(Session::get('locale') == 'en')
                                                    {{$row->bk_title}}
                                                @elseif(Session::get('locale') == 'fa')
                                                    {{$row->bk_title_dari}}
                                                @elseif(Session::get('locale') == 'pa')
                                                    {{$row->bk_title_pashto}}
                                                @else
                                                    {{$row->bk_title}}
                                                @endif
                                            </a></h4>
                                            <ul class="prize d-flex" style="height: 30px;">
                                                <p> 
                                                    @if(Session::get('locale') == 'en')
                                                        {{$row->bk_description}} 
                                                    @elseif(Session::get('locale') == 'fa')
                                                        {{$row->bk_description_dari}} 
                                                    @elseif(Session::get('locale') == 'pa')
                                                        {{$row->bk_description_pashto}} 
                                                    @else
                                                        {{$row->bk_description}} 
                                                    @endif
                                                </p>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <!-- @foreach($row->book_attachment as $att)
                                                            @if($att->at_type == 'pdf')
                                                                <li><a class="cart" href="{{route('information').'/'.$row->bk_id}}"><i class="fa fa-file-pdf-o"></i></a></li>
                                                            @elseif($att->at_type == 'audio')
                                                                <li><a class="cart" href="{{route('information').'/'.$row->bk_id}}"><i class="fa fa-file-audio-o"></i></a></li>
                                                            @elseif($att->at_type == 'swf')
                                                                <li><a class="cart" href="{{route('information').'/'.$row->bk_id}}"><i class="fa fa-video-camera"></i></a></li>
                                                            @endif
                                                        @endforeach -->
                                                        <li><a title="Quick View" class="quickview modal-view detail-link" href="{{route('information').'/'.$row->bk_id}}"><i class="fa fa-search"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Single Product -->

                            @if($counter == 2 )
                                </div>
                                @php($counter = 0)
                            @endif
                            
                            @endforeach
                        </div>
                    </div>
                    <!-- End Single Tab Content -->
                    @foreach($category as $cat)
                    <!-- Start Single Tab Content -->
                    <div class="row single__tab tab-pane fade" id="cat-{{$cat->ct_id}}" role="tabpanel">
                        <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                             @foreach($cat->books as $row)
                                 @php($counter ++)
                                 @if($counter == 1 )
                                    <div class="single__product">
                                @endif
                                <!-- Start Single Product -->
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="product product__style--3">
                                        <div class="product__thumb">
                                            <a class="first__img" href="single-product.html"><img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" alt="product image"></a>
                                            <a class="second__img animation1" href="{{route('information').'/'.$row->bk_id}}"><img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" alt="product image"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">
                                                    @if(Session::get('locale') == 'en')
                                                        {{$row->category->ct_title}}
                                                    @elseif(Session::get('locale') == 'fa')
                                                        {{$row->category->ct_title_dari}}
                                                    @elseif(Session::get('locale') == 'pa')
                                                        {{$row->category->ct_title_pashto}}
                                                    @else
                                                        {{$row->category->ct_title}}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center content--center">
                                            <h4><a href="single-product.html">{{$row->bk_title}}</a></h4>
                                            <ul class="prize d-flex" style="height: 30px;">
                                                <p> {{$row->bk_description}} </p>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <!-- <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                                                        <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li> -->
                                                        <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                                        <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Single Product -->

                                @if($counter == 2 )
                                    </div>
                                    @php($counter = 0)
                                @endif
                            
                            @endforeach
                        </div>
                    </div>
                    <!-- End Single Tab Content -->
                    @endforeach
                    

                </div>
            </div>
        </section>
        <!-- Start BEst Seller Area -->

        <!-- Best Sale Area -->
        <section class="best-seel-area pt--80 pb--60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title text-center pb--50">
                            <h2 class="title__be--2">{{__('title.TOP')}} <span class="color--theme">{{__('title.READIN LIST')}} </span></h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider center">
                <!-- Single product start -->
                @foreach($books as $row)
                <div class="product product__style--3">
                    <div class="product__thumb">
                        <a class="first__img" href="{{route('information').'/'.$row->bk_id}}"><img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" alt="product image"></a>
                    </div>
                    <div class="product__content content--center">
                        <div class="action">
                            <div class="actions_inner">
                                <ul class="add_to_links">
                                    <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="{{route('information').'/'.$row->bk_id}}"><i class="bi bi-search"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Single product end -->
            </div>
        </section>
        <!-- Best Sale Area Area -->
@endsection