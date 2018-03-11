<?php
class Router{
        protected $valUrl;
        function __construct() {        
            $this->getHTTPvalue($this->valUrl);
            $this->route();        
        }

        function getHTTPvalue($valUrl) {
            if (isset($_GET['option']) && !empty($_GET['option']) ) {
                $this->valUrl = $_GET['option'];
            }
        }

        function route () {
            switch ($this->valUrl) {
                case "owner":
                    include_once 'view/login-form.php';
                    include_once 'login.php';
                    break;
                case "admin":
                    include_once 'view/register-form.php';
                    include_once 'register.php';
                    break;
                case "sales":
                    include_once 'models\logout.php';
                    break;
                default:
                    include_once 'view/login-form.php';
                    include_once 'login.php';
                    break;
            }
        } 
    }