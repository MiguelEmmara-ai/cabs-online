@extends('admin.layouts.main')

@section('container')
    @include('partials.navbar')
    <section>
        <!-- Start: Ludens - 1 Index Table with Search & Sort Filters  -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <h3 class="text-dark mb-4">Welcome Back, {{ auth()->user()->username }} </h3>
                </div>
                <div class="col-12 col-sm-6 col-md-6 text-end" style="margin-bottom: 30px;">
                    <a href="all" class="btn btn-primary mx-1 mb-2 showAll" role="button" name="showAllBtn">
                        <i class="fa fa-plus"></i>&nbsp;Show All Bookings </a>
                    <a href="recent" class="btn btn-primary mx-1 mb-2 showRecent" role="button" name="showRecentBtn">
                        <i class="fa fa-plus"></i>&nbsp;Show Recent Bookings </a>
                    <a href="avail" class="btn btn-primary mx-1 mb-2 showAvailPassengers" role="button"
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

                            @if ($errors->any())
                                <div class="alert alert-danger text-center">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                            <form action="" method="POST" class="form-inline">
                                @csrf

                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-control mb-2" type="text" name="bookingInput" id="booking"
                                            placeholder="Booking Number">
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" name="assignBtn" value="assignBtn"
                                            class="btn btn-primary flex-fill py-2 mb-2 assignBtn"
                                            formaction="{{ url('/admin/assign-button') }}">
                                            <i class="far fa-paper-plane"></i> Assign</button>

                                        <button type="submit" name="searchBtn" value="searchBtn"
                                            class="btn btn-primary flex-fill py-2 mb-2 assignBtn"
                                            formaction="{{ url('/admin/search-button') }}">
                                            <i class="far fa-paper-plane"></i> Search</button>
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
                                <table class="table table-striped table tablesorter" id="ipi-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">Booking ref no</th>
                                            <th class="text-center">customer name</th>
                                            <th class="text-center">phone number</th>
                                            <th class="text-center filter-false sorter-false">unit number</th>
                                            <th class="text-center filter-false sorter-false">street number</th>
                                            <th class="text-center filter-false sorter-false">street name</th>
                                            <th class="text-center filter-false sorter-false">suburb</th>
                                            <th class="text-center filter-false sorter-false">destination suburb</th>
                                            <th class="text-center filter-false sorter-false">pickup date</th>
                                            <th class="text-center filter-false sorter-false">pickup time</th>
                                            <th class="text-center filter-false sorter-false">status</th>
                                            <th class="text-center filter-false sorter-false">Cars Need</th>
                                            <th class="text-center filter-false sorter-false">Assigned By</th>
                                            <th class="text-center filter-false sorter-false">actions</th>
                                        </tr>
                                    </thead>

                                    @foreach ($passengers as $passenger)
                                        <tbody class="text-center">
                                            <tr id="{{ $passenger->bookingRefNo }}">
                                                <td name="bookingRefNo">{{ $passenger->bookingRefNo }}</td>
                                                <td>{{ $passenger->customerName }}</td>
                                                <td>{{ $passenger->phoneNumber }}</td>
                                                <td>{{ $passenger->unitNumber }}</td>
                                                <td>{{ $passenger->streetNumber }}</td>
                                                <td>{{ $passenger->streetName }}</td>
                                                <td>{{ $passenger->suburb }}</td>
                                                <td>{{ $passenger->destinationSuburb }}</td>
                                                <td>{{ $passenger->pickUpDate }}</td>
                                                <td>{{ $passenger->pickUpTime }}</td>
                                                <td>{{ $passenger->status }}</td>
                                                <td><img src="/assets\img\cars\{{ $passenger->carsNeed }}.png"
                                                        alt="{{ $passenger->carsNeed }}"><br>{{ $passenger->carsNeed }}
                                                </td>
                                                <td>{{ $passenger->assignedBy }}</td>
                                                @if ($passenger->status == 'Assigned')
                                                    <td class="text-center align-middle"
                                                        style="max-height: 60px;height: 60px;">
                                                        <a class="btn btn-primary disabled" role="button"
                                                            aria-disabled="true">
                                                            <i class="far fa-paper-plane"></i>&nbsp;ASSIGN</a>
                                                    </td>
                                                @else
                                                    <td class="text-center align-middle"
                                                        style="max-height: 60px;height: 60px;">

                                                        <form action="assign" method="post" class="d-inline">
                                                            @csrf

                                                            <button type="submit" name="bookingRefNo"
                                                                value="{{ $passenger->bookingRefNo }}"
                                                                class="btn btn-primary"><i
                                                                    class="far fa-paper-plane"></i>&nbsp;ASSIGN</a></button>
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                <div class="d-flex justify-content-end">
                                    {{ $passengers->links() }}
                                </div>
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
