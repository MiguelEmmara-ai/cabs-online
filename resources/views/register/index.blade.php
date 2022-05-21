@extends('layouts.main')

@section('container')
    @php
    // Define variables and initialize with empty values
    $email = $username = $password = $confirm_password = '';
    $email_err = $username_err = $password_err = $confirm_password_err = '';
    @endphp

    @include('partials.navbar')
    <!-- Start: Registration Form with Photo -->
    <section class="register-photo" style="margin-top: 60px;">
        <!-- Start: Form Container -->
        <div class="form-container">
            <!-- Start: Image -->
            <div class="image-holder"></div>
            <!-- End: Image -->
            <form action="register" method="POST">
                @csrf

                <h2 class="text-center" style="margin-top: -18px;"><strong>Create</strong> an account.</h2>
                <p class="text-center" style="margin-top: 1px;">Partner with us to drive your own livelihood and more.<br>
                </p>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email" required
                        class="form-control @php echo !empty($email_err) ? 'is-invalid' : ''; @endphp"
                        value="@php echo $email; @endphp">
                    <span class="invalid-feedback">@php echo $email_err; @endphp</span>
                </div>
                <div class="mb-3">
                    <input type="text" name="username" placeholder="Username" required
                        class="form-control @php echo !empty($username_err) ? 'is-invalid' : ''; @endphp"
                        value="@php echo $username; @endphp">
                    <span class="invalid-feedback">@php echo $username_err; @endphp</span>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password" required
                        class="form-control @php echo !empty($password_err) ? 'is-invalid' : ''; @endphp"
                        value="@php echo $password; @endphp">
                    <span class="invalid-feedback">@php echo $password_err; @endphp</span>
                </div>
                <div class="mb-3">
                    <input type="password" name="confirm_password" placeholder="Password (repeat)" required
                        class="form-control @php echo !empty($confirm_password_err) ? 'is-invalid' : ''; @endphp"
                        value="@php echo $confirm_password; @endphp">
                    <span class="invalid-feedback">@php echo $confirm_password_err; @endphp</span>
                </div>
                <div class="mb-3">
                    <p><strong>Select Car You Have</strong><br></p>

                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="carsAvailability[]"
                                id="checkRadio1" value="Scooter">
                            <img src="assets/img/cars/Scooter.png" alt="Car 1">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="carsAvailability[]"
                                id="checkRadio2" value="Hatch Back">
                            <img src="assets/img/cars/Hatchback.png" alt="Car 2">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="carsAvailability[]"
                                id="checkRadio3" value="Suv">
                            <img src="assets/img/cars/Suv.png" alt="Car 3">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="carsAvailability[]"
                                id="checkRadio4" value="Sedan">
                            <img src="assets/img/cars/Sedan.png" alt="Car 4">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="carsAvailability[]"
                                id="checkRadio5" value="Van">
                            <img src="assets/img/cars/Van.png" alt="Car 5">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" required>I agree to the license
                            terms.</label>
                    </div>
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary d-block w-100" type="submit" name="signUp-button"
                        style="background: rgb(254,209,54);" value="Sign Up">
                </div>
                <a class="already" href="/login">Already have an account? Login here.</a>
            </form>
        </div>

        <!-- End: Form Container -->
    </section>
    <!-- End: Registration Form with Photo -->
@endsection
