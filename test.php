<?php
require 'template/header.php';
require './database/bootstrap.php';
use Database\Boostrap;

  
    $database = new Boostrap();
    $conn = $database->connect();
    
    // for ($i=1; $i <= 80; $i++) { 
    //     $paper_insert_sql =  "INSERT INTO papers (title, file_path, authors, general_keywords, specific_keywords) VALUES ('Sample $i', 'paper.pdf', 'Sample $i', 'General $i, General B', 'Specific $i, Specific A')";
    //     $conn->query($paper_insert_sql);
    // }
    