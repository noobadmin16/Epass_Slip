<?php
session_start();
// Include your database connection code (dbh.php) here
require_once 'dbh.php';

if ($conn === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $password = $_POST['password'];

    // Use a prepared statement with placeholders
    $sql = "SELECT * FROM logindb WHERE username = ? AND password = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Check for errors
    if (!$stmt) {
        die("Error: " . mysqli_error($conn));
    }

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ss", $name, $password);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the rows
    $row = mysqli_fetch_array($result);

    if ($row && $row["role"] == "Admin") {
        $_SESSION['username'] = $name;
        $_SESSION['role'] = "Admin";
        header("location:index.php");
    } elseif ($row && $row["role"] == "Employee") {
        $_SESSION['username'] = $name;
        $_SESSION['role'] = "Employee";
        header("location:index_emp.php");
    } elseif($row && $row["role"] == "Desk Clerk"){
        $_SESSION['username'] = $name;
        $_SESSION['role'] = "Desk Clerk";
        header("location:index_desk.php");
    }
    
    else {
        // Username and password don't match, set an error message
        $_SESSION['LoginMessage'] = "Invalid username or password";
    header("location:login_v2.php"); // Redirect back to the login page
    }

    // Close the database connection
    mysqli_close($conn);
}

?>
