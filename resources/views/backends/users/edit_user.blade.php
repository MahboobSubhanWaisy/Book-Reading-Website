<section id="floating-label-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card" style="height: 100%;">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action=" {{ route('update-user').'/'.$user->u_id}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-label-group position-relative has-icon-left">
                                            <input type="text" required="" id="first-name-floating-icon" value="{{$user->u_name}}" class="form-control" name="fname" placeholder="First Name">
                                            <div class="form-control-position">
                                                <i class="feather icon-user"></i>
                                            </div>
                                            <label for="first-name-floating-icon">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group position-relative has-icon-left">
                                            <input type="text" required="" id="first-name-floating-icon" value="{{$user->u_lastname}}" class="form-control" name="lname" placeholder="Last Name">
                                            <div class="form-control-position">
                                                <i class="feather icon-user"></i>
                                            </div>
                                            <label for="first-name-floating-icon">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="basicInputFile">&nbsp</label>
                                        <div class="form-label-group position-relative has-icon-left">
                                            <input type="email" required="" disabled="" id="email-id-floating-icon" value="{{$user->u_email}}" class="form-control" name="email" placeholder="Email">
                                            <div class="form-control-position">
                                                <i class="feather icon-mail"></i>
                                            </div>
                                            <label for="email-id-floating-icon">Email</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Please choose image</label>
                                            <div class="custom-file">
                                                <input type="file" name="photo" class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="divider col-md-12">
                                        <div class="divider-text">Password</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group position-relative has-icon-left">
                                            <input type="password" id="contact-floating-icon" class="form-control" name="password" placeholder="Password ... ">
                                            <div class="form-control-position">
                                                <i class="feather icon-smartphone"></i>
                                            </div>
                                            <label for="contact-floating-icon">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group position-relative has-icon-left">
                                            <input type="password" id="contact-floating-icon" class="form-control" name="confirm_password" placeholder="confirm password">
                                            <div class="form-control-position">
                                                <i class="feather icon-smartphone"></i>
                                            </div>
                                            <label for="contact-floating-icon">Confirm password</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
    //Custom File Input
    $(".custom-file input").change(function (e) {
      $(this)
        .next(".custom-file-label")
        .html(e.target.files[0].name);
    });
</script>