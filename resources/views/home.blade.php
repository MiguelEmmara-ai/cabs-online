@extends('layouts.main')

@section('container')
    @include('partials.homeHeader')

    <section id="about" style="margin-top: -75px;">
        <div class="container">
            <div class="row row-about">
                <div class="col-lg-12 text-center" data-aos="zoom-in" data-aos-duration="500" data-aos-once="true">
                    <h3 class="text-muted section-subheading"><i class="fa fa-dot-circle-o"
                            style="color: rgb(254,209,54);"></i><br><strong>Cabs Online Services</strong><br></h3>
                    <div id="div-about" class="text-center">
                        <h2 class="text-uppercase"><strong>HOW IT WORK</strong><br></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-group timeline">
                        <li class="list-group-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                            <div class="timeline-image"><img class="rounded-circle img-fluid"
                                    src="assets/img/about/tap.png"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><strong>Book In Just 2 Tabs</strong><br></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Just Click On Book A Ride > Fill Your Info > Click Book And
                                        You Are Good To Go!</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted" data-aos="zoom-in" data-aos-duration="1000"
                            data-aos-once="true">
                            <div class="timeline-image"><img class="rounded-circle img-fluid"
                                    src="assets/img/about/taxi-driver.png"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><strong>Get A Driver</strong><br></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Soon Driver Will Assign Your Book And On Your Way To You!</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                            <div class="timeline-image"><img class="rounded-circle img-fluid"
                                    src="assets/img/about/car.png"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><strong>Track Your Driver</strong><br></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Whether you are picking up or dropping off supplies you can
                                        track all your rides</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted" data-aos="zoom-in" data-aos-duration="1000"
                            data-aos-once="true">
                            <div class="timeline-image"><img class="rounded-circle img-fluid"
                                    src="assets/img/about/arrived.png"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><strong>Arrive Safely</strong><br></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">The road ahead may be long and winding but you'll make it
                                        there safe and sound!</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted" data-aos="zoom-in" data-aos-duration="1000"
                            data-aos-once="true">
                            <div class="timeline-image">
                                <h4>Be Part<br>&nbsp;Of Your Journey!<br></h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Start: Highlight Phone -->
    <section class="highlight-phone" style="background: rgb(255,192,0);">
        <div id="booking-cta" class="container text-center">
            <h3>Book A Ride Now</h3>
            <form class="row g-3" method="POST" action="continue-booking">
                @csrf

                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                value="Scooter" required>
                            <img src="assets/img/cars/Scooter.png" alt="Car 1">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                value="Hatchback" required>
                            <img src="assets/img/cars/Hatchback.png" alt="Car 2">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                value="Suv" checked required>
                            <img src="assets/img/cars/Suv.png" alt="Car 3">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                value="Sedan" required>
                            <img src="assets/img/cars/Sedan.png" alt="Car 4">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                value="Van" required>
                            <img src="assets/img/cars/Van.png" alt="Car 5">
                        </label>
                    </div>
                </div>

                <div class="col-md-3">
                    <input type="text" class="form-control" id="sbname" placeholder="🏡 From Address..." name="sbname">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="dsbname" placeholder="🏡 To..." name="dsbname">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="☎️ Phone Number" id="phone" name="phone">
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" id="pickUpDate" name="pickUpDate">
                </div>
                <div class="col-12">
                    <input class="btn btn-dark btn-lg" type="submit" name="book-button" style="border-radius: 40px;;"
                        value="Book A Ride">
                </div>
            </form>
        </div>
    </section><!-- End: Highlight Phone -->
    <!-- Start: Highlight Phone -->
    <section class="highlight-phone" style="background: rgb(254,251,240);">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Start: Intro -->
                    <div class="intro">
                        <div class="div-title">
                            <h2>About us</h2>
                        </div>
                        <p style="color: rgb(0,0,0);"><strong><em>Trusted Cab Services in All World</em></strong><br></p>
                        <p>Cabs Online, The go-getters. We are a tech company that connects the physical and digital worlds
                            to help make movement happen at the tap of a button. Because we believe in a world where
                            movement should be accessible. So you can move and earn safely. In a way that’s sustainable for
                            our planet. At Cabs Online, the pursuit of reimagination is never finished, never stops, and is
                            always just beginning.</p><a class="btn btn-primary" role="button" href="/booking"
                            style="margin-left: -4px;background: rgb(59,59,59);">Book A RIDE</a>
                    </div><!-- End: Intro -->
                </div>
                <div class="col-sm-4">
                    <!-- Start: Smartphone -->
                    <div class="d-none d-md-block phone-mockup taxi-about-img"><img class="device"
                            src="assets/img/taxi-1.jpg">
                        <div class="screen"></div>
                    </div><!-- End: Smartphone -->
                </div>
            </div>
        </div>
    </section>
    <!-- End: Highlight Phone -->
    <section data-aos="zoom-in" data-aos-duration="1150" data-aos-once="true" class="py-5">
        <h3 id="seen" class="text-center">As Seen On</h3>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto"
                            src="assets/img/clients/google.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto"
                            src="assets/img/clients/facebook.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto"
                            src="assets/img/clients/airbnb.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a href="#"><img class="img-fluid d-block mx-auto"
                            src="assets/img/clients/netflix.jpg"></a></div>
            </div>
        </div>
    </section>
    <!-- Start: Highlight Phone -->
    <section class="highlight-phone" style="background: rgb(255,192,0);">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Start: Intro -->
                    <div class="intro">
                        <h5 style="color: rgb(0,0,0);">Join The Team<br></h5>
                        <h2><strong>Become Our Driver, Work On Your Term!</strong><br></h2>
                    </div><!-- End: Intro -->
                </div>
                <div class="col-sm-4">
                    <a class="btn btn-lg btn-dark driver-btn" role="button" href="/register">Become A Driver</a>
                </div>
            </div>
        </div>
    </section><!-- End: Highlight Phone -->
    <section id="services" style="padding-top: 90px;background: #111111;color: rgb(255,255,255);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="margin-top: -20px;">
                    <h3 class="text-muted section-subheading"><i class="fa fa-dot-circle-o"
                            style="background: rgba(254,209,54,0);color: rgb(254,209,54);"></i><br><strong>Cabs Online
                            benefit list</strong><br></h3>
                    <h2 class="text-uppercase section-heading benefit-space">Why choose us</h2>
                </div>
            </div>
            <div class="row text-center align-up">
                <div class="col-md-4"><span class="fa-stack fa-4x"><i
                            class="fa fa-circle fa-stack-2x text-primary"></i><i
                            class="fas fa-child fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Safety Guarantee</h4>
                    <p class="text-muted">Tell your loved ones where you are. Keep your contact details confidential.
                        Get help at the tap of a button.</p>
                </div>
                <div class="col-md-4"><span class="fa-stack fa-4x"><i
                            class="fa fa-circle fa-stack-2x text-primary"></i><i
                            class="fa fa-drivers-license-o fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Clear Drivers</h4>
                    <p class="text-muted">All our drivers with background checks to real-time verification, safety is a
                        top priority every single day.</p>
                </div>
                <div class="col-md-4"><span class="fa-stack fa-4x"><i
                            class="fa fa-circle fa-stack-2x text-primary"></i><i
                            class="fa fa-dollar fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Cheap Rate</h4>
                    <p class="text-muted">Compare prices on every kind of ride, from daily commutes to special evenings
                        out.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
