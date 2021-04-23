<?php 

require_once '../admin/AuthServiceProvider.php';
use Auth\AuthServiceProvider;
require_once '../database/bootstrap.php';
use Database\Boostrap;

$database = new Boostrap();
$conn = $database->connect();
$auth = new AuthServiceProvider();

if(!$auth->check()) {
    header("Location: http://localhost:8080/labs/index.php", FALSE, 401);
} 

$id = $_POST['id'];


$sql = "DELETE from papers WHERE id='$id'";

if($conn->query($sql)){
    echo "<script>
    alert('Delete Success');
    window.location.href='../papers.php';
    </script>";       
}
