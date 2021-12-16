@extends('backends/layout')

@section('title') Authors @endsection



@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/pages/app-card.css">
@endsection


@section('body')

  <!--  BEGIN CONTENT AREA  -->
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">BOOKS</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">BOOKS
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm" id="addNew" type="button" ><i class="feather icon-plus"></i> <b> ADD NEW</b></button>
                            <button class="btn-icon btn btn-danger btn-round btn-sm" hidden="" id="btnClose" type="button" ><i class="feather icon-log-out"></i> <b> CLOSE</b></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body" id="body-contents">
                <!-- Contents Starts -->
                <section id="wishlist" class="grid-view wishlist-items">

                    @foreach($books as $row)
                        <div class="card ecommerce-card" id="atr-{{$row->bk_id}}">
                            <div class="card-content">
                                <div class="item-img text-center">
                                    <a href="#" class="view-authors" data-id='{{ $row->bk_id }}'>
                                        <img src="{{ asset('/storage/app/books/cover/'.$row->bk_cover_photo) }}" class="img-fluid" alt="img-placeholder">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="item-wrapper">
                                        <div class="item-rating">
                                            <div class="badge badge-primary badge-md">
                                                {{$row->author->atr_last_name}}
                                            </div>

                                            @foreach($row->book_attachment as $file )
                                                @if($file->at_type == 'audio')
                                                    <div class="badge badge-primary badge-md">
                                                        <i class="feather icon-music"></i>
                                                    </div>
                                                @endif
                                                @if($file->at_type == 'pdf')
                                                    <div class="badge badge-primary badge-md">
                                                        <i class="feather icon-book"></i>
                                                    </div>
                                                @endif
                                                @if($file->at_type == 'video')
                                                    <div class="badge badge-success badge-md">
                                                        <i class="feather icon-video"></i>
                                                    </div>
                                                @endif
                                            @endforeach
                                            
                                        </div>
                                        <div>
                                            <h6 class="item-price">
                                             {{$row->category->ct_title}}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="item-name">
                                        <a href="#" class="view-authors" data-id='{{ $row->bk_id }}'>
                                            {{ $row->bk_title }} 
                                        </a>
                                    </div>
                                    <div>
                                        <p class="item-description">
                                            @php
                                                echo $row->bk_description;
                                            @endphp
                                        </p>
                                    </div>
                                </div>
                                <div class="item-options text-center">
                                    <div class="cart view-authors" title="View Details" data-id='{{ $row->bk_id }}'>
                                        <i class="feather icon-eye"></i>
                                    </div>
                                    <div class="wishlist edit-authors" data-id='{{ $row->bk_id }}'>
                                        <i class="feather icon-edit"></i> Edit
                                    </div>
                                    <div class="wishlist remove-authors" data-id='{{ $row->bk_id }}'>
                                        <i class="feather icon-x align-middle"></i> Delete
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
                {{ $books->links() }}
                <!-- Contents Ends -->
            </div>

            <div class="content-body" hidden="" id="body-customs-contents" style="padding-bottom: 15px;"> </div>
        </div>
    </div>

@endsection

 <form method="post" action="{{route('delete_author')}}/" id="formDelete" hidden="">
    @csrf  
    <input type="text" value="" name="idNumber" id="idNumber">
</form>


@section('script')

 <script src="{{ asset('public/assets/backends') }}/app-assets/js/scripts/pages/app-card.js"></script>


 <script type="text/javascript">
     // call for new form
    $('#addNew').click(function(){
        var mymodal = $('#xlarge');
        var body = $('#body-customs-contents');
        openDiv();
        $.get('{{route('new-book')}}',function (data){
            $(body).html(data);
        })
    });

    // call for edit form
    $('.edit-authors').on("click", function () {
        var mymodal = $('#xlarge');
        var body = $('#body-customs-contents');
        var id = $(this).attr('data-id');         
        openDiv();
        $.get('{{route('edit-book')}}/'+id,function (data){
            $(body).html(data);
        })
    });

    // call for view form
    $('.view-authors').on("click", function () {
        var mymodal = $('#xlarge');
        var body = $('#body-customs-contents');     
        var id = $(this).attr('data-id');   
        openDiv();
        $.get('{{route('view-book')}}/'+id,function (data){
            $(body).html(data);
        })
    });

     // call for view form
    $('.remove-authors').on('click', function () {
        var id = $(this).attr('data-id');   
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          confirmButtonClass: 'btn btn-primary',
          cancelButtonClass: 'btn btn-danger ml-1',
          buttonsStyling: false,
        }).then(function (result) {
          if (result.value) {
            $('#idNumber').val(id);
            $.post('{{route('delete-book')}}/'+id,$("#formDelete").serialize(),function (data){
                if(data === 'true'){
                    Swal.fire({
                      type: "success",
                      title: 'Deleted!',
                      text: 'Your file has been deleted.',
                      confirmButtonClass: 'btn btn-success',
                    })
                    $('#atr-'+id).fadeOut(1000);

                    
                }else{
                    Swal.fire({
                      title: 'Cancelled',
                      text: 'Your imaginary file is safe :)',
                      type: 'error',
                      confirmButtonClass: 'btn btn-success',
                    })
                }

            });
            
          }
          else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
              title: 'Cancelled',
              text: 'Your imaginary file is safe :)',
              type: 'error',
              confirmButtonClass: 'btn btn-success',
            })
          }
        })
    });


    $('#success').on('click',function(){
      $.toast({
        title: 'Success',
        subtitle: '11 mins ago',
        content: 'Hello, world! This is a SUCCESS toast message.',
        type: 'success',
        delay: 5000
      });
    })

        

 </script>

 @endsection



