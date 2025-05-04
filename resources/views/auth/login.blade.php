{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Polycab Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #e8e4e4, #d9cfcf); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; font-family: "Poppins", sans-serif; }
        .login-card { border-radius: 25px; padding: 2.5rem; width: 100%; max-width: 500px; box-shadow: 0 0 25px rgba(0,0,0,0.1); background-color: white; }
        .login-card img { display: block; margin: 0 auto 4rem; width: 300px; }
        .login-card h1 { text-align: center; margin-bottom: 2rem; font-size: 36px; line-height: 1.2; }
        .form-control { font-size: 18px; padding: 12px; background-color: #eee; }
        .input-group-text { background-color: #f1f1f1; font-size: 18px; }
        .btn-login { background-color: #e63333; color: white; font-weight: bold; font-size: 18px; padding: 12px; border-radius: 10px; width: 100%; }
        .btn-login:hover { background-color: #cc2b2b; }
    </style>
</head>
<body>
<div class="login-card text-center">
    <img src="{{ asset('images/logo.png') }}" alt="Polycab Logo">
    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4 input-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <span class="input-group-text"><i class="fa fa-user"></i></span>
        </div>
        <div class="mb-4 input-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="input-group-text"><i class="fa fa-lock"></i></span>
        </div>
        <button class="btn btn-login" type="submit">Login</button>
    </form>
</div>
</body>
</html>
