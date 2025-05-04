@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h1>Create New Task</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.store_task') }}" method="POST">
        @csrf
        <label for="user">Select User:</label>
        <select name="user_id" id="user" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <br><br>

        <label for="task">Task:</label>
        <input type="text" name="task" id="task" required>
        <br><br>

        <button type="submit">Create Task</button>
    </form>
</body>
</html>

@endsection
