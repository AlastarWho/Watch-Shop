<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="body-form">
    <div class="container-login">
        <h2>Login</h2>
        <form action="process_login.php" method="post">
            <input type="text" name="username" class="input-login" placeholder="Username" required>
            <input type="password" name="password" class="input-login" placeholder="Password" required>
            <button type="submit" class="button-login">Login</button>
        </form>
        <a href="register.php" class="link-login">Don't have an account? Register</a>
    </div>

    <!-- Bootstrap JS and Modal -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php
    // Check for messages
    $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
    $message_type = isset($_SESSION['message_type']) ? $_SESSION['message_type'] : '';
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
    ?>

    <?php if (!empty($message)): ?>
        <!-- Modal for Success or Error Message -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel"><?php echo ($message_type == 'success') ? 'Success' : 'Error'; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo $message; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Show the Modal on page load -->
        <script>
            $(document).ready(function() {
                $('#loginModal').modal('show');
            });
        </script>
    <?php endif; ?>
</body>
</html>
