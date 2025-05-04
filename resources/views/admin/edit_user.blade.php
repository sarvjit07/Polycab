@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST" action="{{ route('admin.update_user', $user->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ $user->phone }}" required>
        </div>
        <div>
    <label for="role">Role:</label>
    <select id="role" name="role" required>
        <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
        <option value="Project Manager" {{ $user->role == 'Project Manager' ? 'selected' : '' }}>Project Manager</option>
        <option value="Site Engineer" {{ $user->role == 'Site Engineer' ? 'selected' : '' }}>Site Engineer</option>
        <option value="Surveyor" {{ $user->role == 'Surveyor' ? 'selected' : '' }}>Surveyor</option>
        <option value="ROW Coordinator" {{ $user->role == 'ROW Coordinator' ? 'selected' : '' }}>ROW Coordinator</option>
        <option value="Quality Inspector" {{ $user->role == 'Quality Inspector' ? 'selected' : '' }}>Quality Inspector</option>
        <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
        <option value="Viewer" {{ $user->role == 'Viewer' ? 'selected' : '' }}>Viewer</option>
    </select>
</div>

        <button type="submit">Update User</button>
    </form>
</body>
</html>

@endsection