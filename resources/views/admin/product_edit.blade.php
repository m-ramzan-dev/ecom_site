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
                        <form method="POST" action="{{ url('admin/product/update') }}">
                            @csrf
                            <div class="card">
                                @if (session('error'))
                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">
                                            Failed
                                        </span>
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Edit Product</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ url('admin/product/store') }}" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Product Name</label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required
                                                value="{{ $product->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="control-label mb-1">Product Image</label>

                                            <input id="image" name="image" type="file" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                        </div>
                                        <div class="form-group">
                                            <label for="brand" class="control-label mb-1">Product Brand</label>
                                            <input id="brand" name="brand" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required
                                                value="{{ $product->brand }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="model" class="control-label mb-1">Product Model</label>
                                            <input id="model" name="model" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required
                                                value="{{ $product->model }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="technical_specification" class="control-label mb-1">Technical
                                                Specification</label>
                                            <input id="technical_specification" name="technical_specification"
                                                type="text" class="form-control" aria-required="true"
                                                aria-invalid="false" required
                                                value="{{ $product->technical_specification }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="keywords" class="control-label mb-1">
                                                Keywords</label>
                                            <input id="keywords" name="keywords" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required
                                                value="{{ $product->keywords }}">
                                            <input type="hidden" name="id" id="id"
                                                value="{{ $product->id }}"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="uses" class="control-label mb-1">
                                                Uses</label>
                                            <input id="uses" name="uses" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required
                                                value="{{ $product->uses }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="warranty" class="control-label mb-1">
                                                Warranty</label>
                                            <input id="warranty" name="warranty" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required
                                                value="{{ $product->warranty }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="control-label mb-1">
                                                Description</label>
                                            <input id="description" name="description" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false" required
                                                value="{{ $product->description }}">
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="category_id" class="control-label mb-1">
                                                Category</label>
                                            <select id="category_id" name="category_id" class="form-control" required>
                                                <option>Select Category</option>
                                                @foreach ($categories as $cat)
                                                    @if ($cat->id == $product->category_id)
                                                        <option selected value="{{ $cat->id }}">{{ $cat->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                    @endif
                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="form-group has-success">
                                            <label for="status" class="control-label mb-1">
                                                Status</label>
                                            <input id="status" name="status" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" type="number" required
                                                value="{{ $product->status }}">
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

    </div>
