<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to Our Website</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
        }

        /* Added styles for card */
        .card {
            border-radius: 15px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="display-4">Welcome to Our Website</h1>
        <p class="lead">Thank you for visiting our website. Please choose one of the following options:</p>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">New User Registration</h3>
                        <p class="card-text">If you're new here, click the button below to register as a new user and explore our services.</p>
                        <a href="registration.php" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Click to Register">Register Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Existing User Login</h3>
                        <p class="card-text">If you already have an account, click the button below to log in and access your dashboard.</p>
                        <a href="login.php" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Click to Login">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize tooltips
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>

</html>
