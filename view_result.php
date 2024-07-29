<?php
include 'database.php';
session_start();

$query = "SELECT * FROM students_detailed";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Results</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include './inc/header.php'; ?>
    <div class="container">
        <h1>View Results</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['grade']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td>
                    <?php if (isset($_SESSION['loggedin'])): ?>
                        <form action="update.php" method="post" style="display:inline;">
                            <input type="number" name="id" value="<?php echo $row['id']; ?>">
                            <input type="text" name="name" value="<?php echo $row['name']; ?>">
                            <input type="number" name="grade" value="<?php echo $row['grade']; ?>">
                            <input type="text" name="course" value="<?php echo $row['course']; ?>">
                            <button type="submit" class="button-link">Update</button>
                        </form>
                        <form action="delete.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="button-link">Delete</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <?php if (!isset($_SESSION['loggedin'])): ?>
            <p><a href="login.php" class="button-link">Login</a> To make any updates or delete any register, you need to login into your account.</p>
        <?php else: ?>
            <p><a href="logout.php" class="button-link">Logout</a></p>
        <?php endif; ?>
    </div>
    <?php include './inc/footer.php'; ?>
</body>
</html>
