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