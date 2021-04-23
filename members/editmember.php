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
        $name = $_POST['name'];
        $position = $_POST['position'];
        $introduction = $_POST['introduction'];
        $country = $_POST['country'];
        $hobby = $_POST['hobby'];
        $research_topics = $_POST['research_topics'];
        $email = $_POST['email'];
        $github_link = $_POST['github_link'];
        $linkedin_link = $_POST['linked_link'];
        $sql =  "UPDATE members set name = '$name', position = '$position', country = '$country', hobby = '$hobby', research_topics = '$research_topics', email = '$email', github_link = '$github_link', linkedin_link = '$linkedin_link' WHERE id = '$id' ";
        $conn->query($sql);
        
        // header("Location: http://localhost:8080/labs/papers.php", TRUE, 200);
        echo "<script>
            alert('Edit Member Success');
            window.location.href='../members.php';
            </script>";      


 ?>
