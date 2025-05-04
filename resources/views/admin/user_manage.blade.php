@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')

<style>
    .container {
        max-width: 900px;
        margin: 40px auto;
        background: #ffffff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
    }
    
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .header h1 {
        color: #001f7f;
        font-size: 24px;
        font-weight: bold;
    }

    .btn-add {
        background-color: #000080;
        color: white;
        padding: 10px 15px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-add:hover {
        background-color: #001f7f;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #f8f9fb;
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #001f7f;
        color: white;
        font-weight: bold;
    }

    .btn-action {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
    }

    .btn-edit {
        background-color: #ffc107;
        color: black;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
        border: none;
    }

    .btn-edit:hover {
        background-color: #218838;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }
</style>

<div class="container">
<h1 style="
    text-align: center;
">User Management</h1>
    <div class="header">
       
        <a href="{{ route('admin.create_user') }}" class="btn-add">+ Add User</a>
    </div>

    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('admin.edit_user', $user->id) }}" class="btn-action btn-edit">Update</a>
                        <form action="{{ route('admin.delete_user', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection