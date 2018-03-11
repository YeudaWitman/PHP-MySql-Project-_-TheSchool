<?php
include_once 'MainContainerAdmin.php';
include_once 'SideContainerAdmin.php';
include_once 'AdminController.php';

class AdminRouter {
        protected $urlKey;
        protected $urlValue;
        private $_mainContainerAdmin;
        private $_sideContainerAdmin;
        private $_manageAdmin;

        function __construct() {           
            //side container
            $this->_sideContainerAdmin = new SideContainerAdmin();
            //add/remove/edit admin by form
            $this->_manageAdmin = new AdminController();
            $this->getHTTPvalue();
            $this->route();        
        }

        function getHTTPvalue() {
            if (isset($_GET) && !empty($_GET)) {
                $this->urlKey = array_keys($_GET);
                $this->urlValue = array_Values($_GET);
            }
        }

        function route () {
            switch ($this->urlKey['0']) {
                case "showAdmin":
                    $adminId = $this->urlValue['0'];
                    $this->_mainContainerAdmin = new MainContainerAdmin();
                    $this->_mainContainerAdmin->showAdmin($adminId);
                    break;
                case "addAdmin":
                    $adminId = $this->urlValue['0'];
                    $this->_mainContainerAdmin = new MainContainerAdminView();
                    $this->_mainContainerAdmin->adminForm();
                    break;
                case "editAdmin":
                    $adminId = $this->urlValue['0'];
                    $this->_mainContainerAdmin = new MainContainerAdmin();
                    $this->_mainContainerAdmin->editAdmin($adminId);
                    break;
                case "deleteAdminQ":
                    $adminId = $this->urlValue['0'];
                    $this->_mainContainerAdmin = new MainContainerAdminView();
                    $this->_mainContainerAdmin->showDeleteConfirmAdmin($adminId);
                    break;
                case "Msg":
                $msg = $this->urlValue['0'];
                include_once 'errorsAdmin.php';
                $this->_mainContainer = new errorsContainer();
                $this->_mainContainer->errorMassage($msg);
                break;
                default:
                    $this->_mainContainerAdmin = new MainContainerAdmin();
                    $this->_mainContainerAdmin->renderContainer();
                    break;
            
            }
        } 
    }