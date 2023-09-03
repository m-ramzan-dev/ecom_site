@include('layout.admin_layout')
@section('main_content')

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <!-- MAIN CONTENT-->
        <div class="main-content">

            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    @if (session('message'))
                        <div class="sufee-alert alert with-close alert-info alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <span class="badge badge-pill badge-danger">Failed</span>
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif

                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col">
                            <h3>All Categories</h3>
                        </div>
                        <div class="col-auto">
                            <a href="{{ url('admin/coupon/add') }}"><button class="btn btn-info mb-3">Add
                                    Coupon</button></a>
                        </div>
                    </div>

                    <table class="table table-borderless table-striped table-earning">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Coupon Title</th>
                                <th>Coupon Value</th>
                                <th>Coupon Code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->created_at }}</td>
                                    <td>{{ $coupon->title }}</td>
                                    <td>{{ $coupon->value }}</td>
                                    <td>{{ $coupon->code }}</td>

                                    <td><a href="{{ url('admin/coupon/edit/' . $coupon->id) }}"><button
                                                class="btn btn-info mr-3">Edit</button></a>
                                        @if ($coupon->status == 1)
                                            <a href="{{ url('admin/coupon/status/' . $coupon->id . '/' . '0') }}"><button
                                                    class="btn btn-info mr-3">Active</button></a>
                                        @elseif ($coupon->status == 0)
                                            <a href="{{ url('admin/coupon/status/' . $coupon->id . '/' . '1') }}"><button
                                                    class="btn btn-info mr-3">Inactive</button></a>
                                        @endif

                                        <a href="{{ url('admin/coupon/delete/' . $coupon->id) }}"><button
                                                class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>
