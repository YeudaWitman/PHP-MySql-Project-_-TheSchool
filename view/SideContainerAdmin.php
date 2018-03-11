<?php

class SideContainerAdminView {
    private $containerHeader = '<div class="col-xl-3 list-group">';
    private $containerFooter = '</div>';

    function showAdminsList($adminList) {
        echo $this->containerHeader;
        echo '<h4 class="text-info">Administrators: ';
        if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'owner') {
            echo '<a href="administration.php?addAdmin"><i class="float-right mr-2 mt-1 fa fa-plus-circle text-info"></i></a>';
        }
        echo '</h4>';
        foreach($adminList as $row){
            if ($row->getRole() === 'owner') {
                if ($_SESSION['role'] === 'owner') {
                    echo '<a href="administration.php?showAdmin='.$row->getID().'" class="p-1 mb-1 bg-light text-dark">';
                    echo '<img src="'.$row->getImage().'" width="40" height="40" class="mr-2  float-left">';
                    echo '<div class="media-body"><b>'. $row->getname() . '</b> ('.$row->getRole().')
                    <br>Phone: '.$row->getPhone().'</div></a>';
                } else {
                    echo '<a href="" class="p-1 mb-1 bg-light text-dark" disabled>';
                    echo '<img src="'.$row->getImage().'" width="40" height="40" class="mr-2  float-left">';
                    echo '<div class="media-body"><b>'. $row->getname() . '</b> ('.$row->getRole().')
                    <br>Phone: '.$row->getPhone().'</div></a>';
                }
            } else {
                echo '<a href="administration.php?showAdmin='.$row->getID().'" class="p-1 mb-1 bg-light text-dark">';
                echo '<img src="'.$row->getImage().'" width="40" height="40" class="mr-2  float-left">';
                echo '<div class="media-body"><b>'. $row->getname() . '</b> ('.$row->getRole().')
                <br>Phone: '.$row->getPhone().'</div></a>';
            }

        }
        echo $this->containerFooter;
    }
}