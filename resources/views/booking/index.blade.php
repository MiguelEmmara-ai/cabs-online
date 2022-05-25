@extends('layouts.main')

@section('container')
    @include('partials.navbar')
    <!-- Start: Contact Form Clean -->
    <section class="contact-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <form action="/booking" method="POST" style="margin-top: 70px;max-width: 1000px;">
                        @csrf

                        <h2 class="text-center">Book A Ride</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thank you for your booking!',
                                    html: '{!! session('success') !!}',
                                    footer: '<a href="">Book Again</a>'
                                })
                            </script>
                        @endif

                        @if (session()->has('sbname'))
                            <script>
                                Swal.fire({
                                    icon: 'question',
                                    title: 'Going Somewhere?',
                                    text: 'We Just Need A Little Bit More Info For Our Taxi Riders',
                                    showDenyButton: true,
                                    confirmButtonText: 'OK',
                                    denyButtonText: 'Cancel',
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        Swal.fire('Lets Fill Out Some Info For Our Taxi Riders', '', 'info')
                                    } else if (result.isDenied) {
                                        location.href = "/cancel-booking";
                                    }
                                })
                            </script>
                        @endif

                        @if (session()->has('cancelSuccess'))
                            <script>
                                Swal.fire(
                                    'Canceled Success!',
                                    '{{ session('cancelSuccess') }}',
                                    'success'
                                )
                            </script>
                        @endif

                        <div class="mb-3">
                            <p><strong>First Name</strong></p>
                            <input type="text" id="fName" name="fName" placeholder="👤 Miguel"
                                class="form-control @error('fName') is-invalid @enderror" required autofocus
                                value="{{ old('fName') }}">

                            @error('fName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>Last Name</strong></p>
                            <input type="text" id="lName" name="lName" placeholder="👤 Emmara"
                                class="form-control @error('lName') is-invalid @enderror" required
                                value="{{ old('lName') }}">

                            @error('lName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>Contact Phone</strong></p>

                            @if (session()->exists('phone'))
                                @if (!empty(session()->get('phone')))
                                    <input type="text" id="phone" name="phoneNumber" placeholder="☎️ Format = 0123456789"
                                        class="form-control @error('phoneNumber') is-invalid @enderror" required
                                        value="{{ session()->get('phone') }}">
                                @else
                                    <input type="text" id="phone" name="phoneNumber" placeholder="☎️ Format = 0123456789"
                                        class="form-control @error('phoneNumber') is-invalid @enderror" required
                                        value="{{ old('phoneNumber') }}">
                                @endif
                            @else
                                <input type="text" id="phone" name="phoneNumber" placeholder="☎️ Format = 0123456789"
                                    class="form-control @error('phoneNumber') is-invalid @enderror" required
                                    value="{{ old('phoneNumber') }}">
                            @endif

                            @error('phoneNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <p><strong>Unit Number</strong></p>

                            <input type="text" id="unumber" name="unitNumber" placeholder="🏡 143"
                                class="form-control @error('unitNumber') is-invalid @enderror" required
                                value="{{ old('unitNumber') }}">

                            @error('unitNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>Street Number</strong></p>

                            <input type="text" id="snumber" name="streetNumber" placeholder="🏡 55"
                                class="form-control @error('streetNumber') is-invalid @enderror" required
                                value="{{ old('streetNumber') }}">

                            @error('streetNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>Street Name</strong><br></p>

                            <input type="text" id="stname" name="streetName" placeholder="🏡 Arrow Smith Road"
                                class="form-control @error('streetName') is-invalid @enderror" required
                                value="{{ old('streetName') }}">

                            @error('streetName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>Suburb Name</strong><br></p>

                            @if (session()->exists('sbname'))
                                @if (!empty(session()->get('sbname')))
                                    <input type="text" id="sbname" name="suburb" placeholder="🏙️ Auckland CBD"
                                        class="form-control @error('suburb') is-invalid @enderror" required
                                        value="{{ session()->get('sbname') }}">
                                @else
                                    <input type="text" id="sbname" name="suburb" placeholder="🏙️ Auckland CBD"
                                        class="form-control @error('suburb') is-invalid @enderror" required
                                        value="{{ old('suburb') }}">
                                @endif
                            @else
                                <input type="text" id="sbname" name="suburb" placeholder="🏙️ Auckland CBD"
                                    class="form-control @error('suburb') is-invalid @enderror" required
                                    value="{{ old('suburb') }}">
                            @endif

                            @error('sbname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <p><strong>Destination Suburb</strong><br></p>

                            @if (session()->exists('dsbname'))
                                @if (!empty(session()->get('dsbname')))
                                    <input type="text" id="dsbname" name="destinationSuburb" placeholder="🏙️ Manukau"
                                        class="form-control @error('destinationSuburb') is-invalid @enderror" required
                                        value="{{ session()->get('dsbname') }}">
                                @else
                                    <input type="text" id="dsbname" name="destinationSuburb" placeholder="🏙️ Manukau"
                                        class="form-control @error('destinationSuburb') is-invalid @enderror" required
                                        value="{{ old('destinationSuburb') }}">
                                @endif
                            @else
                                <input type="text" id="dsbname" name="destinationSuburb" placeholder="🏙️ Manukau"
                                    class="form-control @error('destinationSuburb') is-invalid @enderror" required
                                    value="{{ old('destinationSuburb') }}">
                            @endif

                            @error('sbname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <p><strong>Selected Car</strong><br></p>

                            @error('carsNeed')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-check form-check-inline">
                                <label>

                                    @if (session()->exists('carsNeed'))
                                        @if (!empty(session()->get('carsNeed')))
                                            @if (session()->get('carsNeed') == 'Scooter')
                                                <input class="form-check-input @error('carsNeed') is-invalid @enderror"
                                                    type="radio" name="carsNeed" id="carsNeed" value="Scooter" checked
                                                    required value="{{ session()->get('carsNeed') }}">
                                                <img src="assets/img/cars/Scooter.png" alt="Car 1">
                                            @else
                                                <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                    value="Scooter" required>
                                                <img src="assets/img/cars/Scooter.png" alt="Car 1">
                                            @endif
                                        @else
                                            @if (old('carsNeed') == 'Scooter')
                                                <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                    value="Scooter" checked required>
                                                <img src="assets/img/cars/Scooter.png" alt="Car 1">
                                            @else
                                                <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                    value="Scooter" checked required>
                                                <img src="assets/img/cars/Scooter.png" alt="Car 1">
                                            @endif
                                        @endif
                                    @else
                                        @if (old('carsNeed') == 'Scooter')
                                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                value="Scooter" checked required>
                                            <img src="assets/img/cars/Scooter.png" alt="Car 1">
                                        @else
                                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                value="Scooter" checked required>
                                            <img src="assets/img/cars/Scooter.png" alt="Car 1">
                                        @endif
                                    @endif

                                </label>
                            </div>

                            @php
                                $cars = ['Hatchback', 'Suv', 'Sedan', 'Van'];
                                $carCount = 2;
                            @endphp

                            @foreach ($cars as $car)
                                <div class="form-check form-check-inline">
                                    <label>
                                        @if (session()->exists('carsNeed'))
                                            @if (!empty(session()->get('carsNeed')))
                                                @if (session()->get('carsNeed') == $car)
                                                    <input class="form-check-input @error('carsNeed') is-invalid @enderror"
                                                        type="radio" name="carsNeed" id="carsNeed"
                                                        value={{ $car }} checked required
                                                        value="{{ session()->get('carsNeed') }}">
                                                    <img src="assets/img/cars/{{ $car }}.png"
                                                        alt="Car {{ $carCount }}">
                                                @else
                                                    <input class="form-check-input" type="radio" name="carsNeed"
                                                        id="carsNeed" value={{ $car }} required>
                                                    <img src="assets/img/cars/{{ $car }}.png"
                                                        alt="Car {{ $carCount }}">
                                                @endif
                                            @else
                                                @if (old('carsNeed') == $car)
                                                    <input class="form-check-input" type="radio" name="carsNeed"
                                                        id="carsNeed" value={{ $car }} checked required>
                                                    <img src="assets/img/cars/{{ $car }}.png"
                                                        alt="Car {{ $carCount }}">
                                                @else
                                                    <input class="form-check-input" type="radio" name="carsNeed"
                                                        id="carsNeed" value={{ $car }} required>
                                                    <img src="assets/img/cars/{{ $car }}.png"
                                                        alt="Car {{ $carCount }}">
                                                @endif
                                            @endif
                                        @else
                                            @if (old('carsNeed') == $car)
                                                <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                    value={{ $car }} checked required>
                                                <img src="assets/img/cars/{{ $car }}.png"
                                                    alt="Car {{ $carCount }}">
                                            @else
                                                <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                    value={{ $car }} required>
                                                <img src="assets/img/cars/{{ $car }}.png"
                                                    alt="Car {{ $carCount }}">
                                            @endif
                                        @endif

                                        @php

                                            $carCount++;
                                        @endphp
                                    </label>
                                </div>
                            @endforeach

                        </div>

                        <div class="mb-3">
                            <p><strong>Pick-Up Date</strong><br></p>

                            @if (session()->exists('pickUpDate'))
                                @if (!empty(session()->get('pickUpDate')))
                                    <input class="form-control form-control-lg @error('pickUpDate') is-invalid @enderror"
                                        type="date" id="pickUpDate" name="pickUpDate" required
                                        value={{ session()->get('pickUpDate') }}>
                                @else
                                    @if (empty(old('pickUpDate')))
                                        <input
                                            class="form-control form-control-lg @error('pickUpDate') is-invalid @enderror"
                                            type="date" id="pickUpDate" name="pickUpDate" required
                                            value={{ date('Y-m-d') }}>
                                    @else
                                        <input
                                            class="form-control form-control-lg @error('pickUpDate') is-invalid @enderror"
                                            type="date" id="pickUpDate" name="pickUpDate" required
                                            value={{ old('pickUpDate') }}>
                                    @endif
                                @endif
                            @else
                                @if (empty(old('pickUpDate')))
                                    <input class="form-control form-control-lg @error('pickUpDate') is-invalid @enderror"
                                        type="date" id="pickUpDate" name="pickUpDate" required value={{ date('Y-m-d') }}>
                                @else
                                    <input class="form-control form-control-lg @error('pickUpDate') is-invalid @enderror"
                                        type="date" id="pickUpDate" name="pickUpDate" required
                                        value={{ old('pickUpDate') }}>
                                @endif
                            @endif

                            @error('pickUpDate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            @php
                                $dateTime = new DateTime('now', new DateTimeZone('Pacific/Auckland'));
                            @endphp

                            <p><strong>Pick-Up Time</strong><br></p>

                            @if (empty(old('pickUpTime')))
                                <input class="form-control form-control-lg @error('pickUpTime') is-invalid @enderror"
                                    type="time" id="pickUpTime" name="pickUpTime" required
                                    value={{ $dateTime->format('H:i A') }}>
                            @else
                                <input class="form-control form-control-lg @error('pickUpTime') is-invalid @enderror"
                                    type="time" id="pickUpTime" name="pickUpTime" required value={{ old('pickUpTime') }}>
                            @endif

                            @error('pickUpTime')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="d-flex d-xxl-flex justify-content-xxl-center mb-3">
                            <input class="btn btn-secondary flex-fill" type="submit" name="book-button"
                                style="background: rgb(254,209,54);" value="Book">

                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <section id="map-head" class="map-clean" id="ride-map" style="margin-top: 70px;">
                        <div class="container">
                            <div class="intro">
                                <h3 class="text-center">Location </h3>
                                <p class="text-center">A Map For Your Convenience </p>
                            </div>
                        </div><iframe allowfullscreen frameborder="0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB3YYb5sin7I3vXQiaX02RIp9zQn91ClLY&amp;q=Auckland&amp;zoom=15"
                            width="100%" height="450"></iframe>
                    </section>
                </div>
            </div>
        </div>

    </section>
    <!-- End: Contact Form Clean -->
@endsection
