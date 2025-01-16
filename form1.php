<!DOCTYPE html>
<?php
include('connection.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/myproject/style.css">
    <title>User Management Form</title>
</head>
<body>
    <div class="container">
        <form action="connection.php" method="post">
            <div class="title">User Management Form</div>
            <div class="form">
                <div class="input_field">
                    <label>User ID:</label>
                    <input type="text" name="userId" class="input" placeholder="Enter User ID to update/delete">
                </div>
                <div class="input_field">
                    <label>First Name:</label>
                    <input type="text" name="fname" class="input" required>
                </div>
                <div class="input_field">
                    <label>Last Name:</label>
                    <input type="text" name="lname" class="input" required>
                </div>
                <div class="input_field">
                    <label>Password:</label>
                    <input type="password" name="password" class="input">
                </div>
                <div class="input_field">
                    <label>Gender:</label>
                    <select name="gender" class="selectbox" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="input_field">
                    <label>Email:</label>
                    <input type="email" name="Email" class="input" required>
                </div>
                <div class="input_field">
                    <label>Phone #:</label>
                    <input type="tel" name="Phone" class="input" required>
                </div>
                <div class="input_field">
                    <label>Address:</label>
                    <textarea name="address" class="textarea"></textarea>
                </div>
                <div class="input_field">
                    <input type="submit" value="Register" name="register" class="btn">
                    <input type="submit" value="Update" name="update" class="btn">
                    <input type="submit" value="Delete" name="delete" class="btn">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
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
    $userId = $_POST['userId'];
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
    $userId = $_POST['userId'];

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