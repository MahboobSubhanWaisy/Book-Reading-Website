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
                            <h2 class="content-header-title float-left mb-0">CATEGORIES</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">CATEGORIES
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
                    @foreach($categories as $row)
                        <div class="card ecommerce-card" id="atr-{{$row->ct_id}}">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="item-name">
                                        <a href="#" class="view-authors" data-id='{{ $row->ct_id }}'>
                                            {{ $row->ct_title }} 
                                        </a>
                                    </div>
                                    <div>
                                        <p class="item-description">
                                            @php
                                                echo $row->ct_description;
                                            @endphp
                                        </p>
                                    </div>
                                    <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                                        <div class="avatar-content">
                                            <i class="feather icon-award text-success font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-options text-center">

                                    <div class="wishlist editFrom" data-id='{{ $row->ct_id }}'>
                                        <i class="feather icon-edit"></i> Edit
                                    </div>
                                    <div class="wishlist remove-authors deleteInfo" data-id='{{ $row->ct_id }}'>
                                        <i class="feather icon-x align-middle"></i> Delete
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
                {{ $categories->links() }}
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

 <script src="{{ asset('public/assets/backends') }}/app-assets/js/scripts/pages/app-card.min.js"></script>


 <script type="text/javascript">
     // call for new form
 	$('#addNew').click(function(){
 		var mymodal = $('#xlarge');
        var body = $('#body-customs-contents');
        openDiv();
        $.get('{{route('add-category')}}',function (data){
            $(body).html(data);
        })
 	});

    // call for edit form
    $('.editFrom').on("click", function () {
        var mymodal = $('#xlarge');
        var body = $('#body-customs-contents');
        var id = $(this).attr('data-id');         
        openDiv();
        $.get('{{route('edit-category')}}/'+id,function (data){
            $(body).html(data);
        })
    });

     // call for view form
    $('.deleteInfo').on('click', function () {
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
            $.post('{{route('delete_category')}}/'+id,$("#formDelete").serialize(),function (data){
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



