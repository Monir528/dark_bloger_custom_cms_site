<?php

    include "config.php";
    $c_name = $_POST['cat'];
    $sql = "INSERT INTO category(cname, cpost) VALUE('{$c_name}', 0)";
    if(mysqli_query($connection, $sql)){
        header("Location: http://{$hostname}/PHP/Project/news/Blog_Site/admin/category.php");
    }else{
        header("Location: http://{$hostname}/PHP/Project/news/Blog_Site/admin/add-category.php");
    }
?>