<?php 
include_once 'admin/AuthServiceProvider.php';
use Auth\AuthServiceProvider;

$auth = new AuthServiceProvider();
$auth->deauthorize();
// header("Location: http://localhost:8080/labs/index.php", TRUE, 301);
echo "<script>
alert('Logging Out');
window.location.href='index.php';
</script>";
?>