<?php 
require 'template/header.php';
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
    .site-name {
        text-decoration: none;
        color: #10327F;
    }
    .thead{
        background-color: #10327F;
        color: white;
    }
    a{
        color: #10327F;
    }
    .login-form {
        align-items: center;
        width: 40%;
        background-color: #fff;
        padding: 20px;
    }
    .login-form h5 {
        text-align: center;
    }
    .login-form div input {
        text-align: center;
    }
    .login-form hr {
        border: #10327F 1px solid;
        position: inherit;
        width: 100%;
    }
    .btn-primary {
        background-color: #10327F;
        width: 50%;
        padding: 10px;
    }
    @media only screen and (max-width: 600px) {
      .login-form {
        width: 80%;
      }
      .btn-primary {
        background-color: #10327F;
        width: 100%;
        padding: 10px;
    }
    }
</style>
<div class="container login-form">
    <form action="admin/LoginController.php" method="POST">
    <h5>Login </h5>
    <hr></hr>
    <div class="form-group">
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
    </div> <br>
    <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?php
require 'template/footer.php';
?>