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
                        <img src="{{ asset('/storage/app/authors-photo/'.$author->atr_photo) }}" class="img-fluid" alt="product image">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h5>{{ $author->atr_name . ' ' . $author->atr_last_name}}
                    </h5>
                    <p class="text-muted"> {{ $author->atr_last_name }}</p>
                    <div class="ecommerce-details-price d-flex flex-wrap">
                        <p class="text-primary font-medium-3 mr-1 mb-0">$43.99</p>
                        <span class="pl-1 font-medium-3 border-left">
                            <i class="feather icon-star text-warning"></i>
                            <i class="feather icon-star text-warning"></i>
                            <i class="feather icon-star text-warning"></i>
                            <i class="feather icon-star text-warning"></i>
                            <i class="feather icon-star text-secondary"></i>
                        </span>
                        <span class="ml-50 text-dark font-medium-1">424 ratings</span>
                    </div>
                    <hr>
                    <p>@php echo $author->atr_bio ; @endphp</p>
                    <p class="font-weight-bold mb-25"> <i class="feather icon-smartphone mr-50 font-medium-2"></i>{{$author->atr_phone_number}}</p>
                    <p class="font-weight-bold"> <i class="feather icon-mail mr-50 font-medium-2"></i>{{$author->atr_email}}</p>
                    <hr>
                    <div class="form-group">
                        <label class="font-weight-bold">Physcal Address</label>
                        <p>  {{ $author->atr_address}}</p>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-facebook"></i></button>
                    <button type="button" class="btn btn-icon rounded-circle btn-outline-info mr-1 mb-1 waves-effect waves-light"><i class="feather icon-twitter"></i></button>
                    <button type="button" class="btn btn-icon rounded-circle btn-outline-danger mr-1 mb-1 waves-effect waves-light"><i class="feather icon-youtube"></i></button>
                    <button type="button" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-instagram"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>