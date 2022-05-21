@extends('layouts.main')

@section('container')
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

                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email"
                        class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" name="username" placeholder="Username"
                        class="form-control @error('username') is-invalid @enderror" required
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="confirm_password" placeholder="Password (repeat)"
                        class="form-control @error('confirm_password') is-invalid @enderror" required>
                    @error('confirm_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <p><strong>Select Car You Have</strong><br></p>

                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="carsAvailability[]" id="checkRadio1"
                                value="Scooter" {{ in_array('Scooter', old('carsAvailability', [])) ? 'checked' : '' }}>
                            <img src="assets/img/cars/Scooter.png" alt="Car 1">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="carsAvailability[]" id="checkRadio2"
                                value="Hatch Back"
                                {{ in_array('Hatch Back', old('carsAvailability', [])) ? 'checked' : '' }}>
                            <img src="assets/img/cars/Hatchback.png" alt="Car 2">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="carsAvailability[]" id="checkRadio3"
                                value="Suv" {{ in_array('Suv', old('carsAvailability', [])) ? 'checked' : '' }}>
                            <img src="assets/img/cars/Suv.png" alt="Car 3">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="carsAvailability[]" id="checkRadio4"
                                value="Sedan" {{ in_array('Sedan', old('carsAvailability', [])) ? 'checked' : '' }}>
                            <img src="assets/img/cars/Sedan.png" alt="Car 4">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="carsAvailability[]" id="checkRadio5"
                                value="Van" {{ in_array('Van', old('carsAvailability', [])) ? 'checked' : '' }}>
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
