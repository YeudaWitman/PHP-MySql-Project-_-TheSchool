<?php
include_once './model/AdminBL.php';
include_once './view/SideContainerAdmin.php';
include_once './debuger.php';

class SideContainerAdmin {
    private $adminLogic;

    function  __construct() {
        $this->showAdminsList();
    }

    function showAdminsList() {
        $this->adminLogic = new AdminBL();
        $adminList  = $this->adminLogic->getAdmins();
        $adminListView =  new SideContainerAdminView();
        $adminListView->showAdminsList($adminList);
    }


}

?>