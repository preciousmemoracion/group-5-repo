<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple CRUD</title>
</head>
<body>

<h2>Add User</h2>
<form action="create.php" method="POST">
    Name: <input type="text" name="name" required>
    Email: <input type="email" name="email" required>
    <button type="submit">Add</button>
</form>

<h2>User List</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM users");

while($row = $result->fetch_assoc()) {
?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['email']; ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete?')">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>