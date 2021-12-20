<?php
    $hostname = "localhost";
    $database_user = "root";
    $database_password = "";
    $database_name = "news_database";
    $connection = mysqli_connect($hostname,$database_user,$database_password,$database_name) or die("Connection failed" );
?>