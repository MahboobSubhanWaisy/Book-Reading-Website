@extends('frontend/layout')

@section('body')


	<!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">{{__('title.Favorite Books')}}</h2>
                            <!-- <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{route('default')}}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Favorite Books</span>
                            </nav> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Blog Area -->
        <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="blog-page">
        					<div class="page__header">
        						<h2>{{__('title.BOOK LIKED')}}</h2>
        					</div>
        					@foreach($favorite as $row)
        					<!-- Start Single Post -->
        					<article class="blog__post d-flex flex-wrap">
        						<div class="thumb">
        							<a href="{{route('information').'/'.$row->book->bk_id}}">
        								<img src="{{ asset('/storage/app/books/cover/'.$row->book->bk_cover_photo) }}" alt="blog images">
        							</a>
        						</div>
        						<div class="content">
        							<h4><a href="{{route('information').'/'.$row->book->bk_id}}">
										@if(Session::get('locale') == 'en')
											{{$row->book->bk_title}}
										@elseif(Session::get('locale') == 'fa')
											{{$row->book->bk_title_dari}}
										@else
											{{$row->book->bk_title_pashto}}
										@endif
									</a></h4>
        							<ul class="post__meta">
        								<li>Posts by : <a href="#">{{$row->client->clt_name}}</a></li>
        								<li class="post_separator">/</li>
        								<li>{{date('M d Y', strtotime($row->book->bk_created_at))}} </li>
        							</ul>
        							<p>
										@if(Session::get('locale') == 'en')
											{{$row->book->bk_description}}
										@elseif(Session::get('locale') == 'fa')
											{{$row->book->bk_description_dari}}
										@else
											{{$row->book->bk_description_pashto}}
										@endif
									</p>
        							<div class="blog__btn">
        								<a class="shopbtn" href="{{route('information').'/'.$row->book->bk_id}}">read more</a>
        							</div>
        						</div>
        					</article>
        					<!-- End Single Post -->
        					@endforeach

        				</div>
        				{{$favorite->links('vendor.pagination.Fpagination')}}
        			</div>
        			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__sidebar">
        					<!-- Start Single Widget -->
        					<aside class="widget recent_widget">
        						<h3 class="widget-title">{{__('title.Recent')}}</h3>
        						<div class="recent-posts">
        							<ul>
        								@foreach($recent as $row)
	        								<li>
	        									<div class="post-wrapper d-flex">
	        										<div class="thumb">
	        											<a href="{{route('information').'/'.$row->bk_id}}"><img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" alt="blog images"></a>
	        										</div>
	        										<div class="content">
	        											<h5 style="font-size: 11px"><a href="{{route('information').'/'.$row->bk_id}}">
															@if(Session::get('locale') == 'en')
																{{mb_substr($row->bk_title, 0,60) }}
															@elseif(Session::get('locale') == 'fa')
																{{mb_substr($row->bk_title_dari, 0,60) }}
															@else
																{{mb_substr($row->bk_title_pashto, 0,60) }}
															@endif
														</a></h5>
	        											<p>	{{date('M d Y', strtotime($row->bk_created_at))}}</p>
	        										</div>
	        									</div>
	        								</li>
        								@endforeach
        							</ul>
        						</div>
        					</aside>
        					<!-- End Single Widget -->
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Blog Area -->


@endsection

