@extends('layouts.main')

@section('container')
    @php
    // Define variables and initialize with empty values
    $fName = $lName = $phoneNumber = $unitNumber = $streetNumber = $streetName = $suburb = $destinationSuburb = $cars = '';
    $fName_err = $lName_err = $phoneNumber_err = $unitNumber_err = $streetNumber_err = $streetName_err = $suburb_err = $destinationSuburb_err = '';
    @endphp
    @include('partials.navbar')
    <!-- Start: Contact Form Clean -->
    <section class="contact-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <form action="{{ htmlspecialchars($_SERVER['PHP_SELF']) }}" method="POST"
                        style="margin-top: 70px;max-width: 1000px;">
                        <h2 class="text-center">Book A Ride</h2>
                        <div class="mb-3">
                            <p><strong>First Name</strong></p>
                            <input type="text" id="fName" name="fName" placeholder="👤 Miguel" required=""
                                class="form-control <?php echo !empty($fName_err) ? 'is-invalid' : ''; ?>" value="<?php echo $fName; ?>">
                            <span class="invalid-feedback"><?php echo $fName_err; ?></span>
                        </div>
                        <div class="mb-3">
                            <p><strong>Last Name</strong></p>
                            <input type="text" id="lName" name="lName" placeholder="👤 Emmara" required=""
                                class="form-control <?php echo !empty($lName_err) ? 'is-invalid' : ''; ?>" value="<?php echo $lName; ?>">
                            <span class="invalid-feedback"><?php echo $lName_err; ?></span>
                        </div>
                        <div class="mb-3">
                            <p><strong>Contact Phone</strong></p>
                            <input type="text" id="phone" name="phone" placeholder="☎️ Format = 0123456789" required=""
                                class="form-control <?php echo !empty($phoneNumber_err) ? 'is-invalid' : ''; ?>" value="<?php echo $phoneNumber; ?>">
                            <span class="invalid-feedback"><?php echo $phoneNumber_err; ?></span>
                        </div>
                        <div class="mb-3">
                            <p><strong>Unit Number</strong></p>
                            <input type="text" id="unumber" name="unumber" placeholder="🏡 143" required=""
                                class="form-control <?php echo !empty($unitNumber_err) ? 'is-invalid' : ''; ?>" value="<?php echo $unitNumber; ?>">
                            <span class="invalid-feedback"><?php echo $unitNumber_err; ?></span>
                        </div>
                        <div class="mb-3">
                            <p><strong>Street Number</strong></p>
                            <input type="text" id="snumber" name="snumber" placeholder="🏡 55" required=""
                                class="form-control <?php echo !empty($streetNumber_err) ? 'is-invalid' : ''; ?>" value="<?php echo $streetNumber; ?>">
                            <span class="invalid-feedback"><?php echo $streetNumber_err; ?></span>
                        </div>
                        <div class="mb-3">
                            <p><strong>Street Name</strong><br></p>
                            <input type="text" id="stname" name="stname" placeholder="🏡 Arrow Smith Road" required=""
                                class="form-control <?php echo !empty($streetName_err) ? 'is-invalid' : ''; ?>" value="<?php echo $streetName; ?>">
                            <span class="invalid-feedback"><?php echo $streetName_err; ?></span>
                        </div>
                        <div class="mb-3">
                            <p><strong>Suburb Name</strong><br></p>
                            <input type="text" id="sbname" name="sbname" placeholder="🏙️ Auckland CBD" required=""
                                class="form-control <?php echo !empty($suburb_err) ? 'is-invalid' : ''; ?>" value="<?php echo $suburb; ?>">
                            <span class="invalid-feedback"><?php echo $suburb_err; ?></span>
                        </div>
                        <div class="mb-3">
                            <p><strong>Destination Suburb</strong><br></p>
                            <input type="text" id="dsbname" name="dsbname" placeholder="🏙️ Manukau" required=""
                                class="form-control <?php echo !empty($destinationSuburb_err) ? 'is-invalid' : ''; ?>" value="<?php echo $destinationSuburb; ?>">
                            <span class="invalid-feedback"><?php echo $destinationSuburb_err; ?></span>
                        </div>
                        <div class="mb-3">
                            <p><strong>Selected Car</strong><br></p>

                            <div class="form-check form-check-inline">
                                <label>
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                        value="Scooter" checked required>
                                    <img src="./assets/img/cars/Scooter.png" alt="Car 1">
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                        value="Hatchback" required>
                                    <img src="./assets/img/cars/Hatchback.png" alt="Car 2">
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                                        value="Suv" required>
                                    <img src="./assets/img/cars/Suv.png" alt="Car 3">
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4"
                                        value="Sedan" required>
                                    <img src="./assets/img/cars/Sedan.png" alt="Car 4">
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5"
                                        value="Van" required>
                                    <img src="./assets/img/cars/Van.png" alt="Car 5">
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <?php
                            $date = date('Y-m-d');
                            ?>
                            <p><strong>Pick-Up Date</strong><br></p>
                            <input class="form-control form-control-lg" type="date" id="pickUpDate" name="pickUpDate"
                                required="" value=<?php echo $date; ?>>
                        </div>
                        <div class="mb-3">
                            <?php
                            $dateTime = new DateTime('now', new DateTimeZone('Pacific/Auckland'));
                            ?>
                            <p><strong>Pick-Up Time</strong><br></p>
                            <input class="form-control form-control-lg" type="time" id="pickUpTime" name="pickUpTime"
                                required="" value=<?php echo $dateTime->format('H:i A'); ?>>
                            <!-- <?php echo $dateTime->format('H:i A'); ?> -->
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
