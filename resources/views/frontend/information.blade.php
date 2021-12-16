@extends('frontend/layout')

@section('style')

<link href="{{ asset('public/assets/frontends') }}/js/plyr/plyr.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('public/assets/frontends') }}/css/rating.css">

@endsection

@section('body')

 <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">{{__('title.BOOK INFORMATION')}}</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{route('default')}}">{{__('title.Home')}}</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">{{__('title.Book Information')}}</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start main Content -->
        <div class="maincontent bg--white pt--80 pb--55">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-12 col-12">
        				<div class="wn__single__product" id="book-info">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        							<div class="wn__fotorama__wrapper">
	        							<div class="fotorama wn__fotorama__action" data-nav="thumbs">
		        							  <a href="1.jpg"><img src="{{ asset('/storage/app/books/cover/'.$book->bk_cover_photo) }}" alt=""></a>
	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1>
											@if(Session::get('locale') == 'en')
												{{$book->bk_title}}
                                            @elseif(Session::get('locale') == 'fa')
												{{$book->bk_title_dari}}
                                            @else
												{{$book->bk_title_pashto}}
                                            @endif
										</h1>
        								<div class="product-info-stock-sku d-flex">
											@if(Session::get('locale') == 'en')
												<p>Category:<span> {{$book->category->ct_title}} </span></p>
												<p>Author:<span> {{$book->author->atr_name}}</span></p>
											@elseif(Session::get('locale') == 'fa')
												<p class="p-rtl">بخش: <span> {{$book->category->ct_title_dari}} </span></p>
												<p class="p-rtl"> مولف: <span> سبحان</span></p>
											@else
												<p class="p-rtl">بخش: <span> {{$book->category->ct_title_dari}} </span></p>
												<p class="p-rtl"> مولف: <span> سبحان</span></p>
											@endif
        								</div>
        								<div class="box-tocart d-flex">
        									<ul class="social__net social__net--2 d-flex justify-content-center">
		    									@foreach($book->book_attachment as $att)
		                                            @if($att->at_type == 'pdf')
		                                               <li><a data-toggle="modal" title="Quick View" id="btn-pdf" pdf-data-id="{{$att->at_id}}" data-src='{{$att->at_attachement}}' class="quickview modal-view detail-link" href="#productmodal"><i class="zmdi zmdi-collection-pdf"></i> </a></li>
													   @elseif($att->at_type == 'audio')
		                                               <li><a title="Audio Player" id="audio-player-btn" id="btn-audio" data-src='{{$att->at_attachement}}' data-src='' class="quickview modal-view detail-link" href="#!"><i class="zmdi zmdi-audio"></i></a></li>
		                                            @elseif($att->at_type == 'video')
		                                               <li><a data-toggle="modal" title="Video Player" id="btn-video" data-src='{{$att->at_attachement}}' class="quickview modal-view detail-link" href="#videoModel"><i class="zmdi zmdi-videocam"></i></a></li>
		                                            @endif
		                                        @endforeach
											</ul>
        									<div class="addtocart__actions">
											<form method="post" action="{{route('download_pdf')}}">
												@csrf
												<input type="hidden" name="data-id" id="pdf-record-id">
												<button type="submit" class="tocart" id="btn-pdf-download" title="Download">{{__('title.Download')}}</button>
											</form>
        										
        									</div>
        								</div>
        								<div class="product__overview" id="audio-palyer" hidden="">
											<audio preload="auto" id="audio" controls controlsList="nodownload">
												  <source src="{{Helper::get_link($book->bk_id, 'audio' )}}">
												  <!-- <source src="http://www.jplayer.org/audio/mp3/Miaow-02-Hidden.ogg"> -->
											</audio>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="product__info__detailed">
							<div class="pro_details_nav nav justify-content-start" role="tablist">
	                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">{{__('title.Details')}}</a>
	                        </div>
	                        <div class="tab__container">
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
									<div class="description__attribute">
										@if(Session::get('locale') == 'en')
											{{$book->bk_description}}
                                        @elseif(Session::get('locale') == 'fa')
											{{$book->bk_description_dari}}
                                        @else
											{{$book->bk_description_pashto}}
                                        @endif
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->
	                        </div>
        				</div>
						<div class="wn__related__product pt--80 pb--50">
							<div class="section__title text-center">
								<h2 class="title__be--2">{{__('title.Related BOOKS')}}</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
									@foreach($books as $row)
									<!-- Start Single Product -->
									<div class="col-lg-3 col-md-3 col-sm-6 col-12">
										<div class="product">
											<div class="product__thumb">
												<a class="first__img" href="{{route('information').'/'.$row->bk_id}}"><img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" alt="product image"></a>
												<a class="second__img animation1" href="{{route('information').'/'.$row->bk_id}}"><img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" alt="product image"></a>
												<div class="new__box">
													<span class="new-label">
														@if(Session::get('locale') == 'en')
															{{$row->category->ct_title}}
														@elseif(Session::get('locale') == 'fa')
															{{$row->category->ct_title_dari}}
														@else
															{{$row->category->ct_title_pashto}}
														@endif
													</span>
												</div>

												<div class="action">
													<div class="actions_inner">
														<ul class="add_to_links">
															<li class="video1" data-id="{{$row->bk_id}}"><a class="cart video" data-id="{{$row->bk_id}}" href="#!"></a></li>
															<li><a class="wishlist" href="wishlist.html"></a></li>
															<li><a class="compare" href="compare.html"></a></li>
															<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"></a></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="product__content">
												<h4><a href="single-product.html">Crown Summit Backpack</a></h4>
											</div>
										</div>
									</div>
									@endforeach
									<!-- Start Single Product -->
								</div>
							</div>
						</div>
        			</div>
        		</div>

				<!--------- Start Rating Section --------->
				<div class="col-lg-12 col-md-12 p-0 rating-section">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Rate This Book </h3>
							<form method="post" id="comment-form">
								  @csrf
								<div class="account__form">
									<div class="row m-0">
										<div class="ratin-wrapper">
											<input type="radio" class="star" rate="5" name="rating" id="star-5"><label for="star-5"></label>
											<input type="radio" class="star" rate="4" name="rating" id="star-4"><label for="star-4"></label>
											<input type="radio" class="star" rate="3" name="rating" id="star-3"><label for="star-3"></label>
											<input type="radio" class="star" rate="2" name="rating" id="star-2"><label for="star-2"></label>
											<input type="radio" class="star" rate="1" name="rating" id="star-1"><label for="star-1"></label>
										</div>
										<input type="hidden" name="star-value" class="star-value">
										<input type="hidden" name="book_id" value="{{$book->bk_id}}">
										<div id="rate-value"></div>
									</div>
									<div class="input__box">
										<label for="">Your Comment</label>
										<input type="text" name="comment" required="" placeholder="Comment Here..." autocomplete="off">
									</div>
									<div class="form__btn">
										<button type="button" class="col-4 post">Post</button>
										<button type="button" class="col-4 cancel float-right">Cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--------- End Rating Section --------->

				<!--------- Start Rating Review --------->
					<div class="col-12 review-section">
						<h3 class="font-weight-bold">{{__('title.Review Book')}}</h3>
						<div class="row mt-3">
							<div class="col-lg-2 col-md-2 col-sm-2">
								<h1 class="font-weight-bold over-all">{{ $average }}/5</h1>
								<div class="stars">
								@php $averageRating = round($average, 0); @endphp 
								@for($i = 1; $i <= 5; $i++)
									@php $ratingClass =  " "; @endphp
									@if($i <= $averageRating)
										@php $ratingClass = "color"; @endphp
									@endif
									<i class="zmdi zmdi-star m-right {{ $ratingClass }}"></i>
								@endfor
								</div>
								<h6 class="rate-name">Book Rating</h6>
								@if($rated == 'no')
									<div class="col-11 rate-btn-position p-0">
										<button type="button" class="rate-btn">Rate The Book</button>
									</div>
								@endif
							</div>
							<div class="col-lg-10 col-md-10 col-sm-10 p-0 m__top">
								<div class="row p-0 progress-margin-bottom">
									<div class="col-lg-6 col-md-6 star-progress">
										<div class="progress-height">
											<div class="bg-secondary progress-height" style="width: {{ $fiveStarRatingPercent }};"></div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 five-star" style="font-size: 1.1rem;">
										<div class="d-flex">
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right color"></i>
											<p class="percentage">{{ $fiveStarRatingPercent }}</p>
										</div>
									</div>
								</div>
								<div class="row p-0 progress-margin-bottom">
									<div class="col-lg-6 col-md-6 star-progress">
										<div class="progress-height">
											<div class="bg-secondary progress-height" style="width: {{ $fourStarRatingPercent }};"></div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 five-star" style="font-size: 1.1rem;">
										<div class="d-flex">
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right"></i>
											<p class="percentage">{{ $fourStarRatingPercent }}</p>
										</div>
									</div>
								</div>
								<div class="row p-0 progress-margin-bottom">
									<div class="col-lg-6 col-md-6 star-progress">
										<div class="progress-height">
											<div class="bg-secondary progress-height" style="width: {{ $threeStarRatingPercent }};"></div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 five-star" style="font-size: 1.1rem;">
										<div class="d-flex">
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right"></i>
											<i class="zmdi zmdi-star m__right"></i>
											<p class="percentage">{{ $threeStarRatingPercent }}</p>
										</div>
									</div>
								</div>
								<div class="row p-0 progress-margin-bottom">
									<div class="col-lg-6 col-md-6 star-progress">
										<div class="progress-height">
											<div class="bg-secondary progress-height" style="width: {{ $twoStarRatingPercent }};"></div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 five-star" style="font-size: 1.1rem;">
										<div class="d-flex">
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right"></i>
											<i class="zmdi zmdi-star m__right"></i>
											<i class="zmdi zmdi-star m__right"></i>
											<p class="percentage">{{ $twoStarRatingPercent }}</p>
										</div>
									</div>
								</div>
								<div class="row p-0 progress-margin-bottom">
									<div class="col-lg-6 col-md-6 star-progress">
										<div class="progress-height">
											<div class="bg-secondary progress-height" style="width: {{ $oneStarRatingPercent }};"></div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 five-star" style="font-size: 1.1rem;">
										<div class="d-flex">
											<i class="zmdi zmdi-star m__right color"></i>
											<i class="zmdi zmdi-star m__right"></i>
											<i class="zmdi zmdi-star m__right"></i>
											<i class="zmdi zmdi-star m__right"></i>
											<i class="zmdi zmdi-star m__right"></i>
											<p class="percentage">{{ $oneStarRatingPercent }}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!--------- End Rating Review  ---------->
				<section class="mt-5 pl-3">
					<div class="container comment-rtl">
						<h5 class="font-weight-bold comment-rtl">{{__('title.Comments')}}</h5>
						<div class="col-lg-7 col-md-7 client-comment">
						@foreach($rate as $row3)
								<div class="individua-comment">
									<div class="d-flex mb-3" style="font-size: 1.4rem;">
										<h6 class="font-weight-middle mr-3">{{ $row3->clt_name }}</h6>
										@for($i = 1; $i <= 5; $i++)
											@php $ratingClass =  " "; @endphp
											@if($i <= $row3->br_rating_number)
												@php $ratingClass = "color"; @endphp
											@endif
											<i class="zmdi zmdi-star m-right {{ $ratingClass }}"></i>
										@endfor
									</div>
									<div>
										<p style="text-align: justify;" class="ml-3 mb-3">
											{{$row3->br_comment}}
										</p>
										<p class="comment-date">{{$row3->br_created_at}}</p>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 mt-3 mb-4" style="background-color:#dad7d7; height:2px;"></div>
						@endforeach
						</div>
					</div>
				</section>
        	</div>
        </div>
        <!-- End main Content -->
        <!-- PDF VIEWER -->
		<div id="quickview-wrapper">
		    <!-- Modal -->
		    <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">
		                <div class="modal-header modal__header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                </div>
		                <div class="modal-body">
		                    <div class="modal-product" style="height: 500px">
							    <object
								  data="{{Helper::get_link($book->bk_id, 'pdf' )}}"
								  type="application/pdf"
								  width="100%"
								  height="100%">
								  <iframe
								    src="{{Helper::get_link($book->bk_id, 'pdf' )}}"
								    width="100%"
								    height="100%"
								    style="border: none;">
								   <!--  <p>Your browser does not support PDFs.
								      <a href="https://example.com/test.pdf">Download the PDF</a>.</p> -->
								  </iframe>
								  
								</object>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- PDF VIEWER -->

		<!-- VIDEO PLAYER -->
		<div id="quickview-wrapper">
		    <!-- Modal -->
		    <div class="modal fade" id="videoModel" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">
		                <div class="modal-header modal__header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                </div>
		                <div class="modal-body">
		                    <div class="row"> 
		                    	<!-- <h1 style="margin: auto;"> {{$book->bk_title}} </h1>  -->
		                    	<video id="player" playsinline controls controlsList="nodownload" data-poster="{{ asset('/storage/app/books/cover/'.$book->bk_cover_photo) }}" style="width: 100%">
								  <source src="{{Helper::get_link($book->bk_id, 'video' )}}" type="video/mp4" />
								  <!-- <source src="/path/to/video.webm" type="video/webm" /> -->

								  <!-- Captions are optional -->
								  <!-- <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default /> -->
								</video>
        					</div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- VIDEO PLAYER -->
		

