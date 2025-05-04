<!DOCTYPE html>
<html>
<head>
    <title>Task Management</title>
</head>
<body>
    <h1>Assign Task</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Button to navigate to create_task page -->
    <a href="{{ route('admin.create_task') }}" class="btn btn-primary">Create New Task</a>

    <h2>All Tasks</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Assigned User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->task }}</td>
                    <td>{{ $task->user->name }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('admin.edit_task', $task->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.delete_task', $task->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this task?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No tasks available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
</body>
</html>