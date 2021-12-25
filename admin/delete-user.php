<?php
    include('config.php');

    $query = "DELETE FROM users WHERE id = {$_GET['id']}";

    $result = mysqli_query($connection, $query) or die("Query Failed");

    if($result){
        header("Location: http://{$hostname}/PHP/Project/news/Blog_Site/admin/users.php");
    }

?>