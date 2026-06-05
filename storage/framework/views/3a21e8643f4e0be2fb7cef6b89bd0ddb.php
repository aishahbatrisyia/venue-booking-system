<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('page_title', 'IIUM Venue Booking'); ?></title>
    <meta name="description" content="IIUM Venue Booking System">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        :root {
            --brand-navy: #07122d;
            --brand-blue: #2563eb;
            --brand-blue-dark: #1d4ed8;
            --surface: #f4f7fb;
            --card: #ffffff;
            --muted: #6b7280;
            --border: #e5e7eb;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: var(--surface);
            color: #111827;
        }

        a {
            text-decoration: none;
        }

        .app-shell {
            display: flex;
            min-height: 100vh;
            background: var(--surface);
        }

        .sidebar {
            width: 280px;
            background: var(--brand-navy);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            padding: 1.5rem 1rem;
            border-right: 1px solid rgba(255, 255, 255, 0.06);
        }

        .brand-link {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            color: #ffffff;
            font-weight: 800;
            padding: 0.5rem 0.75rem 1rem;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(37, 99, 235, 0.18);
            color: #dbeafe;
            font-size: 1.1rem;
        }

        .sidebar-user {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 1rem 0.75rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.9rem;
        }

        .sidebar-avatar {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #e5e7eb;
            font-size: 1.15rem;
            flex-shrink: 0;
        }

        .nav-list {
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
        }

        .nav-link-custom {
            color: #cbd5e1;
            border-radius: 14px;
            padding: 0.85rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .nav-link-custom:hover {
            background: rgba(255, 255, 255, 0.06);
            color: #ffffff;
        }

        .nav-link-custom.active {
            background: var(--brand-blue);
            color: #ffffff;
            box-shadow: 0 10px 24px rgba(37, 99, 235, 0.28);
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 1rem 0.75rem 0;
        }

        .primary-pill-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            width: 100%;
            border: none;
            border-radius: 14px;
            background: var(--brand-blue);
            color: #ffffff;
            font-weight: 700;
            padding: 0.95rem 1rem;
            transition: background 0.2s ease;
        }

        .primary-pill-btn:hover {
            background: var(--brand-blue-dark);
            color: #ffffff;
        }

        .content-shell {
            flex: 1;
            padding: 2rem;
            overflow-x: hidden;
        }

        .page-header-card {
            background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 1.5rem 1.75rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 18px 42px rgba(15, 23, 42, 0.06);
        }

        .page-subtitle {
            color: var(--muted);
            margin-bottom: 0;
        }

        .metric-card {
            border: none;
            border-radius: 22px;
            padding: 1.25rem 1.35rem;
            color: #ffffff;
            min-height: 138px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.08);
        }

        .metric-label {
            font-size: 0.95rem;
            opacity: 0.9;
            font-weight: 600;
        }

        .metric-value {
            font-size: 2.3rem;
            font-weight: 800;
            margin-top: 1rem;
            line-height: 1;
        }

        .metric-card i {
            font-size: 1.25rem;
            background: rgba(255, 255, 255, 0.18);
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .metric-blue {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
        }

        .metric-green {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        }

        .metric-amber {
            background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%);
        }

        .metric-slate {
            background: linear-gradient(135deg, #475569 0%, #64748b 100%);
        }

        .metric-rose {
            background: linear-gradient(135deg, #e11d48 0%, #f43f5e 100%);
        }

        .table-card {
            border: 1px solid var(--border);
            border-radius: 24px;
            background: var(--card);
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.06);
        }

        .empty-state {
            border: 1px dashed #cbd5e1;
            border-radius: 20px;
            background: #f8fbff;
            padding: 2rem 1.5rem;
            text-align: center;
        }

        .empty-state i {
            font-size: 2rem;
            color: var(--brand-blue);
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.4rem 0.7rem;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 700;
        }

        .status-approved {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }

        .status-pending {
            background: #fffbeb;
            color: #b45309;
            border: 1px solid #fde68a;
        }

        .status-rejected {
            background: #fff1f2;
            color: #be123c;
            border: 1px solid #fecdd3;
        }

        .login-shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 2rem;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.12), transparent 28%),
                radial-gradient(circle at bottom right, rgba(124, 58, 237, 0.12), transparent 28%),
                #eef3fb;
        }

        .login-card {
            width: 100%;
            max-width: 510px;
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 30px 70px rgba(15, 23, 42, 0.12);
        }

        .login-banner {
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            color: #ffffff;
            padding: 2rem;
            text-align: center;
        }

        .login-body {
            padding: 1.75rem;
        }

        .soft-note {
            border-radius: 18px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1d4ed8;
            padding: 0.95rem 1rem;
            font-size: 0.95rem;
        }

        @media (max-width: 992px) {
            .app-shell {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .content-shell {
                padding: 1rem;
            }
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <?php echo $__env->yieldContent('body'); ?>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
    ></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\venue-booking-system\resources\views/layouts/app.blade.php ENDPATH**/ ?>