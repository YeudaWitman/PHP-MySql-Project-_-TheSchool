<?php
class errorsContainer extends MainContainerAdmin {
    private $massage;

    function errorMassage($msg) {
        switch ($msg) {
            case "adminExist":
                $this->massage = 'Admin name alerady exist!';
                break;
        }
        $this->containerUtil = new MainContainerAdminView();
        $this->containerUtil->showErrors($this->massage);
    }
}