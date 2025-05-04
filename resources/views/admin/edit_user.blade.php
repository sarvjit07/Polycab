<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 95vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            position: relative;
        }

        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .submit-button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .submit-button:hover {
            background-color: #d93636;
        }
    </style>
</head>
<body>

    <div class="container">
    <a href="{{ route('admin.user_manage') }}" class="back-button">
    &#8592;
  </a>        <h1 style="
    color: red;
">Edit User</h1>
        <form method="POST" action="{{ route('admin.update_user', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ $user->phone }}" required>
            </div>
            <div class="form-group">
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
            <button type="submit" class="submit-button">Update User</button>
        </form>
    </div>

</body>
</html>