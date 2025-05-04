{{-- resources/views/admin/dashboard.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to Admin Dashboard</h1>
    <p>You are logged in as Admin!</p>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <a href="{{ route('admin.user_manage') }}" class="btn btn-primary">User Manage</a>
    <a href="{{ route('admin.task_manage') }}" class="btn btn-secondary">Task Manage</a>
</body>
</html>
