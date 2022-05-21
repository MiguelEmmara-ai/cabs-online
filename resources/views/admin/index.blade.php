@extends('admin.layouts.main')

@section('container')
    @include('partials.navbar')
    <section>
        @if (session()->has('success'))
            <script>
                Swal.fire(
                    'Congratulations!',
                    '{{ session('success') }}',
                    'success'
                )
            </script>
        @endif

        <!-- Start: Ludens - 1 Index Table with Search & Sort Filters  -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <h3 class="text-dark mb-4">Welcome Back, {{ auth()->user()->username }} </h3>
                </div>
                <div class="col-12 col-sm-6 col-md-6 text-end" style="margin-bottom: 30px;">
                    <a href="admin/all" class="btn btn-primary mx-1 mb-2 showAll" role="button" name="showAllBtn">
                        <i class="fa fa-plus"></i>&nbsp;Show All Bookings </a>
                    <a href="admin/recent" class="btn btn-primary mx-1 mb-2 showRecent" role="button" name="showRecentBtn">
                        <i class="fa fa-plus"></i>&nbsp;Show Recent Bookings </a>
                    <a href="admin/avail" class="btn btn-primary mx-1 mb-2 showAvailPassengers" role="button"
                        name="showAvailPassengersBtn">
                        <i class="fa fa-plus"></i>&nbsp;Show All Available Bookings </a>

                    <form action="/logout" method="POST" class="d-inline">
                        @csrf

                        <button type="submit" class="btn btn-primary mb-2">Log
                            Out <span data-feather="log-out"></span></button>
                    </form>

                </div>
            </div>
            <!-- Start: TableSorter -->
            <div class="card" id="TableSorterCard">
                <div class="card-header py-3">
                    <div class="row table-topper align-items-center justify-content-between">
                        <div class="col-md-4 text-start">
                            <p class="text-primary m-0 fw-bold">All Bookings</p>
                        </div>
                        <div class="col-md-2 py-2 text-end">
                            <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-control mb-2" type="text" name="booking" id="booking"
                                            placeholder="Booking Number">
                                    </div>

                                    <div class="col-auto">
                                        <button class="btn btn-primary flex-fill py-2 mb-2 assignBtn" type="submit">
                                            <i class="far fa-paper-plane"></i> ASSIGN
                                        </button>

                                        <a class="btn btn-primary mx-1 mb-2 searchBtn" role="button" name="sbutton"
                                            id="sbutton">
                                            <i class="fas fa-search"></i></i> Search </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <div id="tableID">
                                <b class="text-warning">Bookings info will be listed here.</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: TableSorter -->
        </div>
        <!-- End: Ludens - 1 Index Table with Search & Sort Filters  -->
    </section>
@endsection
