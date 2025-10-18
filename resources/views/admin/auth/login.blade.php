<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f8fa;
        }
        .login-card {
            max-width: 400px;
            margin: 80px auto;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .btn-orange {
            background-color: #ff6600;
            color: white;
        }
        .btn-orange:hover {
            background-color: #e65c00;
        }
    </style>
</head>
<body>

<div class="login-card card p-4">
    <h3 class="text-center mb-3">🔐 Admin Login</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required placeholder="admin@example.com">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required placeholder="••••••••">
        </div>
        <button type="submit" class="btn btn-orange w-100">Login</button>
    </form>
</div>

</body>
</html>
