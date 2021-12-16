<section class="app-ecommerce-details">
    <div class="card">
        <div class="card-header">
            <h4>About</h4>
            <i class="feather icon-more-horizontal cursor-pointer"></i>
        </div>
        <div class="card-body">
            <div class="row mb-5 mt-2">
                <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" class="img-fluid" alt="product image">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h5>{{ $row->bk_title }}
                    </h5>
                    <p class="text-muted"> {{ $row->bk_description }}</p>
                    <div class="ecommerce-details-price d-flex flex-wrap">
                        <p class="text-primary font-medium-3 mr-1 mb-0">{{$row->category->ct_title}}</p>
                        <span class="pl-1 font-medium-3 border-left">
                        </span>
                        <span class="ml-50 text-dark font-medium-1">{{$row->author->atr_name . ' ' . $row->author->atr_last_name}}</span>
                    </div>
                    <hr>
                    <p>@php echo $row->atr_bio ; @endphp</p>
                    <p class="font-weight-bold mb-25"> <i class="feather icon-smartphone mr-50 font-medium-2"></i>{{$row->author->atr_phone_number}}</p>
                    <p class="font-weight-bold"> <i class="feather icon-mail mr-50 font-medium-2"></i>{{$row->author->atr_email}}</p>
                    <hr>
                    <div class="form-group">
                        <label class="font-weight-bold">Physcal Address</label>
                        <p>  {{ $row->author->atr_address}}</p>
                    </div>
                    <hr>
                </div>
                <div class="col-12 col-md-12" style="height: 720px;">
                    <h1> PDF </h1>
                    <object
                      data="{{Helper::get_link($row->bk_id, 'pdf' )}}"
                      type="application/pdf"
                      width="100%"
                      height="100%">
                      <iframe
                        src="{{Helper::get_link($row->bk_id, 'pdf' )}}"
                        width="100%"
                        height="100%"
                        style="border: none;">
                       <!--  <p>Your browser does not support PDFs.
                          <a href="https://example.com/test.pdf">Download the PDF</a>.</p> -->
                      </iframe>
                      
                    </object>
                </div>
                <div class="col-12 col-md-12">
                    <h1> VIDEO </h1> 
                    <video id="player" playsinline controls data-poster="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" style="width: 100%">
                      <source src="{{Helper::get_link($row->bk_id, 'video' )}}" type="video/mp4" />
                      <!-- <source src="/path/to/video.webm" type="video/webm" /> -->

                      <!-- Captions are optional -->
                      <!-- <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default /> -->
                    </video>
                </div>
                <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Clients Comment</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>NUMBER</th>
                                                    <th>CLIENT NAME</th>
                                                    <th>BOOK TITLE</th>
                                                    <th>BOOK RATE</th>
                                                    <th>CLIENT COMMENT</th>
                                                    <th>DATE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 0; @endphp
                                                @foreach($row->book_rating as $row2)
                                                    @php $i++; @endphp
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$row2->clt_name}}</td>
                                                        <td>{{$row->bk_title}}</td>
                                                        <td>{{$row2->pivot->br_rating_number}}</td>
                                                        <td>{{$row2->pivot->br_comment}}</td>
                                                        <td>{{$row2->pivot->br_created_at}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</section>