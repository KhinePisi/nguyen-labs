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
$title = $_POST['title'];
$authors = $_POST['authors'];
$general_keywords = $_POST['general_keywords'];
$specific_keywords = $_POST['specific_keywords'];

$sql = "UPDATE papers SET title='$title', authors='$authors', general_keywords='$general_keywords', specific_keywords = '$specific_keywords' WHERE id='$id'";

if($conn->query($sql)){
    echo "<script>
    alert('Edit Success');
    window.location.href='../papers.php';
    </script>";       
}


?>