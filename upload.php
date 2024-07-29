<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$message = "";


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $message .= "The file is a image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        $message .= "The file is not an image.<br>";
        $uploadOk = 0;
    }
}


if (file_exists($target_file)) {
    $message .= "File already exists, use other file.<br>";
    $uploadOk = 0;
}


if ($_FILES["fileToUpload"]["size"] > 500000) {
    $message .= "The file is too big.<br>";
    $uploadOk = 0;
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $message .= "Only JPG, JPEG, PNG & GIF are allowed.<br>";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    $message .= "Sorry, your file couldnt be sent.<br>";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $message .= "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " was sent to the galley, go there to check!.<br>";
    } else {
        $message .= "Sorry, something happened sending your file.<br>";
    }
}

echo $message;
?>
