<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .header img {
            height: 180px;
    width: 100%;
    margin: 0px;
    padding: 0px;

        }
        .blue-strap {
            background-color: #001f7f;
            padding: 10px 90px;
            display: flex;
            justify-content: flex-end; /* ✅ Move buttons to right */
            align-items: center;
            gap: 20px;
        }
        .blue-strap a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .blue-strap a i {
            font-size: 24px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/project_managemant.jpg') }}" alt="Header Image">
        </a>
    </div>

    <!-- Blue Strap Section -->
    <div class="blue-strap">
        <a href="{{ route('admin.user_manage') }}">
            <i class="fa-solid fa-user"></i>
        </a>
        <a href="{{ route('admin.task_manage') }}">
            <i class="fa-solid fa-building"></i>
        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
