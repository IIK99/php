<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
    <style>
        body {
            background-image : url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y29kZXJ8ZW58MHx8MHx8fDA%3D&w=1000&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center text-primary mb-4">Login Page</h3>
            <form action="login/proses_login.php" method="POST">
                <div class="mb-3">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>