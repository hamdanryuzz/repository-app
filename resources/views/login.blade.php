<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Page</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(120deg, #452add, #1208a0);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 400px;
            max-width: 100%;
            padding: 2rem;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header img {
            width: 80px;
            margin-bottom: 1rem;
        }

        .form-floating {
            margin-bottom: 1rem;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }

        .login-btn {
            background: linear-gradient(45deg,  #452add, #1208a0);
            border: none;
            border-radius: 10px;
            padding: 0.8rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .social-login {
            text-align: center;
            margin-top: 2rem;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 0.5rem;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            transform: translateY(-2px);
        }

        .divider {
            margin: 1.5rem 0;
            text-align: center;
            position: relative;
        }

        .divider::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #ddd;
        }

        .divider::after {
            content: "";
            position: absolute;
            right: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #ddd;
        }

        .form-check-label {
            color: #666;
        }

        .forgot-password {
            color: #007bff;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    @if ($errors->has('loginError'))
        <div class="alert alert-danger">
            {{ $errors->first('loginError') }}
        </div>
    @endif

    <div class="login-container">
        <div class="login-header">
            {{-- <img src="{{asset('images/tni.png')}}" alt="Logo" class="mb-4"> --}}
            <h2>[S3] Repository</h2>
            <h3>Welcome Back!</h3>
            <p class="text-muted">Please login to your account</p>
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Usermane or Email" name="email">
                <label for="floatingInput">Email</label>
            </div>
            
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="password">
                <label for="floatingPassword">Password</label>
            </div>


            <button class="btn btn-primary w-100 login-btn mb-3">
                Login
            </button>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>