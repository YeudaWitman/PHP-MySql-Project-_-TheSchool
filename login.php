<?php
if (isset($_POST['submit'])) {
    include_once 'model/AdminBL.php';
    $username = $_POST['username'];
    $pwd = $_POST['password'];//TODO! hashing the password
    //check if empty
    if (empty($username) || empty($pwd)) {
        echo "error: empty";
    } 
    else {
        //get user data from db
        $user = new AdminBL();
        $userArray = $user->loginAdmin($username, $pwd);
        foreach($userArray as $row){
            $userNameResult = $row->getName();
            $pwdResult = $row->getPassword();
            $idResult = $row->getID();
            $role = $row->getRole();
            $image = $row->getImage();
            echo $userNameResult . " you are logged in ";
            session_start();
            $_SESSION['username'] = $userNameResult;
            $_SESSION['userID'] = $idResult;
            $_SESSION['role'] = $role;
            $_SESSION['image'] = $image;
            header("Location: index.php");
        } //check if data in db match to inputs
        if (empty($userResult)) {
            echo "error: result unmatch ";
        }
    }
}
else {
 //   echo "error: no submit";
}
?>