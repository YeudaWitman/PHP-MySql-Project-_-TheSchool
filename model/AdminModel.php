<?php
class AdminModel {

    private $admin_id;
    private $admin_name;
    private $admin_role;
    private $admin_phone;
    private $admin_email;
    private $admin_password;
    private $admin_image;

    function __construct($adminParam) {
        $this->admin_id = $adminParam['admin_id'];
        $this->admin_name = $adminParam['admin_name'];
        $this->admin_role = $adminParam['admin_role'];
        $this->admin_phone = $adminParam['admin_phone'];
        $this->admin_email = $adminParam['admin_email'];
        $this->admin_password = $adminParam['admin_password'];
        $this->admin_image = $adminParam['admin_image'];
    }

    function getID() {
        return $this->admin_id;
    }

    function getName() {
        return $this->admin_name;
    }

    function getRole() {
        return $this->admin_role;
    }

    function getPhone() {
        if ($this->admin_phone === '') {
            return 'number';
        } else {
            return $this->admin_phone;
        }
    }

    function getEmail() {
        return $this->admin_email;
    }

    function getPassword() {
        return $this->admin_password;
    }

    function getImage() {
        if ($this->admin_image === 'empty') {
            return 'uploads/managerAvatar.jpg';
        } else {
            return $this->admin_image;
        }
    }

}
?>