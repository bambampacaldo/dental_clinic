<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #87CEEB, #f0f8ff);
            min-height: 100vh;
        }
        .card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background: #87CEEB;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
        }
        .card-header h3 {
            color: white;
            font-weight: 600;
            margin: 0;
        }
        .btn-primary {
            background: #87CEEB;
            border: none;
            padding: 10px;
        }
        .btn-primary:hover {
            background: #5f9ea0;
        }
        .btn-secondary {
            background: white;
            border: 2px solid #87CEEB;
            color: #87CEEB;
            padding: 10px;
        }
        .btn-secondary:hover {
            background: #87CEEB;
            border-color: #87CEEB;
        }
        .form-label {
            color: #2c3e50;
            font-weight: 500;
        }
        .form-control:focus {
            border-color: #87CEEB;
            box-shadow: 0 0 0 0.2rem rgba(135, 206, 235, 0.25);
        }
        .clinic-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .clinic-logo img {
            width: 80px;
            margin-bottom: 10px;
        }
        .clinic-name {
            color: #2c3e50;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="clinic-name">Dental Clinic System</div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="clinic-logo">
                            <img src="https://cdn-icons-png.flaticon.com/512/4006/4006511.png" alt="Dental Logo">
                        </div>
                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <div class="d-grid gap-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>