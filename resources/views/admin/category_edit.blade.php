@include('layout.admin_layout')
@section('main_content')

    <!-- PAGE CONTAINER-->
    <div class="page-container">


        <!-- MAIN CONTENT-->
        <div class="main-content">

            <div class="section__content section__content--p30">
                <div class="container-fluid row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <form method="POST" action="{{ url('admin/category/update') }}">
                            @csrf
                            <div class="card">
                                @if (session('error'))
                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Failed</span>
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Add Category</h3>
                                    </div>
                                    <hr>
                                    <form action="" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="cat_name" class="control-label mb-1">Category Name</label>
                                            <input id="cat_name" name="cat_name" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required
                                                value="{{ $cat['name'] }}">
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1">Category
                                                Status</label>
                                            <input id="cat_status" name="cat_status" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" type="number" required
                                                value="1" value="{{ $cat['status'] }}">
                                            <input type="hidden" name="id" id="id"
                                                value="{{ $cat->id }}"></input>
                                        </div>


                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Continue</span>

                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>
