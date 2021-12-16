<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/vendors/css/dropify/dropify.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/vendors/css/pickers/pickadate/pickadate.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/plugins/forms/wizard.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backends') }}/app-assets/css/colors.css">


<!-- Form wizard with number tabs section start -->
<section id="number-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">UPDADTE BOOK</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="number-tab-steps wizard-circle" method="POST" action="{{route('update-book') }}/{{$row->bk_id}}" enctype="multipart/form-data">
                            @csrf
                            <!-- English Data -->
                            <h6>English Section</h6>
                            <fieldset>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" id="first-name-floating-icon" value="{{$row->bk_title}}" required="" class="form-control" name="book-title-en" placeholder="Book title ...">
                                                <div class="form-control-position">
                                                    <i class="feather icon-type"></i>
                                                </div>
                                                <label for="first-name-floating-icon">Book title</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <!-- <p>Book category</p> -->
                                            <div class="form-group">
                                                <select required="" name="category" class="select2 form-control">
                                                    <option value="">Please select book category</option>
                                                @foreach($categories as $row1)
                                                    <option value="{{$row1->ct_id}}" @if($row->bk_category_id == $row1->ct_id) selected @endif >{{ $row1->ct_title}}</option>
                                                @endforeach               
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <fieldset class="form-label-group">
                                                <textarea class="form-control" name="description-en" required="" id="label-textarea" rows="3" placeholder="Description about book">
                                                    @php 
                                                        echo $row->bk_description;
                                                    @endphp
                                                </textarea>
                                                <label for="label-textarea"> Description about book</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <select required="" name="publisher" class="select2 form-control">c
                                                    <option value="">Please select publisher </option>
                                                @foreach($authors as $row1)
                                                    <option value="{{$row1->atr_id}}" @if($row->bk_author_id == $row1->atr_id) selected @endif >{{$row1->atr_name . ' ' . $row1->atr_last_name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type='text' id="date-floating-icon" name="publish-date" value="{{$row->bk_publish_date }}"  class="form-control pickadate-months-year" />
                                                <div class="form-control-position">
                                                    <i class="feather icon-calendar"></i>
                                                </div>
                                                <label for="date-floating-icon">Select publish date</label>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6 col-md-12 pb-2">
                                            <!--file-upload-->
                                            <div id="file-upload0" class="section">
                                                <div class="row section">
                                                    <div class="col s12 m8 l9">
                                                        <input type="file" id="input-file-now0" name="book-cover-en" class="dropify" data-max-file-size="0.5M" data-height="100" data-allowed-file-extensions="jpg JPEG jpeg JPG png PNG"  />
                                                        <label for="basicInputFile">Choose cover photo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 pb-2">
                                            <!--file-upload-->
                                            <div id="file-upload1" class="section">
                                                <div class="row section">
                                                    <div class="col s12 m8 l9">
                                                        <input type="file" id="input-file-now1" name="pdf-book" class="dropify" data-max-file-size="0.5M" data-height="100" data-allowed-file-extensions="PDF pdf"  />
                                                        <label for="basicInputFile">Choose PDF book </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 pb-2">
                                            <!--file-upload-->
                                            <div id="file-upload2" class="section">
                                                <div class="row section">
                                                    <div class="col s12 m8 l9">
                                                        <input type="file" id="input-file-now2" name="audio-book" class="dropify" data-height="100" data-allowed-file-extensions="mp3 MP3"  />
                                                        <label for="basicInputFile">Choose Audio book </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 pb-2">
                                            <!--file-upload-->
                                            <div id="file-upload3" class="section">
                                                <div class="row section">
                                                    <div class="col s12 m8 l9">
                                                        <input type="file" id="input-file-now3" name="flash-book" class="dropify" data-height="100" data-allowed-file-extensions="mp4 MP4"  />
                                                        <label for="basicInputFile">Choose Video </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Dari Data -->
                            <h6>Dari Section</h6>
                            <fieldset>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" id="first-name-floating-icon2" value="{{$row->bk_title_dari}}" class="form-control" name="book-title-da" placeholder="Book title ...">
                                                <div class="form-control-position">
                                                    <i class="feather icon-type"></i>
                                                </div>
                                                <label for="first-name-floating-icon">Book title</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <fieldset class="form-label-group">
                                                <textarea class="form-control" name="description-da" required="" id="label-textarea2" rows="4" placeholder="Description about book">
                                                    @php 
                                                        echo $row->bk_description_dari;
                                                    @endphp
                                                </textarea>
                                                <label for="label-textarea"> Description about book</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-12 pb-2">
                                            <!--file-upload-->
                                            <div id="file-upload0" class="section">
                                                <div class="row section">
                                                    <div class="col s12 m8 l9">
                                                        <input type="file" id="input-file-now4" name="book-cover-da" class="dropify" data-max-file-size="0.5M" data-height="100" data-allowed-file-extensions="jpg JPEG jpeg JPG png PNG" />
                                                        <label for="basicInputFile">Choose cover photo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Pashto Data -->
                            <h6>Pashto Section</h6>
                            <fieldset>
                                <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group position-relative has-icon-left">
                                                    <input type="text" id="first-name-floating-icon3" value="{{$row->bk_title_pashto}}" class="form-control" name="book-title-pa" placeholder="Book title ...">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-type"></i>
                                                    </div>
                                                    <label for="first-name-floating-icon">Book title</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="form-label-group">
                                                    <textarea class="form-control" name="description-pa" required="" id="label-textarea3" rows="4" placeholder="Description about book">
                                                    @php 
                                                        echo $row->bk_description_pashto;
                                                    @endphp
                                                    </textarea>
                                                    <label for="label-textarea"> Description about book</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 pb-2">
                                                <!--file-upload-->
                                                <div id="file-upload0" class="section">
                                                    <div class="row section">
                                                        <div class="col s12 m8 l9">
                                                            <input type="file" id="input-file-now5" name="book-cover-pa" class="dropify" data-max-file-size="0.5M" data-height="100" data-allowed-file-extensions="jpg JPEG jpeg JPG png PNG" />
                                                            <label for="basicInputFile">Choose cover photo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Form wizard with number tabs section end -->


 <script src="{{ asset('public/assets/backends') }}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
 <script src="{{ asset('public/assets/backends') }}/app-assets/vendors/js/dropify/dropify.min.js"></script>
 <script src="{{ asset('public/assets/backends') }}/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
 <script src="{{ asset('public/assets/backends') }}/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
 <script src="{{ asset('public/assets/backends') }}/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
<script src="{{ asset('public/assets/backends') }}/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="{{ asset('public/assets/backends') }}/app-assets/js/scripts/forms/wizard-steps.js"></script>


 <script type="text/javascript">
    // Basic Select2 select
    $(".select2").select2({
        // the following code is used to disable x-scrollbar when click in select input and
        // take 100% width in responsive also
        dropdownAutoWidth: true,
        width: '100%'
    });



     $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        }
    });

      // Month and Year Select Picker
    $('.pickadate-months-year').pickadate({
        selectYears: true,
        selectMonths: true
    });
 </script>