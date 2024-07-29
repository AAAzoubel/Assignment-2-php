<?php
include './inc/header.php';
include 'database.php'; 
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        
        setcookie("user", $username, time() + (86400 * 30), "/"); 

        header('Location: view_result.php');
        exit();
    } else {
        $error = "Invalid credentials";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php
        if (isset($_SESSION['logout_message'])) {
            echo '<p class="logout-message">' . $_SESSION['logout_message'] . '</p>';
            unset($_SESSION['logout_message']); 
        }
        if ($error) {
            echo '<p class="error-message">' . $error . '</p>';
        }
        ?>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <a href="register.php" class="button-link">Register</a>
        <a href="logout.php" class="button-link">Logout</a>
    </div>
</body>
</html>

<?php include './inc/footer.php'; ?>
