<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon">
</head>
<body class="body-form">
    <div class="container-register">
        <h2>Register</h2>
        <form action="process_register.php" method="post">
            <input type="text" name="username" class="input-register" placeholder="Username" required>
            <input type="password" name="password" class="input-register" placeholder="Password" required>
            <button type="submit" class="button-register">Register</button>
        </form>
        <a href="login.php" class="link-register">Already have an account? Login</a>
    </div>
</body>
</html>
