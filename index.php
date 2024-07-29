<?php
include './inc/header.php';
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    include 'upload.php';
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $course = $_POST['course'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO students_detailed (name, id, course, grade ) VALUES ('$name', '$id', '$course', '$grade')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- New students form-->
    <div class="container">
        <h1>New Student Record</h1>
        <form action="index.php" class="form-action" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="id">ID:</label>
            <input type="number" id="id" name="id" required><br><br>

            <label for="course">Course:</label>
            <input type="text" id="course" name="course" required><br><br>

            <label for="grade">Grade:</label>
            <input type="number" id="grade" name="grade" required><br><br>

            <input type="submit" value="Submit">
        </form>

        <!-- Upload images form-->
        <div class="upload-container">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <label for="fileToUpload" class="upload-label">Choose a image to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit" class="upload-button">
            </form>
        </div>

        <!-- Link to the gallery -->
        <div class="gallery-link">
            <a href="gallery.php" class="button-link">See all the images</a>
        </div>
    </div>
</body>
</html>

<?php include './inc/footer.php'; ?>
