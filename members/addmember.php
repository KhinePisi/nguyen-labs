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

//file upload
$currentDirectory = getcwd();
$uploadDirectory = "/../member_photos/";

$errors = []; // Store errors here

$fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 

$fileName = $_FILES['image']['name'];
$fileSize = $_FILES['image']['size'];
$fileTmpName  = $_FILES['image']['tmp_name'];
$fileType = $_FILES['image']['type'];
$fileExtension = strtolower(end(explode('.',$fileName)));

$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    if (! in_array($fileExtension,$fileExtensionsAllowed)) {
    $errors[] = "This file extension is not allowed. Please upload a PDF file";
    }

    if ($fileSize > 40000000000) {
    $errors[] = "File exceeds maximum size";
    }

    if (empty($errors)) {
    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            $name = $_POST['name'];
            $position = $_POST['position'];
            $introduction = $_POST['introduction'];
            $country = $_POST['country'];
            $hobby = $_POST['hobby'];
            $research_topics = $_POST['research_topics'];
            $email = $_POST['email'];
            $github_link = $_POST['github_link'];
            $linkedin_link = $_POST['linked_link'];
            $sql =  "INSERT INTO members (name, position, introduction, country, hobby, research_topics, email, github_link, linkedin_link , image_path) VALUES ('$name', '$position', '$introduction', '$country', '$hobby', '$research_topics', '$email', '$github_link', '$linkedin_link', '$fileName' )";
            print_r($sql);
            // $upload = $conn->query($paper_upload_sql);
            $conn->query($sql);
        
        // header("Location: http://localhost:8080/labs/papers.php", TRUE, 200);
        echo "<script>
            alert('Add Member Success');
            window.location.href='../members.php';
            </script>";      
        } else {
            // echo "<script>
            // alert('Add Member Failed. Please contact administrator');
            // window.location.href='../members.php';
            // </script>";
        }
    } else {
        echo "<script>
        alert(".print_r($errors).");
        </script>";
    }
//file upload

 ?>
