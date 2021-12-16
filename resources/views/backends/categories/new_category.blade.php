<style>
    div.mt-6{
        top: .6rem !important;
    }
    input.input-rtl{
        direction: rtl;
        font-weight: 600;
        font-size: 1rem;
    }
    label.label-rtl{
        right: 0;
        text-align: right;
    }
</style>
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card" >
                <div class="card-header">
                    <h4 class="card-title">Add new cetegory</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" method="post" action=" {{ route('insert-category')}}" >
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" class="form-control" name="title-en" placeholder="English Title ...">
                                                <div class="form-control-position">
                                                    <i class="feather icon-type"></i>
                                                </div>
                                                <label for="first-name-floating-icon">English Title</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" class="form-control" name="description-en" placeholder="English Description ...">
                                                <div class="form-control-position">
                                                    <i class="feather icon-alert-circle"></i>
                                                </div>
                                                <label for="first-name-floating-icon">English Description</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group form-group position-relative">
                                                <input type="text" class="form-control input-rtl" name="description-da" placeholder="توضیحات دری">
                                                <div class="form-control-position mt-6">
                                                    <i class="feather icon-alert-circle"></i>
                                                </div>
                                                <label for="iconLabelRight" class="label-rtl">توضیحات </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group form-group position-relative">
                                                <input type="text" class="form-control input-rtl" name="title-da" placeholder="عنوان دری ...">
                                                <div class="form-control-position mt-6">
                                                    <i class="feather icon-type"></i>
                                                </div>
                                                <label for="iconLabelRight" class="label-rtl">عنوان دری</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group form-group position-relative">
                                                <input type="text" class="form-control input-rtl" name="description-pa" placeholder="توضیحات پشتو">
                                                <div class="form-control-position mt-6">
                                                    <i class="feather icon-alert-circle"></i>
                                                </div>
                                                <label for="iconLabelRight" class="label-rtl">توضیحات </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group form-group position-relative">
                                                <input type="text" class="form-control input-rtl" name="title-pa" placeholder="عنوان پشتو ...">
                                                <div class="form-control-position mt-6">
                                                    <i class="feather icon-type"></i>
                                                </div>
                                                <label for="iconLabelRight" class="label-rtl">عنوان پشتو</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>