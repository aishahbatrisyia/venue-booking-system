@extends('layouts.app')

@section('body')
@php
    $adminName = auth()->user()?->name ?? 'Admin User';
    $adminRole = auth()->user()?->role ?? 'System Administrator';

    $navItems = [
        ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'bi-grid-1x2-fill'],
        ['label' => 'Pending Approvals', 'route' => 'admin.bookings.index', 'icon' => 'bi-clipboard-check-fill'],
        ['label' => 'Venue Management', 'route' => 'admin.venues.index', 'icon' => 'bi-building-fill'],
        ['label' => 'All Booking History', 'route' => 'admin.bookings.history', 'icon' => 'bi-clock-history'],
        ['label' => 'User Roles', 'route' => 'admin.users.index', 'icon' => 'bi-people-fill'],
    ];
@endphp

<div class="app-shell">
    <aside class="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <span class="brand-icon"><i class="bi bi-bank2"></i></span>
            <span>
                <span class="d-block small text-white-50 fw-semibold">IIUM</span>
                <span class="d-block">Venue Booking</span>
            </span>
        </a>

        <div class="sidebar-user">
            <span class="sidebar-avatar"><i class="bi bi-person-fill"></i></span>
            <div>
                <div class="fw-bold">{{ $adminName }}</div>
                <div class="small text-white-50 text-capitalize">{{ str_replace('_', ' ', $adminRole) }}</div>
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
            <div class="small text-white-50">
                Foundation layout ready. Member 5 will continue the admin module here.
            </div>
        </div>
    </aside>

    <main class="content-shell">
        <div class="page-header-card">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
                <div>
                    <h1 class="h3 fw-bold mb-2">@yield('page_heading', 'Admin Dashboard')</h1>
                    <p class="page-subtitle">
                        @yield('page_description', 'Admin control panel for venue approvals and management.')
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