<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="text-center">
            <h1>Welcome to simple blog application</h1>
            <h3>Created by <a href="https://github.com/GrygorenkoMykhailo" target="_blank">Grygorenko Mykhailo</a></h3>
        </div>
        <div class="d-flex justify-content-center my-4">
            <a href="{{url('/register')}}" class="btn btn-primary me-2">Register</a>
            <a href="{{url('/login')}}" class="btn btn-secondary">Login</a>
        </div>
    </div>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>