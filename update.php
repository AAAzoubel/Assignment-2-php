<?php
include 'database.php';
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $course = $_POST['course'];

    $stmt = $conn->prepare("UPDATE students_detailed SET name = ?, grade = ?, course = ? WHERE id = ?");
    $stmt->bind_param('sssi', $name, $grade, $course, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    header('Location: view_result.php');
    exit;
}
?>
