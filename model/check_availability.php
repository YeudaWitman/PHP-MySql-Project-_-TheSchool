<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "theschool";


if(!empty($_POST["adminName"])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    catch(PDOException $e)
    {
        return $e->getMessage();
    }

    $stmt = $conn->prepare('SELECT * FROM `administrators` WHERE admin_name = ?');
    $stmt->execute([$_POST["adminName"]]);
    $postCount = $stmt->rowCount();
    if ($postCount == 0) {
        echo '0';
    } else {
        echo '1';
    }
}

if(!empty($_POST["studentName"])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    catch(PDOException $e)
    {
        return $e->getMessage();
    }

    $stmt = $conn->prepare('SELECT * FROM `students` WHERE student_name = ?');
    $stmt->execute([$_POST["studentName"]]);
    $postCount = $stmt->rowCount();
    if ($postCount == 0) {
        echo '0';
    } else {
        echo '1';
    }
}

