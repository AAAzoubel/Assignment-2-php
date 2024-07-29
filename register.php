<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include 'database.php';
    include './inc/header.php';

    
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $query)) {
        
        session_start();
        $_SESSION['username'] = $username;

        
        echo "Welcome!, " . $username . "thank you for registering in our website";

        
        
    } else {
        
        echo "Erro ao registrar usuário.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>

<?php include './inc/footer.php'; ?>
