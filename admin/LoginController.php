<?php

namespace Auth;

require __DIR__.'/../database/bootstrap.php';
require 'AuthServiceProvider.php';

use Database\Boostrap as Database;
use Auth\AuthServiceProvider;

$login_controller = new LoginController();
$login_controller->login();

class LoginController {

    private $email;
    private $password;
    private $conn;
    private $auth_service_provider;
    private $site_url;

    public function __construct(){
        $this->email =  $_POST['email'];
        $this->password = $_POST['password'];
        $database = new Database();
        $this->conn = $database->connect();
        $this->auth_service_provider = new AuthServiceProvider();
    }

    public function login() {
        $sql = 'SELECT * from users where email = "'.$this->email.'" && password = "'.md5($this->password).'"';
        // $sql = "INSERT INTO users (email, first_name, last_name, password) values ('$this->email','Admin','Account', '$password')";
        $result = $this->conn->query($sql);
        if($this->check_mail()) {
            if($result->num_rows > 0) {
                $user = $result->fetch_array();
                $this->auth_service_provider->authorize($user);
                header("Location: http://localhost:8080/labs/index.php", TRUE, 301);
            } else {
                echo "Incorrect password.s";
            }
        } else {
            echo "Member email does not exist. Contact administrator to register account.";
        }
        
    }

    public function check_mail(){
        $sql = 'SELECT * from users where email = "'.$this->email.'" ';
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
    
?>