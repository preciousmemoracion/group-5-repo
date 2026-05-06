<?php
// connect to database
$conn = new mysqli("localhost", "root", "", "test_db");

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// get ID from URL
$id = $_GET['id'];

// fetch data
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();

// update data
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Updated successfully!";
        header("Location: index.php"); // redirect
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST">
    Name: <br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

    Email: <br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>