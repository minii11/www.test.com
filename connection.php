<?php
// Database connection details
$server = "localhost";
$user = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$db = "db1"; // Make sure this database exists

// Create a connection
$connection = mysqli_connect($server, $user, $password, $db);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted for registration
if (isset($_POST['register'])) {
    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $address = $_POST['address'];

    // Prepare the SQL query
    $query = "INSERT INTO users (fname, lname, password, gender, email, phone, address)
              VALUES ('$fname', '$lname', '$password', '$gender', '$email', '$phone', '$address')";

    // Execute the query
    if (mysqli_query($connection, $query)) {
        echo "Registration successful.";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Check if the form is submitted for updating
if (isset($_POST['update'])) {
    // Retrieve form data
    $userId = $_POST['userId']; // Assuming you pass the user ID to update
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $address = $_POST['address'];

    // Prepare the SQL query
    $query = "UPDATE users SET fname='$fname', lname='$lname', gender='$gender', email='$email', phone='$phone', address='$address' WHERE id='$userId'";

    // Execute the query
    if (mysqli_query($connection, $query)) {
        echo "Update successful.";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Check if the form is submitted for deleting
if (isset($_POST['delete'])) {
    // Retrieve form data
    $userId = $_POST['userId']; // Assuming you pass the user ID to delete

    // Prepare the SQL query
    $query = "DELETE FROM users WHERE id='$userId'";

    // Execute the query
    if (mysqli_query($connection, $query)) {
        echo "Delete successful.";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Close the connection
mysqli_close($connection);
?>