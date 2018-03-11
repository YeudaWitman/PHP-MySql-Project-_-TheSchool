<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css"> -->
    <link rel="stylesheet" href="Public/css/style.css">
    <link rel="icon" href="favicon.ico">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-info">
        <a class="navbar-brand text-white" href="index.php"><img src="uploads\Logo.svg" width="60" height="60" class="d-inline-block align-left" alt=""> The School Project</a>
        <div class="collapse navbar-collapse btn-group" id="navbarText">
            <a class="nav-link btn btn-outline-light" href="index.php">School</a>
            <?php
            if ($_SESSION['role'] === 'owner' || $_SESSION['role'] === 'manager') {
                echo '<a class="nav-link btn btn-outline-light" href="administration.php">Administration</a>';
            } 
            ?>
            </div>
        <div class="alert alert-info"><?php echo $_SESSION['username'].' You logged in as '. $_SESSION['role']; ?><a href="logout.php">  logout</a> 
        <?php  ?>
        <img src="<?php echo $_SESSION['image'];?>" width="40" height="40">
        </div>
    </nav>
    <section>
        <div class="container">
            <div class="row ">