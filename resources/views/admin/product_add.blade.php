@include('layout.admin_layout')
@section('main_content')

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <!-- MAIN CONTENT-->
        <div class="main-content">

            <div class="section__content section__content--p30">
                <div class="container-fluid row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <form method="POST" action="{{ url('admin/product/store') }}" enctype="multipart/form-data">
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
                                        <h3 class="text-center title-2">Add Product</h3>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="name" class="control-label mb-1">Product Name</label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="control-label mb-1">Product Image</label>

                                        <input id="image" name="image" type="file" class="form-control" ">
                                            </div>
                                            <div class="form-group">
                                                <label for="brand" class="control-label mb-1">Product Brand</label>
                                                <input id="brand" name="brand" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="model" class="control-label mb-1">Product Model</label>
                                                <input id="model" name="model" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="technical_specification" class="control-label mb-1">Technical
                                                    Specification</label>
                                                <input id="technical_specification" name="technical_specification" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="keywords" class="control-label mb-1">
                                                    Keywords</label>
                                                <input id="keywords" name="keywords" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="uses" class="control-label mb-1">
                                                    Uses</label>
                                                <input id="uses" name="uses" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="warranty" class="control-label mb-1">
                                                    Warranty</label>
                                                <input id="warranty" name="warranty" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="control-label mb-1">
                                                    Description</label>
                                                <textarea id="description" name="description" type="text" class="form-control" aria-required="true"
                                                    aria-invalid="false" required></textarea>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="category_id" class="control-label mb-1">
                                                    Category</label>
                                                <select id="category_id" name="category_id" class="form-control" required>
                                                    <option>Select Category</option>
                                                      @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach

                                        </select>

                                    </div>
                                    <div class="form-group has-success">
                                        <label for="status" class="control-label mb-1">
                                            Status</label>
                                        <input id="status" name="status" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" type="number" required
                                            value="1">
                                    </div>



                                </div>

                            </div>
                            <h3 class="mb-3">Product Attribute</h3>
                            <div class="" id="more_product_attribute">
                                <div class="card" id="add_more_attribute_1">

                                    <div class="card-body">
                                        <div class="row">

                                            <div class="form-group col-3">
                                                <label for="price" class="control-label mb-1">
                                                    Price</label>
                                                <input id="price" name="price[]" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" type="number" required>
                                            </div>


                                            <div class="form-group col-3">
                                                <label for="qty" class="control-label mb-1">
                                                    Quantitiy</label>
                                                <input id="qty" name="qty[]" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" type="number" required>
                                            </div>


                                            <div class="form-group col-3">
                                                <label for="mrp" class="control-label mb-1">
                                                    MRP</label>
                                                <input id="mrp" name="mrp[]" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" type="number" required>
                                            </div>


                                            <div class="form-group col-3">
                                                <label for="sku" class="control-label mb-1">
                                                    SKU</label>
                                                <input id="sku" name="sku[]" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" type="number" required>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-3">
                                                <label for="sku" class="control-label mb-1">
                                                    Color</label>
                                                <select id="color_id" name="color_id[]" class="form-control">
                                                    <option>Select Color</option>
                                                    @foreach ($colors as $color)
                                                        <option value="{{ $color->id }}" id="{{ $color->id }}">
                                                            {{ $color->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="form-group col-3">
                                                <label for="size" class="control-label mb-1">
                                                    Size</label>
                                                <select id="size_id" name="size_id[]" class="form-control">
                                                    <option>Select Size</option>
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size->id }}" id="{{ $size->id }}">
                                                            {{ $size->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="image" class="control-label mb-1">
                                                    Image</label>
                                                <input id="image" name="attribute_image[]" type="file"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    required>
                                            </div>
                                            <div class="col-2">

                                                <button class="btn btn-lg btn-info mt-4"
                                                    onclick="add_attribute()">Add</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Continue</span>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->

    </div>
    <script>
        var loop_count = 1;

        function add_attribute() {
            loop_count++;
            let attribute_html = '<div class = "card" id="add_more_attribute_' + loop_count +
                '"><div class="card-body row">';
            attribute_html +=
                '<div class="col-3 form-group"><label class="form-label" >Price</label><input class="form-control" id="price" name="price[]" required></div>';
            attribute_html +=
                '<div class="col-3 form-group"><label class="form-label" >Quantity</label><input class="form-control" id="qty" name="qty[]" required></div>';
            attribute_html +=
                '<div class="col-3 form-group"><label class="form-label" >MRP</label><input class="form-control" id="mrp" name="mrp[]" required></div>';

            attribute_html +=
                '<div class="col-3 form-group"><label class="form-label" >SKU</label><input class="form-control" id="sku" name="sku[]" required></div>';
            var color_data = jQuery('#color_id').html();
            attribute_html +=
                '<div class="col-3 form-group"><label class="form-label" >Color</label><select class="form-control" id="color_id" name="color_id[]">' +
                color_data + '</select></div>';
            var size_data = jQuery('#size_id').html();
            attribute_html +=
                '<div class="col-3 form-group"><label class="form-label" >Size</label><select class="form-control" id="size_id" name="size_id[]" >' +
                size_data + '</select></div>';
            attribute_html +=
                '<div class="col-4 form-group"><label class="form-label" >Image</label><input class="form-control" id="image" name="attribute_image[]" type="file" required></div>';
            attribute_html +=
                '<div class="col-2"><button class="btn btn-danger btn-lg mt-4" onClick="remove_attribute(' + loop_count +
                ')">Remove</button></div>';
            attribute_html += "</div></div>";
            jQuery('#more_product_attribute').append(attribute_html);
        }

        function remove_attribute(loop_count) {
            jQuery("#add_more_attribute_" + loop_count).remove();
        }
        CKEDITOR.replace('description');
    </script>
