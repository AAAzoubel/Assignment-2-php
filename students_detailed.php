<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Student</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Add</a>
                </li>
                <li>
                    <a href="view_result.php">View</a>
                </li>
            </ul>
        </nav>
        <h1>Add Student Record</h1>
    </header>
    <div>
    <?php
include 'database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to view this page.";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $target = "images/".basename($image);

    $sql = "INSERT INTO students_detailed (name, email, image) VALUES ('$name', '$email', '$image')";
    $conn->query($sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "Image uploaded successfully";
    } else {
        echo "Failed to upload image";
    }
}


$sql = "SELECT * FROM students_detailed";
$result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $target = "images/".basename($image);

    $sql = "UPDATE students_detailed SET name='$name', email='$email', image='$image' WHERE id=$id";
    $conn->query($sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "Image uploaded successfully";
    } else {
        echo "Failed to upload image";
    }
}

// Delete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM students_detailed WHERE id=$id";
    $conn->query($sql);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <h2>Create Student</h2>
    <form method="post" action="students_detailed.php" enctype="multipart/form-data">
        <input type="hidden" name="create" value="1">
        Name: <input type="text" name="name" required>
        Email: <input type="email" name="email" required>
        Image: <input type="file" name="image" required>
        <input type="submit" value="Create">
    </form>

    <h2>Update Student</h2>
    <form method="post" action="students_detailed.php" enctype="multipart/form-data">
        <input type="hidden" name="update" value="1">
        ID: <input type="text" name="id" required>
        Name: <input type="text" name="name" required>
        Email: <input type="email" name="email" required>
        Image: <input type="file" name="image" required>
        <input type="submit" value="Update">
    </form>

    <h2>Delete Student</h2>
    <form method="post" action="students_detailed.php">
        <input type="hidden" name="delete" value="1">
        ID: <input type="text" name="id" required>
        <input type="submit" value="Delete">
    </form>

    <h2>Students List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><img src="images/<?php echo $row['image']; ?>" width="100"></td>
        </tr>
        <?php } ?>
    </table>

    <?php include 'footer.php'; ?>
</body>
</html>
