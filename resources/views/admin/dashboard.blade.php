@extends('admin.layout')

@section('content')
<h1 class="mb-4">Admin Dashboard</h1>

{{-- ===== Stats Cards ===== --}}
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-center p-3 shadow-sm">
            <h4>{{ $usersCount }}</h4>
            <p class="text-muted">Total Users</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center p-3 shadow-sm">
            <h4>{{ $productsCount }}</h4>
            <p class="text-muted">Total Products</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center p-3 shadow-sm">
            <h4>{{ $commentsCount }}</h4>
            <p class="text-muted">Total Comments</p>
        </div>
    </div>
</div>

{{-- ===== Users Table ===== --}}
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <span>👤 Latest Users</span>
        <a href="#" class="btn btn-sm btn-light">View All</a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted">No users yet</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ===== Products Table ===== --}}
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <span>🛍️ Latest Products</span>
        <a href="#" class="btn btn-sm btn-light">View All</a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>${{ $product->price }}</td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center text-muted">No products yet</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ===== Comments Table ===== --}}
<div class="card shadow-sm">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <span>💬 Latest Comments</span>
        <a href="#" class="btn btn-sm btn-light">View All</a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Text</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->user->name ?? 'N/A' }}</td>
                    <td>{{ $comment->product->title ?? 'N/A' }}</td>
                    <td>{{ Str::limit($comment->text, 40) }}</td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted">No comments yet</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
