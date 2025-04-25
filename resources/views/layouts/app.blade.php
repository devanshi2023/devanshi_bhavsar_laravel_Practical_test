<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --primary-light: #eef2ff;
            --secondary: #64748b;
            --secondary-light: #f8fafc;
            --yellow: #f59e0b;
            --danger: #ef4444;
            --success: #10b981;
            --info: #3b82f6;
            --bg: #f9fafb;
            --text: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.07), 0 5px 10px rgba(0, 0, 0, 0.05);
            --radius: 0.5rem;
            --transition: all 0.2s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-size: 16px;
        }

        /* Navigation */
        nav {
            background-color: white;
            padding: 0.75rem 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--border);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .nav-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
        }

        .nav-brand:hover {
            color: var(--primary-dark);
        }

        .nav-brand:before {
            content: '';
            display: inline-block;
            width: 1.5rem;
            height: 1.5rem;
            background-color: var(--primary);
            border-radius: 0.25rem;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 0.75rem;
        }

        nav ul li {
            display: inline-block;
        }

        nav ul li a {
            color: var(--text);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: var(--radius);
            transition: var(--transition);
        }

        nav ul li a:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        nav ul li a.active {
            background-color: var(--primary);
            color: white;
        }

        /* Main container */
        main {
            flex: 1;
            padding: 2rem 0;
        }

        .container {
            padding: 0 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        /* Card component */
        .card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
            overflow: hidden;
            border: 1px solid var(--border);
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            background-color: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text);
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Alert styles */
        .alert {
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            border-radius: var(--radius);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert:before {
            content: '';
            display: block;
            width: 1.25rem;
            height: 1.25rem;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .alert-success {
            background-color: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #065f46;
        }

        .alert-success:before {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%2310b981' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M22 11.08V12a10 10 0 1 1-5.93-9.14'%3E%3C/path%3E%3Cpolyline points='22 4 12 14.01 9 11.01'%3E%3C/polyline%3E%3C/svg%3E");
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #b91c1c;
        }

        .alert-danger:before {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23ef4444' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='10'%3E%3C/circle%3E%3Cline x1='12' y1='8' x2='12' y2='12'%3E%3C/line%3E%3Cline x1='12' y1='16' x2='12.01' y2='16'%3E%3C/line%3E%3C/svg%3E");
        }

        .alert-info {
            background-color: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #1e40af;
        }

        .alert-info:before {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%233b82f6' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='10'%3E%3C/circle%3E%3Cline x1='12' y1='16' x2='12' y2='12'%3E%3C/line%3E%3Cline x1='12' y1='8' x2='12.01' y2='8'%3E%3C/line%3E%3C/svg%3E");
        }

        /* Form elements */
        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
            color: var(--text);
        }

        input.form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            transition: var(--transition);
            background-color: white;
        }

        input.form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.25);
        }

        select.form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            background-color: white;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px;
            transition: var(--transition);
        }

        select.form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.25);
        }

        textarea.form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            min-height: 120px;
            transition: var(--transition);
            font-family: inherit;
            resize: vertical;
        }

        textarea.form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.25);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: var(--radius);
            transition: var(--transition);
            cursor: pointer;
            border: none;
            gap: 0.5rem;
        }

        .btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.25);
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        .btn-secondary {
            background-color: var(--secondary);
            color: white;
        }

        .btn-secondary:hover {
            background-color: #475569;
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626;
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        .btn-success {
            background-color: var(--success);
            color: white;
        }

        .btn-success:hover {
            background-color: #059669;
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        .btn-outline-primary {
            background-color: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-light);
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        .btn-block {
            display: flex;
            width: 100%;
        }

        /* Helper classes */
        .text-danger {
            color: var(--danger);
        }

        .text-success {
            color: var(--success);
        }

        small.form-text {
            display: block;
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .text-center {
            text-align: center;
        }

        /* Grid system */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -0.75rem;
            margin-left: -0.75rem;
        }

        .col,
        .col-6,
        .col-12,
        .col-md-6,
        .col-lg-4 {
            position: relative;
            width: 100%;
            padding-right: 0.75rem;
            padding-left: 0.75rem;
        }

        .col-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        /* Footer */
        footer {
            background-color: white;
            color: var(--text-muted);
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
            border-top: 1px solid var(--border);
        }

        /* Responsive design */
        @media screen and (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                padding: 1rem;
            }

            .nav-brand {
                margin-bottom: 1rem;
            }

            nav ul {
                flex-direction: column;
                width: 100%;
                gap: 0.5rem;
            }

            nav ul li {
                width: 100%;
            }

            nav ul li a {
                display: block;
                text-align: center;
            }

            .container {
                padding: 0 1rem;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }

        @media screen and (min-width: 768px) {
            .col-md-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media screen and (min-width: 992px) {
            .col-lg-4 {
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
        }

        /* Animation */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Custom components */
        .breadcrumb {
            display: flex;
            flex-wrap: wrap;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            list-style: none;
            background-color: var(--secondary-light);
            border-radius: var(--radius);
        }

        .breadcrumb-item+.breadcrumb-item {
            padding-left: 0.5rem;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            display: inline-block;
            padding-right: 0.5rem;
            color: var(--text-muted);
            content: "/";
        }

        .breadcrumb-item a {
            color: var(--primary);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--text-muted);
        }

        /* Badge */
        .badge {
            display: inline-block;
            padding: 0.25em 0.6em;
            font-size: 0.75rem;
            font-weight: 600;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.375rem;
        }

        .badge-primary {
            background-color: var(--primary-light);
            color: var(--primary-dark);
        }

        .badge-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: #065f46;
        }

        .badge-danger {
            background-color: rgba(239, 68, 68, 0.1);
            color: #b91c1c;
        }

        /* Table */
        table {
            width: 100%;
            margin-bottom: 1rem;
            color: var(--text);
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid var(--border);
        }

        table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid var(--border);
            background-color: var(--secondary-light);
            font-weight: 600;
            text-align: left;
        }

        table tbody+tbody {
            border-top: 2px solid var(--border);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.025);
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .table-bordered {
            border: 1px solid var(--border);
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid var(--border);
        }

        /* Checkbox and radio */
        .form-check {
            position: relative;
            display: block;
            padding-left: 1.25rem;
        }

        .form-check-input {
            position: absolute;
            margin-top: 0.3rem;
            margin-left: -1.25rem;
        }

        .form-check-label {
            margin-bottom: 0;
        }

        /* Progress */
        .progress {
            display: flex;
            height: 0.75rem;
            overflow: hidden;
            font-size: 0.75rem;
            background-color: var(--secondary-light);
            border-radius: var(--radius);
        }

        .progress-bar {
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
            text-align: center;
            white-space: nowrap;
            background-color: var(--primary);
            transition: width 0.6s ease;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-container">
            <a href="/" class="nav-brand">Laravel App</a>
            <ul>
                <li><a href="{{ route('customer.register') }}">Customer Register</a></li>
                <li><a href="{{ route('admin.register') }}">Admin Register</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="container">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            @yield('content')
        </div>
    </main>
</body>

</html>