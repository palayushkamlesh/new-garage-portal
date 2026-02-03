<!-- Inside resources/views/admin/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Use Laravel's asset helper for CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Boxicons CDN -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <span class="rotate-bg"></span>
        <span class="rotate-bg2"></span>
        
        <!-- Login Form -->
        <div class="form-box login">
            <h2 class="title animation">Admin Login</h2>
            <form action="{{ route('admin.login.process') }}" method="POST"> <!-- Updated route -->
                @csrf <!-- CSRF token for security -->
                
                <div class="input-box animation">
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" class="btn animation">Login</button>

                <div class="linkTxt animation">
                    <p>Don't have an account? <a href="#" class="register-link">Sign Up</a></p>
                </div>
            </form>
        </div>

        <!-- Registration Form -->
        <div class="form-box register">
            <h2 class="title animation">Admin Sign Up</h2>

            <form action="{{ route('users-store') }}" method="POST"> <!-- Updated route -->
                @csrf <!-- CSRF token -->

                <div class="input-box animation">
                    <input type="text" name="name" required>
                    <label for="">Username</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation">
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box animation">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" class="btn animation">Sign Up</button>
            </form>

            <div class="linkTxt animation">
                <p>Already have an account? <a href="#" class="login-link">Login</a></p>
            </div>
        </div>
    </div>

    <!-- Include the JavaScript file using Laravel's asset helper -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
