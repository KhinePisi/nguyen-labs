<?php 
namespace Vendor;

class NavHelper {

    public function check_nav($nav_name) {
        $current_uri = $_SERVER['REQUEST_URI'];
        if(strpos($current_uri,$nav_name)) {
            return print("current-menu-item");
        }
    }
}

?>