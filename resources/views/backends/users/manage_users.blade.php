@extends('backends/layout')

@section('title') Users @endsection



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
                            <h2 class="content-header-title float-left mb-0">USERS</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">USERS
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

                    @foreach($users as $row)
                        <div class="card ecommerce-card" id="atr-{{$row->atr_id}}">
                            <div class="card-content">
                                <div class="item-img text-center">
                                    <a href="#" class="view-authors" data-id='{{ $row->atr_id }}'>
                                    	@if($row->u_image != '')
                                        	<img src=" {{asset('/storage/app/users/'.$row->u_image) }}" class="img-fluid" alt="img-placeholder">
                                        @else
                                        	<img src=" {{asset('storage/app/users/man-user-svgrepo-com.svg') }}" class="img-fluid" alt="img-placeholder">
                                        @endif

                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="item-wrapper">
                                        <div class="item-rating">
                                            <div class="badge badge-primary badge-md">
                                                <i class="feather icon-star ml-25"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="item-price" style="text-transform: capitalize;">
                                                {{$row->u_type}}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="item-name">
                                        <a href="#" class="view-authors" data-id='{{ $row->u_id }}'>
                                            {{ $row->u_name .' '. $row->u_lastname }} 
                                        </a>
                                    </div>
                                    <div>
                                        <p class="item-description">
                                            {{$row->u_email}}
                                        </p>
                                    </div>
                                </div>
                                <div class="item-options text-center">
                                    <!-- <div class="cart view-authors" title="View Details" data-id='{{ $row->u_id }}'>
                                        <i class="feather icon-eye"></i>
                                    </div> -->
                                    <div class="wishlist edit-authors" data-id='{{ $row->u_id }}'>
                                        <i class="feather icon-edit"></i> Edit
                                    </div>
                                    <div class="wishlist remove-authors" data-id='{{ $row->u_id }}'>
                                        <i class="feather icon-x align-middle"></i> Delete
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
                {{ $users->links() }}
                <!-- Contents Ends -->
            </div>

            <div class="content-body" hidden="" id="body-customs-contents" style="padding-bottom: 15px;"> </div>
        </div>
    </div>

@endsection

 <form method="post" action="{{route('delete_user')}}/" id="formDelete" hidden="">
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
        $.get('{{route('add-user')}}',function (data){
            $(body).html(data);
        })
    });

    // call for edit form
    $('.edit-authors').on("click", function () {
        var mymodal = $('#xlarge');
        var body = $('#body-customs-contents');
        var id = $(this).attr('data-id');         
        openDiv();
        $.get('{{route('edit-user')}}/'+id,function (data){
            $(body).html(data);
        })
    });

    // // call for view form
    // $('.view-authors').on("click", function () {
    //     var mymodal = $('#xlarge');
    //     var body = $('#body-customs-contents');     
    //     var id = $(this).attr('data-id');   
    //     openDiv();
    //     $.get('{{route('view_author')}}/'+id,function (data){
    //         $(body).html(data);
    //     })
    // });

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
            $.post('{{route('delete_author')}}/'+id,$("#formDelete").serialize(),function (data){
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



        

 </script>

 @endsection



