<?php
include_once './model/AdminBL.php';
include_once './debuger.php';
class AdminController {

    public function __construct() {
        //add admin
        if (isset($_POST['addAdmin'])) {
            if (isset($_POST['adminName']) && !empty($_POST['adminName'])) {
                if(isset($_POST['adminRole']) && !empty($_POST['adminRole'])) {
                    $businessLogic = new AdminBL();
                    $checkIfExist = $businessLogic->checkAdminExist($_POST['adminName']);
                    if (count($checkIfExist) > 0) {
                        echo 'admin alerdy exist';
                        header("Location: administration.php?Msg=adminExist");
                    } else {
                        $businessLogic = new AdminBL();
                        $businessLogic->insertAdmin($_POST);
                        header("Refresh: 0");
                    }
                } else {
                    echo  'you must select role';
                }
            }
            else {
                echo  'Empty Fields';
                //header("Location: administration.php?error=emptyFields");
            }
        }
        //delete admin
        if (isset($_GET['deleteAdmin']) && !empty($_GET['deleteAdmin']) ) {
            $adminId = $_GET['deleteAdmin'];
            $businessLogic = new AdminBL();
            $businessLogic->deleteAdmin($adminId);
            header("Location: administration.php");
            exit();
        }
        //update admin
        if (isset($_POST['updateAdmin'])) {
            if (isset($_POST['adminName']) && !empty($_POST['adminName'])) {
                if(isset($_POST['adminRole']) && !empty($_POST['adminRole'])) {
                $adminId = $_POST['adminID'];
                $businessLogic = new AdminBL();
                $businessLogic->updateAdmin($_POST, $adminId);
                header('Location: administration.php?showAdmin='.$adminId.'');
                exit();
                } else {
                    echo  'you must select role';
                }
            }
            else {
                echo "error: empty";
            }
        }
    }
}

?>