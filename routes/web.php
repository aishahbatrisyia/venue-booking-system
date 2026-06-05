<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

if (! function_exists('renderShellPlaceholder')) {
    function renderShellPlaceholder(
        string $layout,
        string $title,
        string $description,
        array $stats = [],
        ?string $ctaLabel = null,
        ?string $ctaUrl = null
    ): string {
        return Blade::render(
            <<<'BLADE'
@extends($layout)

@section('page_title', $title)
@section('page_heading', $title)
@section('page_description', $description)

@section('content')
    <div class="row g-4">
        @if (!empty($stats))
            @foreach ($stats as $stat)
                <div class="col-md-6 col-xl-3">
                    <div class="metric-card {{ $stat['class'] }}">
                        <div>
                            <div class="metric-label">{{ $stat['label'] }}</div>
                            <div class="metric-value">{{ $stat['value'] }}</div>
                        </div>
                        <i class="bi {{ $stat['icon'] }}"></i>
                    </div>
                </div>
            @endforeach
        @endif

        <div class="col-12">
            <div class="table-card card border-0">
                <div class="card-body p-4 p-lg-5">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
                        <div>
                            <h5 class="fw-bold mb-2">{{ $title }}</h5>
                            <p class="text-muted mb-0">{{ $description }}</p>
                        </div>

                        @if ($ctaLabel && $ctaUrl)
                            <a href="{{ $ctaUrl }}" class="btn btn-primary rounded-pill px-4">
                                {{ $ctaLabel }}
                            </a>
                        @endif
                    </div>

                    <div class="empty-state">
                        <i class="bi bi-tools"></i>
                        <h6 class="fw-bold mt-3">Route and layout are ready</h6>
                        <p class="text-muted mb-0">
                            This page is a placeholder so the assigned member can continue here
                            without changing the shared project foundation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
BLADE,
            compact('layout', 'title', 'description', 'stats', 'ctaLabel', 'ctaUrl')
        );
    }
}

if (! function_exists('renderLoginPreview')) {
    function renderLoginPreview(): string
    {
        return Blade::render(
            <<<'BLADE'
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
BLADE
        );
    }
}

Route::redirect('/', '/login');

Route::get('/login', function () {
    return response(renderLoginPreview());
})->name('login');

Route::get('/logout', function () {
    return redirect()->route('login')->with('status', 'Logout placeholder route is wired.');
})->name('logout');

Route::prefix('user')->name('user.')->group(function (): void {
    Route::get('/dashboard', function () {
        return response(renderShellPlaceholder(
            'layouts.user',
            'User Dashboard',
            'Dashboard preview based on the project mock-up. Member 2 and Member 4 will connect authentication and booking data here.',
            [
                ['label' => 'My Approved Bookings', 'value' => '2', 'icon' => 'bi-check-circle-fill', 'class' => 'metric-green'],
                ['label' => 'My Pending Requests', 'value' => '3', 'icon' => 'bi-hourglass-split', 'class' => 'metric-amber'],
                ['label' => 'My Past Events', 'value' => '5', 'icon' => 'bi-archive-fill', 'class' => 'metric-slate'],
            ],
            'Browse Venues',
            route('venues.index')
        ));
    })->name('dashboard');
});

Route::get('/venues', function () {
    return response(renderShellPlaceholder(
        'layouts.user',
        'Browse Venues',
        'Venue page placeholder. Member 3 will build searchable venue cards and venue detail pages here.',
        [
            ['label' => 'Available Venues', 'value' => '3', 'icon' => 'bi-building-check', 'class' => 'metric-green'],
            ['label' => 'Booked Venues', 'value' => '1', 'icon' => 'bi-calendar-x', 'class' => 'metric-blue'],
            ['label' => 'Under Maintenance', 'value' => '1', 'icon' => 'bi-tools', 'class' => 'metric-rose'],
        ],
        'Back to Dashboard',
        route('user.dashboard')
    ));
})->name('venues.index');

Route::get('/venues/{venue}', function (int $venue) {
    return response(renderShellPlaceholder(
        'layouts.user',
        "Venue Detail Preview #{$venue}",
        'Member 3 will show venue description, capacity, image, and availability here.',
        [],
        'Create Booking Request',
        route('bookings.create', ['venue' => $venue])
    ));
})->name('venues.show');

Route::get('/bookings/create/{venue}', function (int $venue) {
    return response(renderShellPlaceholder(
        'layouts.user',
        "New Booking Request for Venue #{$venue}",
        'Member 4 will replace this with the full booking form, validation, and database submission flow.',
        [],
        'My Booking History',
        route('bookings.history')
    ));
})->name('bookings.create');

