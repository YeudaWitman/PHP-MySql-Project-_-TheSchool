<?php
class LoginRouter{
        protected $valUrl;
        function __construct() {        
            $this->getHTTPvalue($this->valUrl);
            $this->route();        
        }

        function getHTTPvalue($valUrl) {
            if (isset($_GET['role']) && !empty($_GET['role']) ) {
                $this->valUrl = $_GET['role'];
            }
        }

        function route () {
            switch ($this->valUrl) {
                case "owner":
                    $_SESSION['role'] = $this->valUrl;
                    header("Location: index.php");
                    break;
                case "admin":
                    $_SESSION['role'] = $_GET['role'];
                    header("Location: index.php");
                    break;
                case "sales":
                    $_SESSION['role'] = $_GET['role'];
                    header("Location: index.php");
                    break;
                default:
                    $_SESSION['role'] = $_GET['role'];
                    break;
            }
        } 
    }