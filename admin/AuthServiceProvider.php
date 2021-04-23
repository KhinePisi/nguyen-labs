<?php
namespace Auth;

session_start();

class AuthServiceProvider {

    private $user = [];
   
    public function get($key) {
        return $_SESSION['auth.user'][$key];
    }

    public function authorize($user){
        $this->user = $user;
        $_SESSION['auth.user'] = $this->user;
        $_SESSION['auth'] = true;
    }

    public function check(){
        if($_SESSION['auth']) {
            return true;
        }
    }
    public function deauthorize(){
        session_destroy();
    }

    public function check_admin() {
        $user = ($_SESSION['auth.user']);
        if($user['role'] == 'admin' ) {
            return true;
        } else {
            return false;
        }
    }

    public function check_user($id) {
        $user = ($_SESSION['auth.user']);
        if($user['id'] === $id) {
            return true;
        } else {
            return false;
        }

    }
}