Route::post('/bookings', function () {
    return redirect()
        ->route('bookings.history')
        ->with('status', 'Booking store placeholder route is wired.');
})->name('bookings.store');

Route::get('/bookings/history', function () {
    return response(renderShellPlaceholder(
        'layouts.user',
        'My Booking History',
        'Booking history placeholder. Member 4 will load the user booking records and status badges here.',
        [
            ['label' => 'Approved', 'value' => '2', 'icon' => 'bi-check-circle-fill', 'class' => 'metric-green'],
            ['label' => 'Pending', 'value' => '2', 'icon' => 'bi-hourglass-split', 'class' => 'metric-amber'],
            ['label' => 'Rejected', 'value' => '1', 'icon' => 'bi-x-circle-fill', 'class' => 'metric-rose'],
        ],
        'Create New Request',
        route('bookings.create', ['venue' => 1])
    ));
})->name('bookings.history');

Route::get('/notifications', function () {
    return response(renderShellPlaceholder(
        'layouts.user',
        'Notifications',
        'Notification placeholder. Member 5 will show approval and rejection alerts here.',
        [],
        'Back to Dashboard',
        route('user.dashboard')
    ));
})->name('notifications.index');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/dashboard', function () {
        return response(renderShellPlaceholder(
            'layouts.admin',
            'Admin Dashboard',
            'Admin dashboard preview based on the project mock-up. Member 5 will plug real counts and recent requests here.',
            [
                ['label' => 'Active Events Today', 'value' => '4', 'icon' => 'bi-calendar-event-fill', 'class' => 'metric-blue'],
                ['label' => 'Pending Approvals', 'value' => '12', 'icon' => 'bi-hourglass-split', 'class' => 'metric-amber'],
                ['label' => 'Approved Requests', 'value' => '28', 'icon' => 'bi-check-circle-fill', 'class' => 'metric-green'],
                ['label' => 'Rejected Requests', 'value' => '3', 'icon' => 'bi-x-circle-fill', 'class' => 'metric-rose'],
            ],
            'View Pending Approvals',
            route('admin.bookings.index')
        ));
    })->name('dashboard');

    Route::get('/bookings', function () {
        return response(renderShellPlaceholder(
            'layouts.admin',
            'Booking Requests',
            'Pending approval placeholder. Member 5 will build the review table and actions here.',
            [],
            'Go to Dashboard',
            route('admin.dashboard')
        ));
    })->name('bookings.index');

    Route::get('/bookings/history', function () {
        return response(renderShellPlaceholder(
            'layouts.admin',
            'All Booking History',
            'Admin booking history placeholder. Member 5 will add full records and filters here.',
            [],
            'Pending Approvals',
            route('admin.bookings.index')
        ));
    })->name('bookings.history');

    Route::get('/bookings/{booking}', function (int $booking) {
        return response(renderShellPlaceholder(
            'layouts.admin',
            "Review Booking Request #{$booking}",
            'Member 5 will show request details, admin remarks, and approve/reject actions here.'
        ));
    })->name('bookings.show');

    Route::post('/bookings/{booking}/approve', function (int $booking) {
        return redirect()
            ->route('admin.bookings.show', ['booking' => $booking])
            ->with('status', 'Approve placeholder route is wired.');
    })->name('bookings.approve');

    Route::post('/bookings/{booking}/reject', function (int $booking) {
        return redirect()
            ->route('admin.bookings.show', ['booking' => $booking])
            ->with('status', 'Reject placeholder route is wired.');
    })->name('bookings.reject');

    Route::get('/venues', function () {
        return response(renderShellPlaceholder(
            'layouts.admin',
            'Venue Management',
            'Venue admin placeholder. Member 3 will build create, update, delete, and status management here.',
            [
                ['label' => 'Total Venues', 'value' => '5', 'icon' => 'bi-buildings-fill', 'class' => 'metric-blue'],
                ['label' => 'Available', 'value' => '3', 'icon' => 'bi-building-check', 'class' => 'metric-green'],
                ['label' => 'Booked', 'value' => '1', 'icon' => 'bi-calendar-x', 'class' => 'metric-amber'],
                ['label' => 'Maintenance', 'value' => '1', 'icon' => 'bi-tools', 'class' => 'metric-rose'],
            ]
        ));
    })->name('venues.index');

    Route::get('/users', function () {
        return response(renderShellPlaceholder(
            'layouts.admin',
            'User Roles',
            'User roles placeholder. Member 2 can later extend this if your group manages roles through the UI.'
        ));
    })->name('users.index');
});