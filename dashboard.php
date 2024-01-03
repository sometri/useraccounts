<?php
    // Start the session to access session variables
    session_start();

    // Check if the user is logged in, if not redirect to login page
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit; // Ensure that script execution stops here
    }

    // Get user details from session variables
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Dashboard | PHP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3>Welcome, <?= $firstname ?> <?= $lastname ?>!</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">You have successfully logged into your dashboard.</p>
                        <p class="card-text">Here, you can add more features, functionalities, or information as needed.</p>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
