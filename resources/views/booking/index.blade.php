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
                                Swal.fire(
                                    'Thank you for your booking!',
                                    '{{ session('success') }}',
                                    'success'
                                )
                            </script>
                        @endif

                        <div class="mb-3">
                            <p><strong>First Name</strong></p>
                            <input type="text" id="fName" name="fName" placeholder="👤 Miguel"
                                class="form-control @error('fName') is-invalid @enderror" required
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
                            <input type="text" id="phone" name="phoneNumber" placeholder="☎️ Format = 0123456789"
                                class="form-control @error('phoneNumber') is-invalid @enderror" required
                                value="{{ old('phoneNumber') }}">
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
                            <input type="text" id="sbname" name="suburb" placeholder="🏙️ Auckland CBD"
                                class="form-control @error('suburb') is-invalid @enderror" required
                                value="{{ old('suburb') }}">
                            @error('suburb')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>Destination Suburb</strong><br></p>
                            <input type="text" id="dsbname" name="destinationSuburb" placeholder="🏙️ Manukau"
                                class="form-control @error('destinationSuburb') is-invalid @enderror" required
                                value="{{ old('destinationSuburb') }}">
                            @error('destinationSuburb')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>Selected Car</strong><br></p>

                            <div class="form-check form-check-inline">
                                <label>
                                    <input class="form-check-input" type="radio" name="carsNeed" id="inlineRadio1"
                                        value="Scooter" checked required>
                                    <img src="assets/img/cars/Scooter.png" alt="Car 1">
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input class="form-check-input" type="radio" name="carsNeed" id="inlineRadio2"
                                        value="Hatchback" required>
                                    <img src="assets/img/cars/Hatchback.png" alt="Car 2">
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input class="form-check-input" type="radio" name="carsNeed" id="inlineRadio3"
                                        value="Suv" required>
                                    <img src="assets/img/cars/Suv.png" alt="Car 3">
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input class="form-check-input" type="radio" name="carsNeed" id="inlineRadio4"
                                        value="Sedan" required>
                                    <img src="assets/img/cars/Sedan.png" alt="Car 4">
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input class="form-check-input" type="radio" name="carsNeed" id="inlineRadio5"
                                        value="Van" required>
                                    <img src="assets/img/cars/Van.png" alt="Car 5">
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            @php
                                $date = date('Y-m-d');
                            @endphp
                            <p><strong>Pick-Up Date</strong><br></p>
                            <input class="form-control form-control-lg" type="date" id="pickUpDate" name="pickUpDate"
                                required="" value=@php echo $date; @endphp>
                        </div>
                        <div class="mb-3">
                            @php
                                $dateTime = new DateTime('now', new DateTimeZone('Pacific/Auckland'));
                            @endphp
                            <p><strong>Pick-Up Time</strong><br></p>
                            <input class="form-control form-control-lg" type="time" id="pickUpTime" name="pickUpTime"
                                required="" value=@php echo $dateTime->format('H:i A'); @endphp>
                            <!-- @php echo $dateTime->format('H:i A'); @endphp -->
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
