<?php
    // Include the configuration file
    require_once('config.php');

    $message = '';
    $showLoginButton = true;

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Check if the email already exists in the database
        $sql_check = "SELECT id FROM users WHERE email = ?";
        $stmt_check = $db->prepare($sql_check);
        $stmt_check->execute([$email]);

        if ($stmt_check->rowCount() > 0) {
            $message = 'Email already registered. Please <a href="login.php">login</a>.';
            $showLoginButton = false;
        } else {
            // Insert user data into the database
            $sql_insert = "INSERT INTO users (firstname, lastname, email, phonenumber, password) VALUES (?, ?, ?, ?, ?)";
            $stmt_insert = $db->prepare($sql_insert);
            $result = $stmt_insert->execute([$firstname, $lastname, $email, $phonenumber, $password]);

            if ($result) {
                $message = 'Registration successful! Please <a href="login.php">login</a>.';
                $showLoginButton = false;
            } else {
                $message = 'There were errors while saving the data.';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Registration | PHP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">User Registration</h1>
                <?php if (!empty($message)): ?>
                    <div class="alert alert-<?php echo ($showLoginButton) ? 'success' : 'danger'; ?>">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <p class="text-center">Fill up the form with correct values.</p>
                <hr>

                <!-- Registration Form -->
                <form id="registrationForm" action="registration.php" method="post">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phonenumber">Phone Number</label>
                        <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" id="register">Sign Up</button>
                    </div>

                    <!-- Button to navigate to the Login page -->
                    <?php if ($showLoginButton): ?>
                        <div class="form-group">
                            <p class="text-center">Already registered? <a href="login.php" class="btn btn-secondary">Login</a></p>
                        </div>
                    <?php endif; ?>

                </form>
                <!-- End of Registration Form -->
            </div>
        </div>
    </div>

</body>

</html>
