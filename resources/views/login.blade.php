<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
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

        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #e2e8f0;
        }

        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
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

        .text-md-end {
            color: #4b5563;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome Back</div>

                    <div class="card-body">
                        <form method="POST" action="/login">
                            @csrf
                            <div class="row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required
                                        autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required
                                        autocomplete="current-password">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary w-100">
                                        Login
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 offset-md-4 text-center">
                                    <p class="text-muted">Don't have an account?
                                        <a href="/register" class="text-decoration-none">Register here</a>
                                    </p>
                                </div>
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