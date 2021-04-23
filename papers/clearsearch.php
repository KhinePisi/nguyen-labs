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


$_SESSION['filtered_items'] = [
];

$_SESSION['filtered'] = false;

header("Location: http://localhost:8080/labs/papers.php");