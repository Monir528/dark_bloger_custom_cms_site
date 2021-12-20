<?php

    include "config.php";

    $file_name = $_FILES['fileToUpload']['name'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_type = $_FILES['fileToUpload']['type'];
    $c1 = explode('.', $file_name);
    $file_ext = strtolower(end($c1));
    $file_format = array("jpg","jpeg","png");
    
    if(in_array($file_ext,$file_format) === false){
        $error[] = "Uploaded file extention must be jpg, jpeg, png ";
    }

    if($file_size > 3670016){
        $error[] = "Uploaded file size must be 3.5 MB";
    }

    if(empty($error)){
        
        move_uploaded_file($tmp_name,"upload/".$file_name);

        session_start();
        $title = $_POST['post_title'];
        $des = $_POST['postdesc'];
        $ctg = $_POST['category'];
        $author = $_SESSION['user_id'];
        $time = date("d M, y");

        $sql = "INSERT INTO post(p_title, p_description, p_category, p_author, p_date, p_image)".
        "VALUES('{$title}', '{$des}', '{$ctg}', '{$author}', '{$time}', '{$file_name}');";
        $sql .= "UPDATE category SET cpost = cpost+1 WHERE cid = {$ctg}";

        $result = mysqli_multi_query($connection, $sql);
        if($result){
            header("location: http://localhost//PHP/Project/news/Self/admin/post.php");
        }else{
            echo "Query failed!";
        }
    }else{
        print_r($error);
    }
?>