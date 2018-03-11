
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <link rel="stylesheet" href="Public/css/style.css">
    <link rel="icon" href="favicon.ico">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand text-info" href=""><img src="uploads/logo.svg" width="60" height="60" class="d-inline-block align-left" alt=""> The School Project</a>
    </nav>
    <div class="container">
        <div class="row col-xl-6">
                <h3 class="text-info">Welcome</h3>
        </div>
        <div class="row col-xl-6">
            <form class="form-signin" method="post" action="login.php">
                <img class="mt-3 " src="uploads/logo.svg" alt="" width="150" height="150">
                <h3 class="mb-2 text-info">Please sign in</h3>
                <div class="form-group">
                    <label>
                    <input type="text" id="inputName" class="form-control" placeholder="User Name" name="username" autofocus=""></label>
                </div>
                <div class="form-group">
                    <label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required=""></label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                    <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-info" type="submit" name="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
            </form>
        <!-- </div>
        <div class="row col-xl-6">
            <div class="btn-group">
                <a href="index.php?role=sales" class="btn btn-info">Sales</a>
                <a href="index.php?role=admin" class="btn btn-info">Admin</a>
                <a href="index.php?role=owner" class="btn btn-info">Owner</a>
            </div> -->
<?php
session_start();

include_once 'login.php';
include_once 'view/footer.php';
?>