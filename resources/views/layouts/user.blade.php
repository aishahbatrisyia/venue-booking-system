@extends('layouts.app')

@section('body')
@php
    $userName = auth()->user()?->name ?? 'Student User';
    $userRole = auth()->user()?->role ?? 'Undergraduate';

    $navItems = [
        ['label' => 'Dashboard', 'route' => 'user.dashboard', 'icon' => 'bi-grid-1x2-fill'],
        ['label' => 'Browse Venues', 'route' => 'venues.index', 'icon' => 'bi-buildings-fill'],
        ['label' => 'My Booking History', 'route' => 'bookings.history', 'icon' => 'bi-clock-history'],
        ['label' => 'Notifications', 'route' => 'notifications.index', 'icon' => 'bi-bell-fill'],
    ];
@endphp

<div class="app-shell">
    <aside class="sidebar">
        <a href="{{ route('user.dashboard') }}" class="brand-link">
            <span class="brand-icon"><i class="bi bi-bank2"></i></span>
            <span>
                <span class="d-block small text-white-50 fw-semibold">IIUM</span>
                <span class="d-block">Venue Booking</span>
            </span>
        </a>

        <div class="sidebar-user">
            <span class="sidebar-avatar"><i class="bi bi-person-fill"></i></span>
            <div>
                <div class="fw-bold">{{ $userName }}</div>
                <div class="small text-white-50 text-capitalize">{{ str_replace('_', ' ', $userRole) }}</div>
            </div>
        </div>

        <nav class="nav-list">
            @foreach ($navItems as $item)
                <a
                    href="{{ route($item['route']) }}"
                    class="nav-link-custom {{ request()->routeIs($item['route']) ? 'active' : '' }}"
                >
                    <i class="bi {{ $item['icon'] }}"></i>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <div class="sidebar-footer">
            <a href="{{ route('bookings.create', ['venue' => 1]) }}" class="primary-pill-btn">
                <i class="bi bi-plus-circle-fill"></i>
                <span>New Booking Request</span>
            </a>
        </div>
    </aside>

    <main class="content-shell">
        <div class="page-header-card">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
                <div>
                    <h1 class="h3 fw-bold mb-2">@yield('page_heading', 'User Dashboard')</h1>
                    <p class="page-subtitle">
                        @yield('page_description', 'Your personal venue booking overview.')
                    </p>
                </div>
                <div>
                    @yield('page_actions')
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success rounded-4 border-0 shadow-sm mb-4">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')
    </main>
</div>
@endsection