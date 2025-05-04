<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome to User Dashboard</h1>
    <p>You are logged in as a User!</p>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <h2>Your Assigned Tasks</h2>
    <ul>
        @forelse (auth()->user()->tasks as $task)
            <li>{{ $task->task }}</li>
        @empty
            <li>No tasks assigned yet.</li>
        @endforelse
    </ul>
</body>
</html>