<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "test_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submit
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Simple insert query
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // redirect if you want
        // header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>

<h2>Add New User</h2>

<form method="POST" action="">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <button type="submit" name="submit">Save</button>
</form>

</body>
</html>