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

if(isset($_POST['search'])){
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $general_keywords = $_POST['general_keywords'];
    $specific_keywords = $_POST['specific_keywords'];
}

$_SESSION['filtered_items'] = [
    'title' => $title, 
    'authors' => $authors, 
    'general_keywords' => $general_keywords, 
    'specific_keywords' => $specific_keywords
];
$_SESSION['filtered'] = true;

header("Location: http://localhost:8080/labs/papers.php");