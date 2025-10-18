<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom styles --}}
    <style>
        body {
            background-color: #f5f6fa;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #1e1e2f;
            color: #fff;
            padding-top: 1rem;
        }

        .sidebar a {
            color: #bbb;
            text-decoration: none;
            display: block;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: 0.3s;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #ff6600;
            color: #fff;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .content {
            padding: 2rem;
        }

        .card {
            border: none;
            border-radius: 12px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        {{-- ===== Sidebar ===== --}}
        <div class="sidebar p-3">
            <h4 class="text-center mb-4">Admin Panel</h4>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                🏠 Dashboard
            </a>
            <a href="#">
                👥 Users
            </a>
            <a href="#">
                🛍 Products
            </a>
            <a href="#">
                💬 Comments
            </a>
            <hr>
            
        </div>

        {{-- ===== Main content ===== --}}
        <div class="flex-grow-1">
            <nav class="navbar px-4 py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title', 'Dashboard')</h5>
                <div>
                    <span class="me-3">{{ auth()->user()->name ?? 'Admin' }}</span>
                    <span class="badge bg-dark text-light">{{ auth()->user()->role ?? 'admin' }}</span>
                </div>
            </nav>

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
