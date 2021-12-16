@extends('frontend/layout')

@section('body')

  <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">{{__('title.BOOKS')}}</h2>
                            <!-- <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">BOOKS</span>
                            </nav> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		<!-- Start Portfolio Area -->
		<section class="wn__portfolio__area gallery__masonry__activation bg--white mt--40 pb--100">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="gallery__menu">
                            <button data-filter="*" class="is-checked">{{__('title.Filter - All')}}</button>
                            @foreach($category as $cat)
                            	<button data-filter=".cat--{{$cat->ct_id}}">
									@if(Session::get('locale') == 'en')
                                        {{$cat->ct_title}}
                                	@elseif(Session::get('locale') == 'fa')
                                        {{$cat->ct_title_dari}}
                                    @else
                                        {{$cat->ct_title_pashto}}
                                    @endif
								</button>
                            @endforeach
                      	</div>
					</div>
				</div>
				<div class="row masonry__wrap">
					@foreach($books as $row)
					<!-- Start Single Portfolio -->
					<div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--{{$row->bk_category_id}}">
						<div class="portfolio">
							<div class="thumb">
								<a href="{{route('information').'/'.$row->bk_id}}">
									<img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" alt="portfolio images">
								</a>
								<!-- <div class="search">
									<a href="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" data-lightbox="grportimg" data-title="My caption"><i class="zmdi zmdi-search"></i></a>
								</div> -->
								<div class="link">
									<a href="{{helper::fev_login_check($row->bk_id)}}" data-id='{{$row->bk_id}}' class="fevorite"> @php echo Helper::fav_check($row->favorite); @endphp  </a>
								</div>
							</div>
							<div class="content">
								<h6><a href="{{route('information').'/'.$row->bk_id}}">
									@if(Session::get('locale') == 'en')
                                        {{$row->bk_title}}
                                    @elseif(Session::get('locale') == 'fa')
                                        {{$row->bk_title_dari}}
                                    @else
                                    	{{$row->bk_title_pashto}}
                                    @endif
								</a></h6>
								<p>Read More</p>
							</div>
						</div>
					</div>
					<!-- End Single Portfolio -->
					@endforeach
				</div>

			</div>
			{{$books->links('vendor.pagination.Fpagination')}}
		</section>

		<!-- End Portfolio Area -->


@endsection

@section('script')
	<script type="text/javascript">
		$('.fevorite').click(function (e){
			id = $(this).attr('data-id');
			e.preventDefault();
			$.get('{{route('ffev')}}/'+id,function (data){
	            // alert(data);
				window.location.href = '/bbook/sign-in';
	        });

	        $(this).remove();
		})

	</script>
@endsection