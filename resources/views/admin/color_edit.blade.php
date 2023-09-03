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
                        <form method="POST" action="{{ url('admin/color/update') }}">
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
                                        <h3 class="text-center title-2">Edit Color</h3>
                                    </div>
                                    <hr>
                                    <form action="" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Color Name</label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required
                                                value="{{ $color['name'] }}">
                                        </div>

                                        <div class="form-group has-success">
                                            <label for="code" class="control-label mb-1">Color
                                                Status</label>
                                            <input id="status" name="status" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" type="number" required
                                                value="{{ $color['status'] }}">
                                            <input type="hidden" name="id" id="id"
                                                value="{{ $color->id }}"></input>
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
