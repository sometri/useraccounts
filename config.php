
<?php

    $host = 'localhost';
    $db_name = 'useraccounts';
    $db_user = 'root';
    $db_pass = '';  // Typically, on some systems, the password might be 'root' for the root user.

    try {
        // Establish the database connection
        $db = new PDO("mysql:host={$host};dbname={$db_name};charset=utf8", $db_user, $db_pass);

        // Set PDO to throw exceptions for errors
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Optionally, you can also set other attributes like:
        // $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Disable emulated prepared statements for security reasons

    } catch (PDOException $e) {
        // If there's an error, catch it and display a meaningful error message
        echo "Connection failed: " . $e->getMessage();
        exit;  // Stop the script if the connection fails
    }

?>