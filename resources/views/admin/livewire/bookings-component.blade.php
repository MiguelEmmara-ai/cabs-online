<div style="text-align: center">

    <button type="button" wire:click="allBookingDiv" class="btn btn-primary mx-1 mb-2 mt-2 live-test">
        Show & Hide All Bookings
    </button>

    <button type="button" wire:click="recentBookingDiv" class="btn btn-primary mx-1 mb-2 mt-2 live-test">
        Show & Hide Recent Bookings
    </button>

    <button type="button" wire:click="allAvailBookingDiv" class="btn btn-primary mx-1 mb-2 mt-2 live-test">
        Show & Hide All Available Bookings
    </button>

    {{-- Table Start --}}
    @if ($allBooking)
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <div id="tableID">

                        @if ($agent->isMobile())
                            <table class="table table-striped table tablesorter" id="ipi-table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">Booking ref no</th>
                                        <th class="text-center filter-false sorter-false">suburb</th>
                                        <th class="text-center filter-false sorter-false">destination suburb</th>
                                        <th class="text-center filter-false sorter-false">pickup date</th>
                                        <th class="text-center filter-false sorter-false">pickup time</th>
                                        <th class="text-center filter-false sorter-false">status</th>
                                        <th class="text-center filter-false sorter-false">Cars Need</th>
                                        <th class="text-center filter-false sorter-false">actions</th>
                                    </tr>
                                </thead>

                                @forelse ($allBookings as $allBooking)
                                    <tbody class="text-center">
                                        <tr id="{{ $allBooking->bookingRefNo }}">
                                            <td name="bookingRefNo">{{ $allBooking->bookingRefNo }}</td>
                                            <td>{{ $allBooking->suburb }}</td>
                                            <td>{{ $allBooking->destinationSuburb }}</td>
                                            <td>{{ $allBooking->pickUpDate }}</td>
                                            <td>{{ $allBooking->pickUpTime }}</td>
                                            <td>{{ $allBooking->status }}</td>
                                            <td><img src="/assets\img\cars\{{ $allBooking->carsNeed }}.png"
                                                    alt="{{ $allBooking->carsNeed }}"><br>{{ $allBooking->carsNeed }}
                                            </td>
                                            @if ($allBooking->status == 'Assigned')
                                                <td class="text-center align-middle"
                                                    style="max-height: 60px;height: 60px;">
                                                    <a class="btn btn-primary disabled" role="button"
                                                        aria-disabled="true">
                                                        MORE INFO
                                                </td>
                                            @else
                                                <td class="text-center align-middle"
                                                    style="max-height: 60px;height: 60px;">

                                                    <button type="submit" class="btn btn-primary" name="bookingRefNo"
                                                        data-bs-toggle="modal" data-bs-target="#moreInfoModal">
                                                        MORE INFO
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="moreInfoModal" tabindex="-1"
                                                        aria-labelledby="moreInfoModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="moreInfoModalLabel">
                                                                        Customer Name:
                                                                        {{ $allBooking->customerName }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Booking Ref No:
                                                                    {{ $allBooking->bookingRefNo }}
                                                                    <br>
                                                                    Customer Name: {{ $allBooking->customerName }}
                                                                    <br>
                                                                    Phone Number: {{ $allBooking->phoneNumber }}
                                                                    <br>
                                                                    Unit Number: {{ $allBooking->unitNumber }}
                                                                    <br>
                                                                    Street Number: {{ $allBooking->streetNumber }}
                                                                    <br>
                                                                    Street Name: {{ $allBooking->streetName }}
                                                                    <br>
                                                                    Suburb: {{ $allBooking->suburb }}
                                                                    <br>
                                                                    Destination Suburb:
                                                                    {{ $allBooking->destinationSuburb }}
                                                                    <br>
                                                                    Destination Suburb:
                                                                    {{ $allBooking->destinationSuburb }}
                                                                    <br>
                                                                    Pick Up Date:
                                                                    {{ $allBooking->pickUpDate }}
                                                                    <br>
                                                                    Pick Up Time:
                                                                    {{ $allBooking->pickUpTime }}
                                                                    <br>
                                                                    Status: {{ $allBooking->status }}
                                                                    <br>
                                                                    Cars Need: <img
                                                                        src="/assets\img\cars\{{ $allBooking->carsNeed }}.png"
                                                                        alt="{{ $allBooking->carsNeed }}">
                                                                    <br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>

                                                                    <form action="assign" method="post"
                                                                        class="d-inline">
                                                                        @csrf

                                                                        <button type="submit" name="bookingRefNo"
                                                                            value="{{ $allBooking->bookingRefNo }}"
                                                                            class="btn btn-primary"><i
                                                                                class="far fa-paper-plane"></i>&nbsp;ASSIGN</a></button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No Bookings
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        @else
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

                                @forelse ($allBookings as $allBooking)
                                    <tbody class="text-center">
                                        <tr id="{{ $allBooking->bookingRefNo }}">
                                            <td name="bookingRefNo">{{ $allBooking->bookingRefNo }}</td>
                                            <td>{{ $allBooking->customerName }}</td>
                                            <td>{{ $allBooking->phoneNumber }}</td>
                                            <td>{{ $allBooking->unitNumber }}</td>
                                            <td>{{ $allBooking->streetNumber }}</td>
                                            <td>{{ $allBooking->streetName }}</td>
                                            <td>{{ $allBooking->suburb }}</td>
                                            <td>{{ $allBooking->destinationSuburb }}</td>
                                            <td>{{ $allBooking->pickUpDate }}</td>
                                            <td>{{ $allBooking->pickUpTime }}</td>
                                            <td>{{ $allBooking->status }}</td>
                                            <td><img src="/assets\img\cars\{{ $allBooking->carsNeed }}.png"
                                                    alt="{{ $allBooking->carsNeed }}"><br>{{ $allBooking->carsNeed }}
                                            </td>
                                            <td>{{ $allBooking->assignedBy }}</td>
                                            @if ($allBooking->status == 'Assigned')
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
                                                            value="{{ $allBooking->bookingRefNo }}"
                                                            class="btn btn-primary"><i
                                                                class="far fa-paper-plane"></i>&nbsp;ASSIGN</a></button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @empty
                                    <tr>
                                        <td colspan="14" class="text-center">
                                            No Bookings
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        @endif
                        <div class="d-flex justify-content-end">
                            {{ $allBookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($recentBooking)
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <div id="tableID">

                        @if ($agent->isMobile())
                            <table class="table table-striped table tablesorter" id="ipi-table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">Booking ref no</th>
                                        <th class="text-center filter-false sorter-false">suburb</th>
                                        <th class="text-center filter-false sorter-false">destination suburb</th>
                                        <th class="text-center filter-false sorter-false">pickup date</th>
                                        <th class="text-center filter-false sorter-false">pickup time</th>
                                        <th class="text-center filter-false sorter-false">status</th>
                                        <th class="text-center filter-false sorter-false">Cars Need</th>
                                        <th class="text-center filter-false sorter-false">actions</th>
                                    </tr>
                                </thead>

                                @forelse ($recentBookings as $recentBooking)
                                    <tbody class="text-center">
                                        <tr id="{{ $recentBooking->bookingRefNo }}">
                                            <td name="bookingRefNo">{{ $recentBooking->bookingRefNo }}</td>
                                            <td>{{ $recentBooking->suburb }}</td>
                                            <td>{{ $recentBooking->destinationSuburb }}</td>
                                            <td>{{ $recentBooking->pickUpDate }}</td>
                                            <td>{{ $recentBooking->pickUpTime }}</td>
                                            <td>{{ $recentBooking->status }}</td>
                                            <td><img src="/assets\img\cars\{{ $recentBooking->carsNeed }}.png"
                                                    alt="{{ $recentBooking->carsNeed }}"><br>{{ $recentBooking->carsNeed }}
                                            </td>
                                            @if ($recentBooking->status == 'Assigned')
                                                <td class="text-center align-middle"
                                                    style="max-height: 60px;height: 60px;">
                                                    <a class="btn btn-primary disabled" role="button"
                                                        aria-disabled="true">
                                                        MORE INFO
                                                </td>
                                            @else
                                                <td class="text-center align-middle"
                                                    style="max-height: 60px;height: 60px;">

                                                    <button type="submit" class="btn btn-primary"
                                                        name="bookingRefNo" data-bs-toggle="modal"
                                                        data-bs-target="#moreInfoModal">
                                                        MORE INFO
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="moreInfoModal" tabindex="-1"
                                                        aria-labelledby="moreInfoModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="moreInfoModalLabel">
                                                                        Customer Name:
                                                                        {{ $recentBooking->customerName }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Booking Ref No:
                                                                    {{ $recentBooking->bookingRefNo }}
                                                                    <br>
                                                                    Customer Name: {{ $recentBooking->customerName }}
                                                                    <br>
                                                                    Phone Number: {{ $recentBooking->phoneNumber }}
                                                                    <br>
                                                                    Unit Number: {{ $recentBooking->unitNumber }}
                                                                    <br>
                                                                    Street Number: {{ $recentBooking->streetNumber }}
                                                                    <br>
                                                                    Street Name: {{ $recentBooking->streetName }}
                                                                    <br>
                                                                    Suburb: {{ $recentBooking->suburb }}
                                                                    <br>
                                                                    Destination Suburb:
                                                                    {{ $recentBooking->destinationSuburb }}
                                                                    <br>
                                                                    Destination Suburb:
                                                                    {{ $recentBooking->destinationSuburb }}
                                                                    <br>
                                                                    Pick Up Date:
                                                                    {{ $recentBooking->pickUpDate }}
                                                                    <br>
                                                                    Pick Up Time:
                                                                    {{ $recentBooking->pickUpTime }}
                                                                    <br>
                                                                    Status: {{ $recentBooking->status }}
                                                                    <br>
                                                                    Cars Need: <img
                                                                        src="/assets\img\cars\{{ $recentBooking->carsNeed }}.png"
                                                                        alt="{{ $recentBooking->carsNeed }}">
                                                                    <br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>

                                                                    <form action="assign" method="post"
                                                                        class="d-inline">
                                                                        @csrf

                                                                        <button type="submit" name="bookingRefNo"
                                                                            value="{{ $recentBooking->bookingRefNo }}"
                                                                            class="btn btn-primary"><i
                                                                                class="far fa-paper-plane"></i>&nbsp;ASSIGN</a></button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No Recent Bookings
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        @else
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

                                @forelse ($recentBookings as $recentBooking)
                                    <tbody class="text-center">
                                        <tr id="{{ $recentBooking->bookingRefNo }}">
                                            <td name="bookingRefNo">{{ $recentBooking->bookingRefNo }}</td>
                                            <td>{{ $recentBooking->customerName }}</td>
                                            <td>{{ $recentBooking->phoneNumber }}</td>
                                            <td>{{ $recentBooking->unitNumber }}</td>
                                            <td>{{ $recentBooking->streetNumber }}</td>
                                            <td>{{ $recentBooking->streetName }}</td>
                                            <td>{{ $recentBooking->suburb }}</td>
                                            <td>{{ $recentBooking->destinationSuburb }}</td>
                                            <td>{{ $recentBooking->pickUpDate }}</td>
                                            <td>{{ $recentBooking->pickUpTime }}</td>
                                            <td>{{ $recentBooking->status }}</td>
                                            <td><img src="/assets\img\cars\{{ $recentBooking->carsNeed }}.png"
                                                    alt="{{ $recentBooking->carsNeed }}"><br>{{ $recentBooking->carsNeed }}
                                            </td>
                                            <td>{{ $recentBooking->assignedBy }}</td>
                                            @if ($recentBooking->status == 'Assigned')
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
                                                            value="{{ $recentBooking->bookingRefNo }}"
                                                            class="btn btn-primary"><i
                                                                class="far fa-paper-plane"></i>&nbsp;ASSIGN</a></button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @empty
                                    <tr>
                                        <td colspan="14" class="text-center">
                                            No Recent Bookings
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        @endif
                        <div class="d-flex justify-content-end">
                            {{ $recentBookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($allAvailBooking)
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <div id="tableID">

                        @if ($agent->isMobile())
                            <table class="table table-striped table tablesorter" id="ipi-table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">Booking ref no</th>
                                        <th class="text-center filter-false sorter-false">suburb</th>
                                        <th class="text-center filter-false sorter-false">destination suburb</th>
                                        <th class="text-center filter-false sorter-false">pickup date</th>
                                        <th class="text-center filter-false sorter-false">pickup time</th>
                                        <th class="text-center filter-false sorter-false">status</th>
                                        <th class="text-center filter-false sorter-false">Cars Need</th>
                                        <th class="text-center filter-false sorter-false">actions</th>
                                    </tr>
                                </thead>

                                @forelse ($allAvailBookings as $allAvailBooking)
                                    <tbody class="text-center">
                                        <tr id="{{ $allAvailBooking->bookingRefNo }}">
                                            <td name="bookingRefNo">{{ $allAvailBooking->bookingRefNo }}</td>
                                            <td>{{ $allAvailBooking->suburb }}</td>
                                            <td>{{ $allAvailBooking->destinationSuburb }}</td>
                                            <td>{{ $allAvailBooking->pickUpDate }}</td>
                                            <td>{{ $allAvailBooking->pickUpTime }}</td>
                                            <td>{{ $allAvailBooking->status }}</td>
                                            <td><img src="/assets\img\cars\{{ $allAvailBooking->carsNeed }}.png"
                                                    alt="{{ $allAvailBooking->carsNeed }}"><br>{{ $allAvailBooking->carsNeed }}
                                            </td>
                                            @if ($allAvailBooking->status == 'Assigned')
                                                <td class="text-center align-middle"
                                                    style="max-height: 60px;height: 60px;">
                                                    <a class="btn btn-primary disabled" role="button"
                                                        aria-disabled="true">
                                                        MORE INFO
                                                </td>
                                            @else
                                                <td class="text-center align-middle"
                                                    style="max-height: 60px;height: 60px;">

                                                    <button type="submit" class="btn btn-primary"
                                                        name="bookingRefNo" data-bs-toggle="modal"
                                                        data-bs-target="#moreInfoModal">
                                                        MORE INFO
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="moreInfoModal" tabindex="-1"
                                                        aria-labelledby="moreInfoModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="moreInfoModalLabel">
                                                                        Customer Name:
                                                                        {{ $allAvailBooking->customerName }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Booking Ref No:
                                                                    {{ $allAvailBooking->bookingRefNo }}
                                                                    <br>
                                                                    Customer Name:
                                                                    {{ $allAvailBooking->customerName }}
                                                                    <br>
                                                                    Phone Number: {{ $allAvailBooking->phoneNumber }}
                                                                    <br>
                                                                    Unit Number: {{ $allAvailBooking->unitNumber }}
                                                                    <br>
                                                                    Street Number:
                                                                    {{ $allAvailBooking->streetNumber }}
                                                                    <br>
                                                                    Street Name: {{ $allAvailBooking->streetName }}
                                                                    <br>
                                                                    Suburb: {{ $allAvailBooking->suburb }}
                                                                    <br>
                                                                    Destination Suburb:
                                                                    {{ $allAvailBooking->destinationSuburb }}
                                                                    <br>
                                                                    Destination Suburb:
                                                                    {{ $allAvailBooking->destinationSuburb }}
                                                                    <br>
                                                                    Pick Up Date:
                                                                    {{ $allAvailBooking->pickUpDate }}
                                                                    <br>
                                                                    Pick Up Time:
                                                                    {{ $allAvailBooking->pickUpTime }}
                                                                    <br>
                                                                    Status: {{ $allAvailBooking->status }}
                                                                    <br>
                                                                    Cars Need: <img
                                                                        src="/assets\img\cars\{{ $allAvailBooking->carsNeed }}.png"
                                                                        alt="{{ $allAvailBooking->carsNeed }}">
                                                                    <br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>

                                                                    <form action="assign" method="post"
                                                                        class="d-inline">
                                                                        @csrf

                                                                        <button type="submit" name="bookingRefNo"
                                                                            value="{{ $allAvailBooking->bookingRefNo }}"
                                                                            class="btn btn-primary"><i
                                                                                class="far fa-paper-plane"></i>&nbsp;ASSIGN</a></button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No Available Bookings
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        @else
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

                                @forelse ($allAvailBookings as $allAvailBooking)
                                    <tbody class="text-center">
                                        <tr id="{{ $allAvailBooking->bookingRefNo }}">
                                            <td name="bookingRefNo">{{ $allAvailBooking->bookingRefNo }}</td>
                                            <td>{{ $allAvailBooking->customerName }}</td>
                                            <td>{{ $allAvailBooking->phoneNumber }}</td>
                                            <td>{{ $allAvailBooking->unitNumber }}</td>
                                            <td>{{ $allAvailBooking->streetNumber }}</td>
                                            <td>{{ $allAvailBooking->streetName }}</td>
                                            <td>{{ $allAvailBooking->suburb }}</td>
                                            <td>{{ $allAvailBooking->destinationSuburb }}</td>
                                            <td>{{ $allAvailBooking->pickUpDate }}</td>
                                            <td>{{ $allAvailBooking->pickUpTime }}</td>
                                            <td>{{ $allAvailBooking->status }}</td>
                                            <td><img src="/assets\img\cars\{{ $allAvailBooking->carsNeed }}.png"
                                                    alt="{{ $allAvailBooking->carsNeed }}"><br>{{ $allAvailBooking->carsNeed }}
                                            </td>
                                            <td>{{ $allAvailBooking->assignedBy }}</td>
                                            @if ($allAvailBooking->status == 'Assigned')
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
                                                            value="{{ $allAvailBooking->bookingRefNo }}"
                                                            class="btn btn-primary"><i
                                                                class="far fa-paper-plane"></i>&nbsp;ASSIGN</a></button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @empty
                                    <tr>
                                        <td colspan="14" class="text-center">
                                            No Available Bookings
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        @endif
                        <div class="d-flex justify-content-end">
                            {{ $allAvailBookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- Table End --}}

</div>
