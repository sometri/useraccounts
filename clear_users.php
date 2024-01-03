<?php
    // Include the configuration file
    require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Clear Users Table | PHP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h3>Clear Users Table</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        // SQL query to truncate the users table
                        $sql = "TRUNCATE TABLE users";

                        // Prepare and execute the SQL statement
                        $stmt = $db->prepare($sql);

                        if ($stmt->execute()) {
                            echo '<div class="alert alert-success">Successfully cleared all data from the users table.</div>';
                        } else {
                            echo '<div class="alert alert-danger">Failed to clear data from the users table.</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
