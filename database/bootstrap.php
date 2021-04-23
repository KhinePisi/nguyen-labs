<?php 
namespace Database;
require __DIR__.'/../vendor/autoloader.php';
use Vendor\Autoloader as Autoloader;

class Boostrap {
    private $autoloader;

    public function __construct(){
        $this->autoloader = new Autoloader();
    }

    public function connect(){
        $mysql_host = $this->autoloader->env("DB_HOST");
        $username = $this->autoloader->env("DB_USERNAME");
        $password = $this->autoloader->env("DB_PASSWORD");
        $db_name = $this->autoloader->env("DB_NAME");
        $conn = new \MySQLi($mysql_host, $username, $password, $db_name);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>