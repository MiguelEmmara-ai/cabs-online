@extends('layouts.main')

@section('container')
    @include('partials.navbar')
    <!-- Start: Highlight Phone -->
    <section class="highlight-phone" style="background: rgb(254,251,240);height: 653px;padding-top: 113px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Start: Intro -->
                    <div class="intro">
                        <h2>About us</h2>
                        <p style="color: rgb(0,0,0);"><strong><em>Trusted Cab Services in All World</em></strong><br></p>
                        <p>Cabs Online, The go-getters. We are a tech company that connects the physical and digital worlds
                            to help make movement happen at the tap of a button. Because we believe in a world where
                            movement should be accessible. So you can move and earn safely. In a way that’s sustainable for
                            our planet. At Cabs Online, the pursuit of reimagination is never finished, never stops, and is
                            always just beginning.</p>
                        <a class="btn btn-primary" role="button" href="/booking"
                            style="margin-left: -4px;background: rgb(59,59,59);">Book A RIDE</a>
                    </div><!-- End: Intro -->
                </div>
                <div class="col-sm-4">
                    <!-- Start: Smartphone -->
                    <div class="d-none d-md-block phone-mockup"><img class="device" src="assets/img/taxi-1.jpg">
                        <div class="screen"></div>
                    </div><!-- End: Smartphone -->
                </div>
            </div>
        </div>
    </section>
    <!-- End: Highlight Phone -->

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
@endsection
