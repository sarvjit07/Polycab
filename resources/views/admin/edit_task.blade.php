<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.update_task', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="user">Select User:</label>
        <select name="user_id" id="user" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label for="task">Task:</label>
        <input type="text" name="task" id="task" value="{{ $task->task }}" required>
        <br><br>

        <button type="submit">Update Task</button>
    </form>
</body>
</html>