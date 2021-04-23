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
$uploadDirectory = "../uploaded_papers/";

$errors = []; // Store errors here

$fileExtensionsAllowed = ['pdf']; // These will be the only file extensions allowed 

$fileName = $_FILES['paper']['name'];
$fileSize = $_FILES['paper']['size'];
$fileTmpName  = $_FILES['paper']['tmp_name'];
$fileType = $_FILES['paper']['type'];
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
            $title = $_POST['title'];
            $authors = $_POST['authors'];
            $file_path = $fileName;
            $general_keywords = $_POST['general_keywords'];
            $specific_keywords = $_POST['specific_keywords'];
            $sql =  "INSERT INTO papers (title, file_path, authors, general_keywords, specific_keywords) VALUES ('$title', '$file_path', '$authors', '$general_keywords', '$specific_keywords')";
            // $upload = $conn->query($paper_upload_sql);
            $conn->query($sql);
        
        // header("Location: http://localhost:8080/labs/papers.php", TRUE, 200);
        echo "<script>
            alert('Upload Success');
            window.location.href='../papers.php';
            </script>";      
        } else {
            echo "<script>
            alert('Upload Failed. Please contact administrator');
            window.location.href='papers.php';
            </script>";
        }
    } else {
        echo "<script>
        alert(".print_r($errors).");
        </script>";
    }
//file upload

?>
