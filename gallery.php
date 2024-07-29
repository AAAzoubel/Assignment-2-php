<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include './inc/header.php'; ?>
    <div class="container">
        
        <h1>Gallery</h1>
        <div class="gallery">
            <?php
            $dir = "uploads/";
            if (is_dir($dir)){
                if ($dh = opendir($dir)){
                    while (($file = readdir($dh)) !== false){
                        if($file != '.' && $file != '..') {
                            echo '<div class="gallery-item"><img src="'.$dir.$file.'" alt="'.$file.'" class="gallery-image"></div>';
                        }
                    }
                    closedir($dh);
                }
            }
            ?>
        </div>
    </div>
    <?php include './inc/footer.php'; ?>
</body>
</html>
