@extends('layouts.app')

@section('page_title', 'Login Preview')

@section('body')
    <div class="login-shell">
        <div class="login-card">
            <div class="login-banner">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-25 mb-3" style="width: 64px; height: 64px;">
                    <i class="bi bi-bank2 fs-3"></i>
                </div>
                <h1 class="h3 fw-bold mb-2">IIUM Venue Booking</h1>
                <p class="mb-0 opacity-75">Foundation setup is ready for the team.</p>
            </div>

            <div class="login-body">
                <div class="soft-note mb-4">
                    This is a temporary preview screen. Member 2 will replace this with the real login page.
                </div>

                <div class="d-grid gap-3">
                    <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-lg rounded-pill">
                        Preview User Layout
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-dark btn-lg rounded-pill">
                        Preview Admin Layout
                    </a>
                </div>

                <hr class="my-4">

                <div class="small text-muted">
                    Seeded test accounts:
                    <ul class="mb-0 mt-2">
                        <li>admin@iium.edu.my / Password123!</li>
                        <li>nurul.huda@live.iium.edu.my / Password123!</li>
                        <li>ahmad.zain@iium.edu.my / Password123!</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection