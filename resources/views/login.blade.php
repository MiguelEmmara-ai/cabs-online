@extends('layouts.main')

@section('container')
    @include('partials.navbar')
    {{-- Success Message For Driver Register --}}
    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Good job!',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif

    <!-- Start: Login Form Clean -->
    <section class="login-clean" style="padding-top: 180px;">
        <form action="login" method="POST">
            @csrf

            @php
                // Define variables and initialize with empty values
                $username = $password = '';
                $username_err = $password_err = $login_err = '';

                if (!empty($login_err)) {
                    echo '<div class="alert alert-danger text-center">' . $login_err . '</div>';
                }
            @endphp
            <div class="illustration">
                <h1 style="font-size: 30px;color: rgb(197,173,50);">Admin Login</h1><i class="la la-taxi"
                    style="color: rgb(254,209,54);"></i>
            </div>
            <div class="mb-3">
                <input type="text" name="username" placeholder="Username"
                    class="form-control @php echo !empty($username_err) ? 'is-invalid' : ''; @endphp"
                    value="@php echo $username; @endphp" required="">
                <span class="invalid-feedback">@php echo $username_err; @endphp</span>
            </div>
            <div class="mb-3">
                <input type="password" name="password" placeholder="Password"
                    class="form-control @php echo !empty($password_err) ? 'is-invalid' : ''; @endphp" required="">
                <span class="invalid-feedback">@php echo $password_err; @endphp</span>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary d-block w-100" type="submit" style="background: rgb(254,209,54);">Log
                    In</button>
            </div>
            <a class="already" href="/register">You don't have an account yet? Register here.</a>
        </form>
    </section>
    <!-- End: Login Form Clean -->
@endsection
