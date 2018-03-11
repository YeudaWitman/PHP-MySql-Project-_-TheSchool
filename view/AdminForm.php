<?php
include_once './model/StudentsBL.php';
include_once './model/CoursesBL.php';
include_once './model/course-studentsBL.php';
include_once './model/course-students.php';
include_once './debuger.php';
include_once './model/AdminBL.php';
include_once 'MainContainerAdmin.php';


    class AdminForm {
        private $containerUtil;

        function addForm() {
            include_once 'Forms/addAdmin.php';
        }

        function editForm($adminDetails) {
            $adminRow = $adminDetails['0'];
            include_once 'Forms/editAdmin.php';
        }

        private function selectRole($role) {
            if ($_SESSION['role'] === 'owner') {
                echo '<label class="w-100">Role<span class="text-danger" title="Required">*</span>
                <select class="custom-select" name="adminRole">
                    <option selected disabled>'.$role.'</option>
                    <option value="owner">Owner</option>
                    <option value="manager">Manager</option>
                    <option value="sales">Sales</option>
                </select></label>';
            } else {
                echo '<label class="w-100">Role
                <select class="custom-select" name="adminRole">
                    <option selected disabled>'.$role.'</option>
                </select></label>';
            }
            

        }
    
}
?>