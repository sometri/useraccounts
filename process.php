<?php
    // Include the configuration file
    require_once('config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Collect POST data
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        // Use password_hash() for hashing the password
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // SQL query to insert user data into the database
        $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql); // Prepare the SQL statement

        // Execute the SQL statement with user data
        $result = $stmt->execute([$firstname, $lastname, $email, $phonenumber, $password]);

        if ($result) {
            // Redirect to login.php after successful registration
            header("Location: login.php");
            exit; // Ensure that no further code is executed after the redirect
        } else {
            echo 'There were errors while saving the data.';
        }
    } else {
        echo 'No data received.';
    }
?>
