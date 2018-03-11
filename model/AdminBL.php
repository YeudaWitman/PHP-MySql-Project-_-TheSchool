<?php
include_once 'dal.php';
include_once 'CourseModel.php';
include_once 'AdminModel.php';
include_once 'course-students.php';
include_once 'debuger.php';

class AdminBL {
    function getAdmins() {
        $adapter = new DAL();
        $query = "SELECT * FROM `administrators`";
        $adminsArray = $adapter->fetch($query);
        $adminsObjectsArray = array();
        foreach($adminsArray as $admin) {
            array_push($adminsObjectsArray, new AdminModel($admin));
            
        }
        //echo json_encode($adminsArray);
        return $adminsObjectsArray;
    }

    function loginAdmin($username, $pwd) {
        $adapter = new DAL();
        $query = "SELECT * FROM `administrators` WHERE `admin_name`= '$username' AND `admin_password`= '".md5($pwd)."'";
        $adminsArray = $adapter->fetch($query);
        $adminsObjectsArray = array();
        foreach($adminsArray as $admin) {
            array_push($adminsObjectsArray, new AdminModel($admin));
        }
        return $adminsObjectsArray;
    }

    function getAdminDetails($adminId) {
        $adapter = new DAL();
        $query = "SELECT * FROM `administrators` WHERE `admin_id`= '".$adminId."'";
        $adminsArray = $adapter->fetch($query);
        $adminsObjectsArray = array();
        foreach($adminsArray as $admin) {
            array_push($adminsObjectsArray, new AdminModel($admin));
        }
        return $adminsObjectsArray;
    }

    function insertAdmin($admin) {
        $adapter = new DAL();
        if ($admin['adminRole'] = 'Select Role:') {
            $adminRole = 'sales';
        } else {
            $adminRole = $admin['adminRole'];
        }
        $query = 'INSERT INTO `administrators`(`admin_name`, `admin_role`, `admin_phone`, `admin_email`, `admin_password`, `admin_image`) 
        VALUES ("'.$admin['adminName'].'","'.$adminRole.'","'.$admin['phone'].'","'.$admin['email'].'","'.md5($admin['password']).'","'.$admin['image'].'")';
        $adminArray = $adapter->fetch($query);
    }

    function deleteAdmin($adminId) {
        $adapter = new DAL();
        $query = 'DELETE FROM `administrators` WHERE `admin_id`="'.$adminId.'"';
        $adminArray = $adapter->fetch($query);
    }

    function updateAdmin($admin, $adminId) {
        $adapter = new DAL();
        $query = 'UPDATE `administrators`
            SET `admin_name` = "'.$admin['adminName'].'",
                `admin_role` = "'.$admin['adminRole'].'",
                `admin_phone` = "'.$admin['phone'].'",
                `admin_email` = "'.$admin['email'].'",
                `admin_password` = "'.md5($admin['password']).'",
                `admin_image`= "'.$admin['image'].'" WHERE `admin_id`="'.$adminId.'"';
        $CourseArray = $adapter->fetch($query);
    }

    function checkAdminExist($adminName) {
        $adapter = new DAL();
        $query = "SELECT * FROM `administrators` WHERE `admin_name`= '".$adminName."'";
        $adminsArray = $adapter->fetch($query); 
        return $adminsArray;
    }
}
?>