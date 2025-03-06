<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 20px;
            font-size: 24px;
            font-weight: 600;
            border-radius: 15px 15px 0 0 !important;
        }
        .card-body {
            padding: 30px;
        }
        .btn-primary {
            background: #4f46e5;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background: #4338ca;
            transform: translateY(-1px);
        }
        .btn-outline-primary {
            border: 2px solid #4f46e5;
            color: #4f46e5;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-outline-primary:hover {
            background: #4f46e5;
            transform: translateY(-1px);
        }
        .welcome-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 1rem;
        }
        .welcome-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">
                    Todo Application
                </div>
                <div class="card-body">
                    <h1 class="welcome-title">Welcome to Your Todo App</h1>
                    <p class="welcome-subtitle">Stay organized and boost your productivity</p>
                    
                    <div class="d-flex justify-content-center gap-3">
                        @auth
                            <a href="/dashboard" class="btn btn-primary">Go to Dashboard</a>
                            <form method="POST" action="/logout" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">Logout</button>
                            </form>
                        @else
                            <a href="/login" class="btn btn-primary">Login</a>
                            <a href="/register" class="btn btn-outline-primary">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>