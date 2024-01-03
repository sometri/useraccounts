<?php
    // Include the configuration file (e.g., database connection)
    require_once('config.php');

    $message = ''; // Variable to store error/success messages

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // SQL query to fetch user data based on email from 'users' table
        $sql = "SELECT id, firstname, lastname, email, password FROM users WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(); // Fetch user data

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, start a session and store user data
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            header('Location: dashboard.php'); // Redirect to dashboard or home page
        } else {
            // Invalid email or password
            $message = 'Invalid email or password!';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Login | PHP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1 class="text-center mb-4">User Login</h1>

                <!-- Display error/success message -->
                <?php if ($message): ?>
                    <div class="alert alert-danger"><?= $message ?></div>
                <?php endif; ?>

                <!-- Login Form -->
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
                <!-- End of Login Form -->

                <!-- Registration Button -->
                <div class="text-center">
                    <p class="mt-3">New User? <a href="registration.php" class="btn btn-success">Register Here</a></p>
                </div>
                <!-- End of Registration Button -->
            </div>
        </div>
    </div>

</body>

</html>
