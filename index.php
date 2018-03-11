<?php
session_start();

include_once 'debuger.php';
include_once 'controller/login-router.php';
//debug('', $_SESSION);
if(!isset($_SESSION['role'])) {
    // If they are not, redirect them to the login page.
    header("Location: enter.php");
    $loginRouter = new LoginRouter();
    // Remember that this die statement is absolutely critical.  Without it,
    // people can view your members-only content without logging in.
    die("Redirecting to enter.php");
}


include_once 'view/header.php';
include_once 'controller/MainRouter.php';


$router = new MainRouter();



include_once 'view/footer.php';
?>