@endsection



@section('script')
<script src="{{ asset('public/assets/frontends') }}/js/plyr/plyr.js"></script>

<script type="text/javascript">

	// $('#video-player').click(function (){
	// 	$('#book-info').attr('hidden','');
	// 	$('#category-list').attr('hidden','');
	// 	$('#book-video').removeAttr('hidden');
	// })

	$('#audio-player-btn').click(function(){
		$('#audio-palyer').removeAttr('hidden');
	});

	$('#btn-pdf-download').click(function(){
		let id = $('#btn-pdf').attr('pdf-data-id');
		$('#pdf-record-id').val(id);
	});

	$('.star').click(function(){
			var rating_number = $(this).attr('rate');
			var rating_value = $('#rate-value');
			if(rating_number == '5'){
				rating_value.empty();
				rating_value.append("<h6 class='font-weight-bold ml-2 text-success'>Very Good</h6>");
			}else if(rating_number == '4'){
				rating_value.empty();
				rating_value.append("<h6 class='font-weight-bold ml-2 text-primary'>Good</h6>");
			}else if(rating_number == '3'){
				rating_value.empty();
				rating_value.append("<h6 class='font-weight-bold ml-2 text-info'>Normal</h6>");
			}else if(rating_number == '2'){
				rating_value.empty();
				rating_value.append("<h6 class='font-weight-bold ml-2 text-warning'>Poor</h6>");
			}else if(rating_number == '1'){
				rating_value.empty();
				rating_value.append("<h6 class='font-weight-bold ml-2 text-danger'>Very Poor</h6>");
			}
			$('.star-value').val(rating_number);
			$('.book_id').val($('#id').val());
			$('.post').click(function(){
				$.post("{{route('comment')}}", $('#comment-form').serialize(), function(success){
					if(success == 'comment-save'){
						location.reload();
					}
				});
			});
	});

	$('.rate-btn').click(function(){
		$('.review-section').hide();
		$('.rating-section').show();
	});
	$('.cancel').click(function(){
		$('.review-section').show();
		$('.rating-section').hide();
	});
	  // $('.video').click(function(){
	  // 	var id = $(this).attr('data-id');
	  // 	alert(id);
	  // })


</script>
@endsection