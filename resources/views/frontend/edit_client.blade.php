@extends('frontend/layout')

@section('style') 

@endsection

@section('body')
    <style>
        .input__box span
        {
            font-size: .8rem;
            color: #ff0000cc;
            font-weight: 500;
        }
    </style>
    
 <!-- Start Bradcaump area -->
 <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Edit Account</h2>
                            <!-- <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{route('default')}}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Registar</span>
                            </nav> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12" style="margin: 0 auto;">
						<div class="my__account__wrapper">
							<h3 class="account__title">Update </h3>
                            @if(Session::has('omardom'))
                                <div class="col-md-12 p-0">
                                    <div class="col-md-12 alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        {{ Session::get('omardom')}}
                                    </div>
                                </div>
                            @endif
							<form action="{{route('update-profile')}}" method="post">
								  @csrf
								<div class="account__form">
									<div class="input__box">
										<label>Your Name <span>*</span></label>
										<input type="text" name="name" value="{{$data->clt_name}}" required="">
									</div>
									<div class="input__box">
										<label>Email address <span>*</span></label>
										<input type="email" name="email" value="{{$data->clt_email}}" disabled>
									</div>
									<div class="input__box">
										<label>Old Password <span>*</span></label>
										<input type="password" id="old-pass-input" name="old-password" placeholder="Old Password... ">
                                        <span id="old-pass">Please Enter Old Password First</span>
									</div>
                                    <div class="row">
                                    <div class="input__box col-6">
										<label>New Password <span>*</span></label>
										<input type="password" id="new-pass-input" name="new-password" placeholder="New Password... ">
                                        <span id="new-pass"></span>
									</div>
                                    <div class="input__box col-6">
										<label>Confirm Password <span>*</span></label>
										<input type="password" id="conf-pass-input" name="conf-password" placeholder="Confirm Password... ">
                                        <span id="conf-pass"></span>
									</div>
                                    </div>
									<div class="form__btn">
										<button type="submit" class="submit-btn">Submit (Changes)</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->
@endsection

@section('script')

    <script>
            $('#old-pass').hide();
            $('#new-pass').hide();
            $('#conf-pass').hide();

            let oldPassError = true;
            $('#old-pass-input').keyup(function(){
                validateOldPassword();
            });
            function validateOldPassword(){
                let oldPassValue = $('#old-pass-input').val();
                if(oldPassValue == ''){
                    $('#old-pass').show();
                    oldPassError = false;
                    return false;
                }else if((oldPassValue.length < 8)){
                    $('#old-pass').show();
                    $('#old-pass').html('At least 8 characters');
                    oldPassError = false;
                    return false;
                }else if($.isNumeric(oldPassValue)){
                    $('#old-pass').show();
                    $('#old-pass').html('Only characters are allowed.!');
                    oldPassError = false;
                    return false;
                }else{
                    $('#old-pass').hide();
                    oldPassError = true;
                }
            }
            
            $('#new-pass-input').keyup(function(){
                if($('#old-pass-input').val() != ''){
                    validateNewPassword();
                }else{
                    $('#new-pass').show();
                    $('#new-pass').html('Please Enter Old Password First');
                }
                
            });
            let newPassError = true;
            function validateNewPassword(){
                let newPassValue = $('#new-pass-input').val();
                    if(newPassValue == ''){
                        $('#new-pass').show();
                        newPassError = false;
                        return false;
                    }else if((newPassValue.length < 8)){
                        $('#new-pass').show();
                        $('#new-pass').html('At least 8 characters');
                        newPassError = false;
                        return false;
                    }else if($.isNumeric(newPassValue)){
                        $('#new-pass').show();
                        $('#new-pass').html('Only characters are allowed.!');
                        newPassError = false;
                        return false;
                    }else{
                        $('#new-pass').hide();
                        newPassError = true;
                    }
            }

            $('#conf-pass-input').keyup(function(){
                if($('#old-pass-input').val() != ''){
                    validateconfPassword();
                }else{
                    $('#conf-pass').show();
                    $('#conf-pass').html('Please Enter Old Password First');
                }
            });
            let confPassError = true;
            function validateconfPassword(){
                let confPassValue = $('#conf-pass-input').val();
                if(confPassValue == ''){
                    $('#conf-pass').show();
                    confPassError = false;
                    return false;
                }else if((confPassValue.length < 8)){
                    $('#conf-pass').show();
                    $('#conf-pass').html('At least 8 characters');
                    confPassError = false;
                    return false;
                }else if(confPassValue != $('#new-pass-input').val()){
                    $('#conf-pass').show();
                    $('#conf-pass').html('Password does not match');
                    confPassError = false;
                    return false;
                }else if($.isNumeric(confPassValue)){
                    $('#conf-pass').show();
                    $('#conf-pass').html('Only characters are allowed.!');
                    confPassError = false;
                    return false;
                }else{
                    $('#conf-pass').hide();
                    confPassError = true;
                }
            }

            $('.submit-btn').click(function(){
                if((oldPassError == true) && (newPassError == true) && (confPassError)){
                    return true;
                }else{
                    return false;
                }
            });
        </script>
@endsection