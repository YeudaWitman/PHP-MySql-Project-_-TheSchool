<?php
$fileName = $_FILES['image']['name'];
$fileTmpName = $_FILES['image']['tmp_name'];
$fileSize = $_FILES['image']['size'];
$fileError = $_FILES['image']['error'];
$fileType = $_FILES['image']['type'];


$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png', 'svg');
$fileSizeAllowed = 500000;

if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
        if ($fileSize < $fileSizeAllowed) {
            $imgInfo = list($width, $height) = getimagesize($fileTmpName);
            if ($width > 500 || $height > 500) {
                echo 'image dimension';
            } else {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $_POST['image'] = $fileDestination;
            }
        } else {
            echo 'file too big';
        }
    } else {
        echo 'error upload';
    }
} else {
    echo 'type error';
}

?>